<?php
/*
Template Name: confirmation
*/
get_header(); // ヘッダーの読み込み
?>

<main>
    <section class="confirmation-section">
        <div class="contact-title">
            <h1 class="center-h1 inview">CONTACT</h1>
        </div>
        <div class="confirmationDetails-container">
            <div id="confirmationDetails">
                <!-- ここにJavaScriptを使って入力内容を表示する -->
            </div>
        </div>

        <div class="works-btn">
            <div class="works-btn-container">
                <a class="buy-btn buy-btn-gradient" id="confirmSubmit"><span>入力完了</span></a>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 送信ボタンのクリックイベントリスナーを追加
        document.getElementById('confirmSubmit').addEventListener('click', function() {
            // セッションストレージからフォームデータを取得
            var formData = JSON.parse(sessionStorage.getItem('formData'));

            // サーバーにフォームデータを送信する関数
            function sendFormData(formData) {
                // フォームデータをサーバーに送信
                fetch('https://homcri.com/proxy.php', {
                        method: 'POST', // 送信メソッド
                        headers: {
                            'Content-Type': 'application/json' // ヘッダー
                        },
                        body: JSON.stringify(formData) // ボディにフォームデータをJSON形式で設定
                    })
                    .then(response => {
                        if (response.ok) {
                            // 送信が成功した場合の処理
                            window.location.href = '<?php echo home_url(); ?>/thankyou/'; // 送信完了ページへのリダイレクト
                        } else {
                            throw new Error('Network response was not ok.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            // フォームデータを送信
            sendFormData(formData);
        });

        // セッションストレージからフォームデータを取得
        var formData = JSON.parse(sessionStorage.getItem('formData'));

        // カテゴリー名を英語から日本語に変換するためのマッピング
        var categoryMapping = {
            'model': 'Live2Dモデリング制作依頼',
            'illust': 'イラスト制作依頼申し込み',
            'youtube': 'Youtubeコラボ依頼',
            'inquiry': 'その他お問い合わせ'
        };


        // 入力内容を表示するエレメントを取得
        var detailsDiv = document.getElementById('confirmationDetails');

        // フォームデータをHTMLに変換して表示
        // ここで、categoryMappingを使用してカテゴリー名を日本語に変換
        detailsDiv.innerHTML = `
                    <div class="contact-row"><p class="contact-option">カテゴリー　:　</p><p class="contact-answer">${categoryMapping[formData.category] || '選択されていません'}</p></div>
                    <div class="contact-row"><p class="contact-option">お名前　:　</p><p class="contact-answer">${formData.companyName || '未入力'}</p></div>
                    <div class="contact-row"><p class="contact-option">お名前（フリガナ)　:　</p><p class="contact-answer">${formData.companyNameKana || '未入力'}</p></div>
                    <div class="contact-row"><p class="contact-option">企業名<span>＊youtubeコラボ依頼の方はアカウント名</span>　:　</p><p class="contact-answer">${formData.contactName}</p></div>
                    <div class="contact-row"><p class="contact-option">企業名（フリガナ)　:　</p><p class="contact-answer">${formData.contactNameKana}</p></div>
                    <div class="contact-row"><p class="contact-option">電話番号　:　</p><p class="contact-answer">${formData.phone}</p></div>
                    <div class="contact-row"><p class="contact-option">メールアドレス　:　</p><p class="contact-answer">${formData.email}</p></div>
                    <div class="contact-row"><p class="contact-option-long">お問い合わせ内容の詳細　:　</p><p class="contact-answer-long">${formData.inquiryDetails}</p></div>
                `;
    });
</script>

<?php
get_footer(); // フッターの読み込み
?>