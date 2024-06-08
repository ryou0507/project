<?php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        while (have_posts()) :
            the_post();
        ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="center-h1-long inview">', '</h1>'); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'textdomain'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div><!-- .entry-content -->

                <div class="works-btn">
                    <div class="works-btn-container">
                        <a href="<?php echo home_url('/'); ?>" class="buy-btn buy-btn-gradient"><span>HOMEへ</span></a>
                    </div>
                </div>
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>