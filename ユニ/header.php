<?php
// 現在のURLを取得する関数
function getCurrentUrl()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];
    $requestUri = $_SERVER['REQUEST_URI'];
    return $protocol . $domainName . $requestUri;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>栗栖ユニホームページ</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- TOPへボタン -->
    <div id="top">
        <a href="#top" class="btn back-to-top"><span class="dli-chevron-up"></span></a>
    </div>

    <!-- スマホ用ヘッダー -->
    <div class="header">
        <div class="header-container">
            <div class="header-left">
                <nav class="header-left-nav">
                    <div class="hamburger" id="hamburger">
                        <div class="header-left-line"></div>
                        <div class="header-left-line"></div>
                        <div class="header-left-line"></div>
                    </div>
                    <div class="hamburger-menu">
                        <ul class="nav-links" id="nav-links">
                            <li><a href="<?php echo home_url('/'); ?>">HOME</a></li>
                            <li><a href="<?php echo home_url(); ?>/about/">ABOUT</a></li>
                            <li><a href="<?php echo home_url(); ?>/goods/">GOODS</a></li>
                            <li><a href="<?php echo home_url(); ?>/Work/">WORKS</a></li>
                            <li><a href="<?php echo home_url(); ?>/contact/">CONTACT</a></li>
                        </ul>
                        <div class="hamburger-sns">
                            <div class="hamburger-X-icon">
                                <a href="https://x.com/P_yun1">
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-X icon.webp" alt="X icon" class="hamburger-X-img" />
                                </a>
                            </div>
                            <div class="hamburger-youtube-icon">
                                <a href="https://www.youtube.com/@CrisYuni">
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-youtube-icon.webp" alt="youtube icon" class="hamburger-youtube-img" />
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="header-right">
                <div class="header-sns">
                    <div class="header-X-icon">
                        <a href="https://x.com/P_yun1">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-X icon.webp" alt="X icon" class="header-X-img" />
                        </a>
                    </div>
                    <div class="header-youtube-icon">
                        <a href="https://www.youtube.com/@CrisYuni">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-youtube-icon.webp" alt="youtube icon" class="header-youtube-img" />
                        </a>
                    </div>
                </div>
                <div class="header-inquiry">
                    <a href="<?php echo home_url(); ?>/contact/" class="header-inquiry-button btn"><span>お問い合わせ</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- PC用ヘッダー -->
    <div class="pc-header" id="pc-header">
        <div class="pc-header-container">
            <div class="pc-header-left">
                <div class="pc-header-nav">
                    <ul class="pc-nav-links">
                        <li><a href="<?php echo home_url('/'); ?>">HOME</a></li>
                        <li><a href="<?php echo home_url(); ?>/about/">ABOUT</a></li>
                        <li><a href="<?php echo home_url(); ?>/goods/">GOODS</a></li>
                        <li><a href="<?php echo home_url(); ?>/Work/">WORKS</a></li>
                    </ul>
                </div>
            </div>
            <div class="pc-header-right">
                <div class="pc-header-inquiry">
                    <a href="<?php echo home_url(); ?>/contact/" class="pc-header-inquiry-button btn">
                        <span>お問い合わせ</span>
                    </a>
                </div>
            </div>
        </div>
    </div>