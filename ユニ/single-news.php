<?php get_header(); ?>

<main id="main-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="news-box">
                    <div class="news-date"><?php echo get_the_date('Y.m.d'); ?></div> <!-- 日付の表示 -->
                    <h1 class="single-news-title"><?php the_title(); ?></h1>
                    <div class="news-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="btn-container">
                        <a href="<?php echo esc_url(home_url('/#news-section')); ?>" class="btn btn-gradient"><span>BACK</span></a>
                    </div>
                </div>
            </article>
            <?php
            if (function_exists('get_the_last_modified_info')) {
                echo '<div class="date-last-news">' . get_post_modified_time('Y.n.j') . '</div>';
            }
            ?>
    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>