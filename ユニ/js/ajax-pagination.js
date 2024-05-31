jQuery(document).ready(function ($) {
  function getExcerptLength() {
    return $(window).width() >= 768 ? 100 : 40; // 768px以上の場合は100文字、それ以下は40文字
  }

  function custom_excerpt_length(content, length) {
    content = content.replace(/<\/?[^>]+(>|$)/g, ''); // HTMLタグを削除
    if (content.length > length) {
      content = content.substring(0, length) + '...'; // 内容を指定の長さで切り取り
    }
    return content;
  }

  function load_news_page(page) {
    $.ajax({
      url: ajaxpagination.ajax_url,
      type: 'post',
      data: {
        action: 'load_news_posts',
        page: page,
        posts_per_page: 3,
      },
      success: function (response) {
        var $response = $(response);
        $response.find('.news-content').each(function () {
          var content = $(this).data('content');
          var length = getExcerptLength();
          $(this).html(custom_excerpt_length(content, length));
        });
        $('#news-container').html($response);
        // 現在のスクロール位置を取得
        var currentScrollTop = $(window).scrollTop();
        var newsContainerTop = $('#news-container').offset().top;

        // ページが少し下にずれている場合にのみスクロールを調整
        if (currentScrollTop > newsContainerTop) {
          $('html, body').animate(
            {
              scrollTop: newsContainerTop - 50, // 必要に応じてオフセット値を調整
            },
            500
          );
        }
      },
    });
  }

  $(document).on('click', '.pagination a', function (e) {
    e.preventDefault(); // イベントのデフォルト動作をキャンセル
    var page = $(this).attr('href').split('paged=')[1];
    load_news_page(page);
  });

  load_news_page(1); // 初期ページ読み込み
});
