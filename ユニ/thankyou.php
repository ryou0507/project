<?php
/*
Template Name: thankyou
*/
get_header(); // ヘッダーの読み込み
?>
<main>
    <section class="thankyou-section">
        <div class="contact-title">
            <h1 class="center-h1 inview">CONTACT</h1>
        </div>
        <div class="input-complete">
            <p>入力完了<br>
                お問い合わせ内容を送信完了致しました。</p>
        </div>

        <div class="complete-text">
            <p>お問い合わせいただきありがとうございます。<br><br>
                お客様に自動送信メールを送信いたしましたので<br>
                ご確認ください。<br><br>
                万が一、自動送信メールが届かない場合がございましたら<br>
                お手数ですがお電話にてお問合せください。</p>
        </div>

        <div class="works-btn">
            <div class="works-btn-container">
                <a href="<?php echo home_url('/'); ?>" class="buy-btn buy-btn-gradient"><span>HOMEへ</span></a>
            </div>
        </div>
    </section>
</main>
<?php
get_footer(); // フッターの読み込み
?>