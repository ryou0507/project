<?php

/**
 * メインのテンプレートファイル
 *
 * これは WordPress テーマで最も一般的なテンプレートファイルであり、
 * テーマに必要なファイルの2つのうちの1つです（もう1つは style.css です）。
 * クエリによってより特定のファイルが一致しない場合に、ページを表示するために使用されます。
 * たとえば、home.php ファイルが存在しない場合にホームページをまとめます。
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Your_Theme_Name
 */

?>

<div class="firstview-container">
  <div class="firstview-video">
    <video autoplay muted loop playsinline id="bg-video">
      <source src="<?php echo esc_url(get_template_directory_uri()); ?>/media/yuni-firstview-video-h265.mp4" type="video/mp4; codecs=hevc">
      <source src="<?php echo esc_url(get_template_directory_uri()); ?>/media/yuni-firstview-video-h264.mp4" type="video/mp4" />
      Your browser does not support HTML5 video.
    </video>
  </div>
  <div class="firstview-content">
    <h1>
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-logo.webp" alt="栗栖ユニロゴ" class="firstview-logo" />
    </h1>
  </div>
</div>


<?php get_header(); // ヘッダーの読み込み 
?>

<!--スマホ用about-->
<section class="about-section">
  <h2 class="top-h2 inview fadeIn_right">ABOUT</h2>
  <div class="mobile-about">
    <div class="heart-container">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-about-item2-phone.webp" alt="ハート" class="heart inview" />
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-01.webp" alt="栗栖ユニイメージキャラクター" class="illust" />
      <div class="profile">
        <div class="kana slideConts txt1">Cris Yuni</div>
        <div class="name slideConts txt2">栗栖ユニ</div>
        <div class="camping slideConts txt3">Vのママな人妻メンヘラVTuber</div>
      </div>
      <div class="profession">
        <ul>
          <li class="slideConts txt4">イラストレーター</li>
          <li class="slideConts txt5">LIVE2dモデリング</li>
          <li class="slideConts txt6">YouTube 配信</li>
        </ul>
      </div>
      <div class="self">
        <div class="self-item slideConts txt7">
          <p>誕生日</p>
          <p>12月25日</p>
        </div>
        <div class="self-item slideConts txt8">
          <p>好きな食べ物</p>
          <p>いくら</p>
        </div>
        <div class="self-item slideConts txt9">
          <p>身長</p>
          <p>○○cm</p>
        </div>
        <div class="self-item slideConts txt10">
          <p>イメージカラー</p>
          <p>紫</p>
        </div>
      </div>


      <div class="mobile-about-bottom">
        <div class="about-sns inview is-show">
          <div class="about-X-icon">
            <a href="https://x.com/P_yun1">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-X icon.webp" alt="X Icon" class="about-X-img" />
            </a>
          </div>
          <div class="about-youtube-icon">
            <a href="https://www.youtube.com/@CrisYuni">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-youtube-icon.webp" alt="youtube icon" class="about-youtube-img" />
            </a>
          </div>
        </div>

        <div class="btn-container">
          <a href="<?php echo home_url('about'); ?>" class="btn btn-gradient"><span>詳細はこちら</span></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!--PC用about-->
<section class="pc-about-section">
  <h2 class="top-h2 inview fadeIn_right">ABOUT</h2>
  <div class="pc-about-content">
    <div class="pc-about-container">
      <div class="pc-about-text-box slide-in leftAnime">
        <p class="pc-about-title-roman slide-in_inner leftAnimeInner">
          Cris Yuni
        </p>
        <p class="pc-about-title slide-in_inner leftAnimeInner">栗栖ユニ</p>
        <p class="pc-about-camping slide-in_inner leftAnimeInner">
          Vのママな人妻メンヘラVTuber
        </p>
        <p class="pc-about-subtitle slide-in_inner leftAnimeInner">
          イラストレーター
        </p>
        <p class="pc-about-subtitle slide-in_inner leftAnimeInner">
          LEVE2dモデリング
        </p>
        <p class="pc-about-subtitle slide-in_inner leftAnimeInner">
          YouTube 配信
        </p>
        <div class="pc-about-details">
          <p class="slide-in_inner leftAnimeInner">誕生日</p>
          <p class="slide-in_inner leftAnimeInner">12月25日</p>
          <p class="slide-in_inner leftAnimeInner">身長</p>
          <p class="slide-in_inner leftAnimeInner">〇〇cm</p>
          <p class="slide-in_inner leftAnimeInner">イメージカラー</p>
          <p class="slide-in_inner leftAnimeInner">紫</p>
        </div>

        <div class="pc-about-sns inview is-show">
          <div class="pc-about-X-icon">
            <a href="https://x.com/P_yun1">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-X icon.webp" alt="X icon" class="pc-about-X-img" />
            </a>
          </div>
          <div class="pc-about-youtube-icon">
            <a href="https://www.youtube.com/@CrisYuni">
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-youtube-icon.webp" alt="youtube icon" class="pc-about-youtube-img" />
            </a>
          </div>
        </div>
        <div class="btn-container pc-about-btn">
          <a href="<?php echo home_url('about'); ?>" class="btn pc-about-btn-gradient"><span>詳細はこちら</span></a>
        </div>
      </div>
      <div class="pc-about-image-box">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-pc-about.webp" alt="ハートと2種類の栗栖ユニイメージキャラクター" class="pc-about-image" />
      </div>
    </div>
  </div>
</section>

<section class="movie-section">
  <h2 class="top-h2 inview fadeIn_right">MOVIE</h2>
  <div class="youtube-container">
    <iframe class="responsive-iframe" width="100%" height="300" src="<?php echo 'https://www.youtube.com/embed/2qj9a4aGqAY?si=z__UwxYvKxxQz3t-'; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>
  <div class="btn-container">
    <a href="https://www.youtube.com/@CrisYuni" class="btn btn-gradient"><span>チャンネル登録はこちら</span></a>
  </div>
</section>

<section id="news-section"></section>
<section class="news-section">
  <h2 class="top-h2 inview fadeIn_right">NEWS</h2>
  <?php echo do_shortcode('[news_list posts_per_page="3"]'); ?>
</section>

<section class="goods-section">
  <h2 class="top-h2 inview fadeIn_right">GOODS</h2>
  <div class="goods-container">
    <div class="goods-item slide-in leftAnimeSlow">
      <div class="image-container slider inview">
        <img class="slider-item slider-item01" data-lazy="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-goods-item1.webp" alt="ユニてゃクッション1" />
        <img class="slider-item slider-item01" data-lazy="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-goods-item1.webp" alt="ユニてゃクッション2" />
      </div>
      <p class="slide-in_inner leftAnimeInner">ユニてゃクッション</p>
      <p class="price slide-in_inner leftAnimeInner">￥4,500−</p>
    </div>
    <div class="goods-item slide-in leftAnimeSlow">
      <div class="image-container slider inview">
        <img class="slider-item slider-item02" data-lazy="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-goods-item2.webp" alt="ユニてゃシール1" />
        <img class="slider-item slider-item02" data-lazy="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-goods-item2.webp" alt="ユニてゃシール2" />
      </div>
      <p class="slide-in_inner leftAnimeInner">ユニてゃシール</p>
      <p class="price slide-in_inner leftAnimeInner">￥700−</p>
    </div>
    <div class="goods-item slide-in leftAnimeSlow">
      <div class="image-container slider inview">
        <img class="slider-item slider-item03" data-lazy="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-goods-item3.webp" alt="ユニてゃ抱き枕1" />
        <img class="slider-item slider-item03" data-lazy="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-goods-item3.webp" alt="ユニてゃ抱き枕2" />
      </div>
      <p class="slide-in_inner leftAnimeInner">ユニてゃ抱き枕</p>
      <p class="price slide-in_inner leftAnimeInner">￥10,080−</p>
    </div>
    <div class="goods-item slide-in leftAnimeSlow">
      <div class="image-container slider inview">
        <img class="slider-item slider-item04" data-lazy="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-goods-item4.webp" alt="ユニてゃアクスタ1" />
        <img class="slider-item slider-item04" data-lazy="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-goods-item4.webp" alt="ユニてゃアクスタ2" />
      </div>
      <p class="slide-in_inner leftAnimeInner">ユニてゃアクスタ</p>
      <p class="price slide-in_inner leftAnimeInner">￥1,430−</p>
    </div>
  </div>
  <div class="btn-container">
    <a href="<?php echo home_url('goods'); ?>" class="btn btn-gradient no-delay"><span>グッズ一覧はこちら</span></a>
  </div>
</section>

<section class="works-section">
  <h2 class="top-h2 inview fadeIn_right">WORKS</h2>
  <div class="works-container">
    <div class="work-item slide-in leftAnimeSlow">
      <div class="image-container inview">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-works-item1.webp" alt="栗栖ユニ実績1" />
      </div>
      <p class="slide-in_inner leftAnimeInner">サンプル</p>
      <p class="slide-in_inner leftAnimeInner">サンプル</p>
    </div>
    <div class="work-item slide-in leftAnimeSlow">
      <div class="image-container inview">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-works-item2.webp" alt="栗栖ユニ実績2" />
      </div>
      <p class="slide-in_inner leftAnimeInner">サンプル</p>
      <p class="slide-in_inner leftAnimeInner">サンプル</p>
    </div>
    <div class="work-item slide-in leftAnimeSlow">
      <div class="image-container inview">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-works-item3.webp" alt="栗栖ユニ実績3" />
      </div>
      <p class="slide-in_inner leftAnimeInner">サンプル</p>
      <p class="slide-in_inner leftAnimeInner">サンプル</p>
    </div>
    <div class="work-item slide-in leftAnimeSlow">
      <div class="image-container inview">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-works-item4.webp" alt="栗栖ユニ実績4" />
      </div>
      <p class="slide-in_inner leftAnimeInner">サンプル</p>
      <p class="slide-in_inner leftAnimeInner">サンプル</p>
    </div>
  </div>
  <div class="btn-container">
    <a href="<?php echo home_url('works'); ?>" class="btn btn-gradient"><span>実績一覧はこちら</span></a>
  </div>
</section>

<?php
get_footer();
?>