<?php

// スタイルとスクリプトの読み込み
function load_custom_styles_and_scripts()
{
    // 既存のCSSファイルの読み込み
    wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css');
    wp_enqueue_style('layout-style', get_template_directory_uri() . '/css/layout.css');
    wp_enqueue_style('btn-style', get_template_directory_uri() . '/css/btn.css');

    // Googleフォントの読み込み
    wp_enqueue_style('google-font-noto-sans', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap');
    wp_enqueue_style('google-font-rampart-one', 'https://fonts.googleapis.com/css2?family=Rampart+One&display=swap');
    wp_enqueue_style('google-font-hachi-maru-pop', 'https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&display=swap');

    // Font Awesomeの読み込み
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css');

    // LightboxのCSSの読み込み
    wp_enqueue_style('lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');

    // JavaScriptファイルの読み込み
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('script-js', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);

    // LightboxのJSの読み込み
    wp_enqueue_script('lightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array('jquery'), null, true);

    // custom.jsの読み込み
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery', 'lightbox-js'), null, true);
}
add_action('wp_enqueue_scripts', 'load_custom_styles_and_scripts');

// jQueryのバージョンを置き換え
function replace_jquery_version()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, '3.6.0');
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'replace_jquery_version');

// Ajaxページネーション用のスクリプトを読み込む
function enqueue_ajax_pagination_script()
{
    wp_enqueue_script('ajax-pagination', get_template_directory_uri() . '/js/ajax-pagination.js', array('jquery'), null, true);
    wp_localize_script('ajax-pagination', 'ajaxpagination', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_pagination_script');

// カスタム投稿タイプ 'news' の作成
function create_post_type_news()
{
    register_post_type(
        'news',
        array(
            'labels' => array(
                'name' => __('News'),
                'singular_name' => __('News')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_post_type_news');

// 抜粋の文字数を調整
function custom_excerpt_length($content, $length = 40)
{
    $content = strip_tags($content);
    if (mb_strlen($content) > $length) {
        $content = mb_substr($content, 0, $length) . '...';
    }
    return $content;
}

// ページネーションのショートコード
function custom_news_list_shortcode($atts)
{
    ob_start();
    $atts = shortcode_atts(array('posts_per_page' => 3), $atts, 'news_list');
    echo '<div id="news-container">';
    custom_news_list_content(1, $atts['posts_per_page']);
    echo '</div><div id="pagination-container"></div>';
    return ob_get_clean();
}
add_shortcode('news_list', 'custom_news_list_shortcode');

// ニュースリストのコンテンツを表示
function custom_news_list_content($paged, $posts_per_page)
{
    $query_args = array(
        'post_type'      => 'news',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'order'          => 'DESC',
        'orderby'        => 'date'
    );
    $the_query = new WP_Query($query_args);
    if ($the_query->have_posts()) {
        echo '<ul class="custom-news-list">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $content = get_the_content();
            echo '<li class="news-item">';
            echo '<div class="news-date">' . get_the_date('Y.m.d') . '</div>';
            echo '<div class="news-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
            echo '<div class="news-content" data-content="' . esc_attr($content) . '">' . custom_excerpt_length($content, 40) . '</div>';
            echo '</li>';
        }
        echo '</ul>';
        $big = 999999999;
        echo '<div class="pagination">' . paginate_links(array(
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => '?paged=%#%',
            'current'   => max(1, $paged),
            'total'     => $the_query->max_num_pages,
            'prev_text' => __('« Prev'),
            'next_text' => __('Next »'),
            'add_args'  => false,
            'type'      => 'list',
        )) . '</div>';
    } else {
        echo '<p class="no-news">お知らせはまだありません。</p>';
    }
    wp_reset_postdata();
}

// Ajaxハンドラの追加
function load_news_posts()
{
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 3;
    custom_news_list_content($paged, $posts_per_page);
    wp_die();
}
add_action('wp_ajax_load_news_posts', 'load_news_posts');
add_action('wp_ajax_nopriv_load_news_posts', 'load_news_posts');

// サムネイルサポートの追加
add_theme_support('post-thumbnails');

// webp画像の追加
function custom_mime_types($mimes)
{
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');

// カスタム投稿タイプ 'works' の作成
function create_post_type_works()
{
    register_post_type(
        'works',
        array(
            'labels' => array(
                'name' => __('Works'),
                'singular_name' => __('Work'),
                'add_new' => __('Add New Work'),
                'add_new_item' => __('Add New Work'),
                'edit_item' => __('Edit Work'),
                'new_item' => __('New Work'),
                'view_item' => __('View Work'),
                'search_items' => __('Search Works'),
                'not_found' => __('No works found'),
                'not_found_in_trash' => __('No works found in Trash'),
                'all_items' => __('All Works'),
                'archives' => __('Work Archives'),
                'insert_into_item' => __('Insert into work'),
                'uploaded_to_this_item' => __('Uploaded to this work'),
                'featured_image' => __('Featured Image'),
                'set_featured_image' => __('Set featured image'),
                'remove_featured_image' => __('Remove featured image'),
                'use_featured_image' => __('Use as featured image'),
                'menu_name' => __('Works'),
                'filter_items_list' => __('Filter works list'),
                'items_list_navigation' => __('Works list navigation'),
                'items_list' => __('Works list'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'works'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
            'show_in_rest' => true,
            'taxonomies' => array('category'),
        )
    );
}
add_action('init', 'create_post_type_works');

// カスタムフィールドから追加画像を取得
function get_additional_images($post_id)
{
    $images = array();
    for ($i = 1; $i <= 99; $i++) {
        $image_url = get_post_meta($post_id, 'image' . $i, true);
        if ($image_url) {
            $images[] = $image_url;
        }
    }
    return $images;
}

// カテゴリー別の作品を表示
function display_works_by_category($atts)
{
    $atts = shortcode_atts(
        array(
            'category' => '', // カテゴリーのスラッグを指定
            'category_name' => '' // カテゴリーの表示名を指定
        ),
        $atts,
        'works_category'
    );

    $query_args = array(
        'posts_per_page' => -1,
        'post_type' => 'works',
        'category_name' => $atts['category']
    );

    $works_query = new WP_Query($query_args);
    ob_start();

    echo '<h2>' . esc_html($atts['category_name']) . '</h2>'; // カテゴリー名を表示

    if ($works_query->have_posts()) {
        while ($works_query->have_posts()) {
            $works_query->the_post();
            echo '<div class="works-item">';
            if (has_post_thumbnail()) {
                echo '<a href="' . get_the_post_thumbnail_url() . '" data-lightbox="works" class="works-thumbnail shortcode-works-thumbnail" loading="lazy">';
                the_post_thumbnail();
                echo '</a>';
            }

            $additional_images = get_additional_images(get_the_ID());
            if (!empty($additional_images)) {
                foreach ($additional_images as $image_url) {
                    echo '<a href="' . esc_url($image_url) . '" data-lightbox="works" class="works-thumbnail shortcode-works-thumbnail">';
                    echo '<img src="' . esc_url($image_url) . '" class="works-page-image" />';
                    echo '</a>';
                }
            }
            echo '</div>';
        }
    } else {
        echo '<p>No posts found in ' . esc_html($atts['category']) . ' category.</p>';
    }
    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('works_category', 'display_works_by_category');
