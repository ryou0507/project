<?php
/*
Template Name: Works
*/
get_header(); // ヘッダーの読み込み
?>

<main>
    <section class="works-page-section">
        <h2 class="center-h2 inview">WORKS</h2>
        <div class="works-content">
            <section id="new-works">
                <p>New</p>
                <div class="works-page-container">
                    <?php echo do_shortcode('[works_category category="new-works" category_name="New"]'); ?>
                </div>
            </section>

            <section id="category1-works">
                <p>Category1</p>
                <div class="works-page-container">
                    <?php echo do_shortcode('[works_category category="category1-works" category_name="カテゴリー"]'); ?>
                </div>
            </section>

            <section id="category2-works">
                <p>Category2</p>
                <div class="works-page-container">
                    <?php echo do_shortcode('[works_category category="category2-works" category_name="カテゴリー"]'); ?>
                </div>
            </section>

            <section id="category3-works">
                <p>Category3</p>
                <div class="works-page-container">
                    <?php echo do_shortcode('[works_category category="category3-works" category_name="カテゴリー"]'); ?>
                </div>
            </section>

            <section id="category4-works">
                <p>Category4</p>
                <div class="works-page-container">
                    <?php echo do_shortcode('[works_category category="category4-works" category_name="カテゴリー"]'); ?>
                </div>
            </section>
        </div>
    </section>
</main>



<?php
get_footer(); // フッターの読み込み
?>