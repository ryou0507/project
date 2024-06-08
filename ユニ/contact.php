<?php
/*
Template Name: Contact
*/
get_header(); // ヘッダーの読み込み
?>

<main>
    <section class="contact-section">
        <div class="contact-title">
            <h1 class="center-h1 inview">CONTACT</h1>
        </div>
        <div class="input-container">
            <form id="contactForm">
                <div>
                    <label for="category" class="text-area">カテゴリー <span>＊</span></label>
                    <select name="category" id="category" required>
                        <option value="">選択してください</option>
                        <option value="model">Live2Dモデリング制作依頼</option>
                        <option value="illust">イラスト制作依頼申し込み</option>
                        <option value="youtube">Youtubeコラボ依頼</option>
                        <option value="inquiry">その他お問い合わせ</option>
                    </select>
                </div>
                <div>
                    <label for="companyName" class="text-area">お名前 <span>＊</span></label>
                    <input class="input-area" type="text" id="companyName" name="companyName" placeholder="お名前を入力してください。">
                </div>

                <div>
                    <label for="companyNameKana" class="text-area">お名前（フリガナ）<span>＊</span></label>
                    <input class="input-area" type="text" id="companyNameKana" name="companyNameKana" placeholder="お名前（フリガナ）を入力してください。">
                </div>
                <div>
                    <label for="contactName" class="text-area">企業名<span>＊youtubeコラボ依頼の方はアカウント名</span> </label>
                    <input class="input-area" type="text" id="contactName" name="contactName" placeholder="企業またはVtuberの方はご入力してください。" required>
                </div>

                <div>
                    <label for="contactNameKana" class="text-area">企業名<span>＊youtubeコラボ依頼の方はアカウント名</span>（フリガナ） </label>
                    <input class="input-area" type="text" id="contactNameKana" name="contactNameKana" placeholder="企業またはVtuberの方はご入力してください。" 　required>
                </div>

                <div>
                    <label for="phone" class="text-area">電話番号 <span>＊</span></label>
                    <input class="input-area" type="tel" id="phone" name="phone" placeholder="ご連絡可能な電話番号を入力してください。" required>
                </div>

                <div>
                    <label for="email" class="text-area">メールアドレス <span>＊</span></label>
                    <input class="input-area" type="email" id="email" name="email" placeholder="ご連絡可能なメールアドレスを入力してください。" required>
                </div>

                <div>
                    <label for="inquiryDetails" class="text-area">お問い合わせ内容の詳細 <span>＊</span></label>
                    <textarea id="inquiryDetails" name="inquiryDetails" placeholder="〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇" required></textarea>
                </div>
            </form>
        </div>

        <div class="bottom-container">
            <p><a href="<?php echo home_url('/policy'); ?>">プライバシー・ポリシー</a><br><br>
                上記をご確認の上で、同意頂けるお客様は下記の同意ボタンにチェックをお願い致します。</p>
        </div>
        <div class="agreement">
            <input type="checkbox" id="agree" name="agree">
            <label for="agree">同意する</label>
        </div>


        <div class="contact-btn-content">
            <div class="contact-btn-container">
                <a type="button" id="goToConfirmation" class="contact-btn contact-btn-gradient"><span>入力確認画面へ</span></a>
            </div>
        </div>


        <script>
            document.getElementById('goToConfirmation').addEventListener('click', function() {
                var formElement = document.getElementById('contactForm');
                var agree = document.getElementById('agree').checked; // 同意がチェックされているか確認

                // フォームのバリデーションチェックと同意のチェック
                if (formElement.checkValidity() && agree) {
                    // バリデーションと同意チェックが成功した場合の処理
                    var formData = new FormData(formElement);
                    var object = {};
                    formData.forEach(function(value, key) {
                        object[key] = value;
                    });
                    var json = JSON.stringify(object);

                    // セッションストレージにJSONデータを保存
                    sessionStorage.setItem('formData', json);

                    // confirmationに移動
                    window.location.href = '<?php echo home_url(); ?>/confirmation';
                } else {
                    // バリデーション失敗または同意がチェックされていない場合の処理
                    alert('必須項目を全て入力し、利用規約に同意の上、再度お試しください。');
                    // フォームの不正な入力を表示（ブラウザが自動で行う）
                    formElement.reportValidity();
                }
            });
        </script>
    </section>
</main>

<?php
get_footer(); // フッターの読み込み
?>