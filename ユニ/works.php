<?php
/*
Template Name: Works
*/
get_header(); // ヘッダーの読み込み
?>

<main>
    <section class="works-page-section">
        <h1 class="center-h1 inview">WORKS</h1>
        <div class="works-content">
            <section id="new-works">
                <div class="works-navigation">
                    <button class="prev-button" onclick="scrollWorks('new-works', 'prev')"></button>
                    <div class="works-page-container" id="new-works-container">
                        <?php echo do_shortcode('[works_category category="category1-works" category_name="NEW"]'); ?>
                    </div>
                    <button class="next-button" onclick="scrollWorks('new-works', 'next')"></button>
                </div>
            </section>

            <section id="category1-works">
                <div class="works-navigation">
                    <button class="prev-button" onclick="scrollWorks('category1-works', 'prev')"></button>
                    <div class="works-page-container" id="category1-works-container">
                        <?php echo do_shortcode('[works_category category="category1-works" category_name="カテゴリー"]'); ?>
                    </div>
                    <button class="next-button" onclick="scrollWorks('category1-works', 'next')"></button>
                </div>
            </section>

            <section id="category2-works">
                <div class="works-navigation">
                    <button class="prev-button" onclick="scrollWorks('category2-works', 'prev')"></button>
                    <div class="works-page-container" id="category2-works-container">
                        <?php echo do_shortcode('[works_category category="category2-works" category_name="カテゴリー"]'); ?>
                    </div>
                    <button class="next-button" onclick="scrollWorks('category2-works', 'next')"></button>
                </div>
            </section>

            <section id="category3-works">
                <div class="works-navigation">
                    <button class="prev-button" onclick="scrollWorks('category3-works', 'prev')"></button>
                    <div class="works-page-container" id="category3-works-container">
                        <?php echo do_shortcode('[works_category category="category3-works" category_name="カテゴリー"]'); ?>
                    </div>
                    <button class="next-button" onclick="scrollWorks('category3-works', 'next')"></button>
                </div>
            </section>

            <section id="category4-works">
                <div class="works-navigation">
                    <button class="prev-button" onclick="scrollWorks('category4-works', 'prev')"></button>
                    <div class="works-page-container" id="category4-works-container">
                        <?php echo do_shortcode('[works_category category="category4-works" category_name="カテゴリー"]'); ?>
                    </div>
                    <button class="next-button" onclick="scrollWorks('category4-works', 'next')"></button>
                </div>
            </section>
        </div>

        <div class="works-btn">
            <div class="works-btn-container">
                <a href="<?php echo home_url(); ?>/contact/" class="buy-btn buy-btn-gradient"><span>お問い合わせ</span></a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer(); // フッターの読み込み
?>