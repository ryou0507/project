<?php

/*
Template Name: about
*/
get_header(); // ヘッダーの読み込み

?>

<section class="aboutpage-section">
    <h1 class="center-h1">ABOUT</h1>
    <div class="aboutpage-main" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-aboutpage-back.webp'); background-size: contain;  background-repeat: repeat;  padding: 20px;">
        <div class="aboutpage-container">
            <div class="page-profile">
                <div class="kana">Cris Yuni</div>
                <div class="name">栗栖ユニ</div>
                <div class="camping">Vのママな人妻メンヘラVTuber</div>
                <ul class="profile-details">
                    <li><span>誕生日</span>: 00月00日</li>
                    <li><span>趣味</span>: 〇〇〇〇〇</li>
                    <li><span>身長</span>: 00cm</li>
                    <li><span>好きな食べ物</span>: 〇〇〇〇〇</li>
                    <li><span>イメージカラー</span>: 〇〇〇〇〇</li>
                </ul>
            </div>
            <div class="page-about-sns">
                <div class="about-X-icon">
                    <a href="https://x.com/P_yun1">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-X icon.webp" alt="X Icon" class="about-X-img" />
                    </a>
                </div>
                <div class="about-youtube-icon">
                    <a href="https://www.youtube.com/@CrisYuni">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-youtube-icon.webp" alt="YouTube Icon" class="about-youtube-img" />
                    </a>
                </div>
            </div>
        </div>
        <div class="character-image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-about-item1-phone.webp" alt="Character Image">
        </div>
        <div class="fan-message">
            <h2>ファンへのメッセージ</h2>
            <p>〇〇〇〇〇〇〇〇〇〇</p>
        </div>
        <div class="activities">
            <h2>活動内容</h2>
            <h3>YouTube配信</h3>
            <div class="activity-box">〇〇〇〇〇〇〇〇〇〇</div>
            <h3>Live2Dモデリング</h3>
            <div class="activity-box">〇〇〇〇〇〇〇〇〇〇</div>
            <h3>イラストレーター</h3>
            <div class="activity-box">〇〇〇〇〇〇〇〇〇〇</div>
        </div>

        <div class="btn-container">
            <a href="" class="btn btn-gradient"><span>お問い合わせ</span></a>
        </div>

    </div>
</section>

<?php
get_footer(); // フッターの読み込み
?>