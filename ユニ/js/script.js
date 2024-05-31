/**********　完全に読み込んでからサイト表示　**********/
// window.addEventListener('load', function () {
//   document.body.style.display = 'block';
// });

/**********　ファーストビュー　動画　再生箇所指定　**********/
document.addEventListener('DOMContentLoaded', function () {
  var video = document.getElementById('bg-video');
  var loopStart = 8; // 8秒からリピート開始
  var loopEnd = 20; // 20秒でリピート終了
  var initialPlay = true;

  video.addEventListener('timeupdate', function () {
    if (initialPlay && video.currentTime >= loopEnd) {
      initialPlay = false;
      video.currentTime = loopStart;
      video.play();
    } else if (!initialPlay && video.currentTime >= loopEnd) {
      video.currentTime = loopStart;
    }
  });
});

/**********　ヘッダー固定アニメーション　**********/

document.addEventListener('DOMContentLoaded', function () {
  const header = document.getElementById('pc-header');
  const firstview = document.querySelector('.firstview-container');
  const headerOffsetTop = header.offsetTop;

  function checkHeaderPosition() {
    const scrollTop = window.scrollY;
    const firstviewHeight = firstview.offsetHeight;

    if (scrollTop > firstviewHeight) {
      if (!header.classList.contains('fixed')) {
        header.classList.add('fixed');
      }
    } else {
      if (header.classList.contains('fixed')) {
        header.classList.remove('fixed');
      }
    }
  }

  window.addEventListener('scroll', checkHeaderPosition);
  window.addEventListener('resize', checkHeaderPosition);
  checkHeaderPosition(); // 初回実行
});

/**********　ハンバーガーボタン　**********/
document.addEventListener('DOMContentLoaded', function () {
  var hamburger = document.getElementById('hamburger');
  var hamburgerMenu = document.querySelector('.hamburger-menu');

  hamburger.addEventListener('click', function () {
    hamburgerMenu.classList.toggle('show');
    hamburger.classList.toggle('open');

    // ボディのスクロールを制御
    if (hamburgerMenu.classList.contains('show')) {
      document.body.style.overflow = 'hidden'; // メニュー表示中はスクロール禁止
    } else {
      document.body.style.overflow = ''; // メニュー非表示時はスクロール許可
    }
  });
});

/**********　inviewプラグインのシンプルな実装　**********/
(function ($) {
  var $window = $(window);
  var inViewElements = [];

  function checkInView() {
    var windowHeight = $window.height();
    var windowTopPosition = $window.scrollTop();
    var windowBottomPosition = windowTopPosition + windowHeight;

    $.each(inViewElements, function () {
      var $element = $(this);
      var elementHeight = $element.outerHeight();
      var elementTopPosition = $element.offset().top;
      var elementBottomPosition = elementTopPosition + elementHeight;

      // check if this element is in view
      if (
        elementBottomPosition >= windowTopPosition &&
        elementTopPosition <= windowBottomPosition
      ) {
        $element.trigger('inview', [true]);
      } else {
        $element.trigger('inview', [false]);
      }
    });
  }

  $.fn.inView = function () {
    inViewElements = inViewElements.concat(this.toArray());
    return this;
  };

  $window.on('scroll resize', checkInView);
  $window.trigger('scroll');
})(jQuery);

/**********　スマホ　ABOUT　imgアニメーション　**********/
$(function () {
  // inviewイベントの設定
  $('.inview')
    .inView()
    .on('inview', function (event, isInView) {
      if (isInView) {
        $(this).addClass('is-show').off('inview'); // 一度だけクラスを追加し、その後イベントをオフにする
      }
    });

  // ウィンドウをスクロールしたら…
  $(window).scroll(function () {
    // ウィンドウの高さを取得
    const wHeight = $(window).height();
    // スクロールした量を取得
    const wScroll = $(window).scrollTop();
    // それぞれのblockクラスに対して…
    $('.block').each(function () {
      // それぞれのblockクラスのウィンドウからの高さを取得
      const bPosition = $(this).offset().top;
      // スクロールした量が要素の高さを上回ったら
      // その数値にウィンドウの高さを引き、最後に200pxを足す
      if (wScroll > bPosition - wHeight + 200) {
        $(this).addClass('fadeIn');
      }
    });
    // YouTube動画コンテナに対して同じ処理を適用
    const yPosition = $('.illust').offset().top;
    if (wScroll > yPosition - wHeight + 200) {
      $('.illust').addClass('fadeIn');
    }
  });
});

/**********　スマホ　about　テキスト　アニメーション　***********/
function BlurTextAnimeControl() {
  $('.slideConts').each(function () {
    var elemPos = $(this).offset().top - 50;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      $(this).addClass('slide');
    } else {
      $(this).removeClass('slide');
    }
  });
}

$(window).on('load scroll', function () {
  BlurTextAnimeControl();
});

/**********　PC　ABOUT　imgアニメーション　**********/
$(function () {
  // inviewイベントの設定
  $('.inview')
    .inView()
    .on('inview', function (event, isInView) {
      if (isInView) {
        $(this).addClass('is-show').off('inview'); // 一度だけクラスを追加し、その後イベントをオフにする
      }
    });

  // ウィンドウをスクロールしたら…
  $(window).scroll(function () {
    // ウィンドウの高さを取得
    const wHeight = $(window).height();
    // スクロールした量を取得
    const wScroll = $(window).scrollTop();
    // それぞれのblockクラスに対して…
    $('.block').each(function () {
      // それぞれのblockクラスのウィンドウからの高さを取得
      const bPosition = $(this).offset().top;
      // スクロールした量が要素の高さを上回ったら
      // その数値にウィンドウの高さを引き、最後に200pxを足す
      if (wScroll > bPosition - wHeight + 200) {
        $(this).addClass('fadeIn');
      }
    });
    // YouTube動画コンテナに対して同じ処理を適用
    const yPosition = $('.pc-about-image-box').offset().top;
    if (wScroll > yPosition - wHeight + 200) {
      $('.pc-about-image-box').addClass('fadeIn');
    }
  });
});

/**********　MOVIE　アニメーション　**********/
$(function () {
  // inviewイベントの設定
  $('.inview')
    .inView()
    .on('inview', function (event, isInView) {
      if (isInView) {
        $(this).addClass('is-show').off('inview'); // 一度だけクラスを追加し、その後イベントをオフにする
      }
    });

  // ウィンドウをスクロールしたら…
  $(window).scroll(function () {
    // ウィンドウの高さを取得
    const wHeight = $(window).height();
    // スクロールした量を取得
    const wScroll = $(window).scrollTop();
    // それぞれのblockクラスに対して…
    $('.block').each(function () {
      // それぞれのblockクラスのウィンドウからの高さを取得
      const bPosition = $(this).offset().top;
      // スクロールした量が要素の高さを上回ったら
      // その数値にウィンドウの高さを引き、最後に200pxを足す
      if (wScroll > bPosition - wHeight + 200) {
        $(this).addClass('fadeIn');
      }
    });
    // YouTube動画コンテナに対して同じ処理を適用
    const yPosition = $('.youtube-container').offset().top;
    if (wScroll > yPosition - wHeight + 200) {
      $('.youtube-container').addClass('fadeIn');
    }
  });
});

/**********　image-container　アニメーション　**********/
$(function () {
  // inviewイベントの設定
  $('.image-container.inview')
    .inView()
    .on('inview', function (event, isInView) {
      if (isInView) {
        $(this).addClass('is-show').off('inview'); // 一度だけクラスを追加し、その後イベントをオフにする
      } else {
        $(this).removeClass('is-show');
      }
    });
});

/**********　スマホ ABOUT sns-icon　アニメーション　**********/
$(function () {
  // inviewイベントの設定
  $('.about-sns.inview')
    .inView()
    .on('inview', function (event, isInView) {
      if (isInView) {
        $(this).addClass('is-show').off('inview'); // 一度だけクラスを追加し、その後イベントをオフにする
      } else {
        $(this).removeClass('is-show');
      }
    });
});

/**********　PC ABOUT sns-icon　アニメーション　**********/
$(function () {
  // inviewイベントの設定
  $('.pc-about-sns.inview')
    .inView()
    .on('inview', function (event, isInView) {
      if (isInView) {
        $(this).addClass('is-show').off('inview'); // 一度だけクラスを追加し、その後イベントをオフにする
      } else {
        $(this).removeClass('is-show');
      }
    });
});

/**********　3つ共通　**********/
function wrapTextWithSpan(element) {
  let text = element.textContent;
  let wrappedText = '';
  for (let char of text) {
    if (char.trim() !== '') {
      wrappedText += `<span class="char">${char}</span>`;
    } else {
      wrappedText += char;
    }
  }
  element.innerHTML = wrappedText;
}

/**********　PC ABOUT テキスト　アニメーション　**********/
function applyAnimationToPcAboutSection() {
  const section = document.querySelector('.pc-about-section');
  const elements = section.querySelectorAll('.leftAnimeInner');
  const charDelay = 25; // 文字ごとのディレイを25msに設定
  let totalDelay = 0;

  elements.forEach((element) => {
    wrapTextWithSpan(element);

    const chars = element.querySelectorAll('.char');
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            setTimeout(() => {
              chars.forEach((char, charIndex) => {
                setTimeout(() => {
                  char.classList.add('visible');
                }, charIndex * charDelay);
              });
            }, totalDelay);
            totalDelay += chars.length * charDelay; // 次の要素のアニメーション開始を遅らせる
            observer.unobserve(entry.target); // アニメーション適用後にオブザーバーから削除
          }
        });
      },
      { threshold: 0.1 }
    );

    observer.observe(element);
  });
}

function applySlideAnimeToPcAboutSection() {
  const section = document.querySelector('.pc-about-section');
  const elements = section.querySelectorAll('.leftAnime');
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('slideAnimeLeftRight');
          observer.unobserve(entry.target); // アニメーション適用後にオブザーバーから削除
        }
      });
    },
    { threshold: 0.1 }
  );

  elements.forEach((element) => {
    observer.observe(element);
  });
}

function applySlideAnimeSlowToPcAboutSection() {
  const section = document.querySelector('.pc-about-section');
  const elements = section.querySelectorAll('.leftAnimeSlow');
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('slideAnimeLeftRightSlow');
          observer.unobserve(entry.target); // アニメーション適用後にオブザーバーから削除
        }
      });
    },
    { threshold: 0.1 }
  );

  elements.forEach((element) => {
    observer.observe(element);
  });
}

/**********　goods テキスト　アニメーション　***********/
function applyAnimationToGoodsSection() {
  const section = document.querySelector('.goods-section');
  const elements = section.querySelectorAll('.leftAnimeInner');
  const charDelay = 25; // 文字ごとのディレイを25msに設定

  elements.forEach((element) => {
    wrapTextWithSpan(element);

    const chars = element.querySelectorAll('.char');
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            chars.forEach((char, charIndex) => {
              setTimeout(() => {
                char.classList.add('visible');
              }, charIndex * charDelay);
            });
            observer.unobserve(entry.target); // アニメーション適用後にオブザーバーから削除
          }
        });
      },
      { threshold: 0.1 }
    );

    observer.observe(element);
  });
}

function applySlideAnimeToGoodsSection() {
  const section = document.querySelector('.goods-section');
  const elements = section.querySelectorAll('.leftAnime');
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('slideAnimeLeftRight');
          observer.unobserve(entry.target); // アニメーション適用後にオブザーバーから削除
        }
      });
    },
    { threshold: 0.1 }
  );

  elements.forEach((element) => {
    observer.observe(element);
  });
}

function applySlideAnimeSlowToGoodsSection() {
  const section = document.querySelector('.goods-section');
  const elements = section.querySelectorAll('.leftAnimeSlow');
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('slideAnimeLeftRightSlow');
          observer.unobserve(entry.target); // アニメーション適用後にオブザーバーから削除
        }
      });
    },
    { threshold: 0.1 }
  );

  elements.forEach((element) => {
    observer.observe(element);
  });
}

/**********　works　テキスト　アニメーション　**********/
function applyAnimationToWorksSection() {
  const section = document.querySelector('.works-section');
  const elements = section.querySelectorAll('.leftAnimeInner');
  const charDelay = 25; // 文字ごとのディレイを25msに設定

  elements.forEach((element) => {
    wrapTextWithSpan(element);

    const chars = element.querySelectorAll('.char');
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            chars.forEach((char, charIndex) => {
              setTimeout(() => {
                char.classList.add('visible');
              }, charIndex * charDelay);
            });
            observer.unobserve(entry.target); // アニメーション適用後にオブザーバーから削除
          }
        });
      },
      { threshold: 0.1 }
    );

    observer.observe(element);
  });
}

function applySlideAnimeToWorksSection() {
  const section = document.querySelector('.works-section');
  const elements = section.querySelectorAll('.leftAnime');
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('slideAnimeLeftRight');
          observer.unobserve(entry.target); // アニメーション適用後にオブザーバーから削除
        }
      });
    },
    { threshold: 0.1 }
  );

  elements.forEach((element) => {
    observer.observe(element);
  });
}

function applySlideAnimeSlowToWorksSection() {
  const section = document.querySelector('.works-section');
  const elements = section.querySelectorAll('.leftAnimeSlow');
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('slideAnimeLeftRightSlow');
          observer.unobserve(entry.target); // アニメーション適用後にオブザーバーから削除
        }
      });
    },
    { threshold: 0.1 }
  );

  elements.forEach((element) => {
    observer.observe(element);
  });
}
/**********　3つ共通　**********/
window.onload = function () {
  // pc-about-section に対してアニメーションを適用
  applyAnimationToPcAboutSection();
  applySlideAnimeToPcAboutSection();
  applySlideAnimeSlowToPcAboutSection();

  // goods-section に対してアニメーションを適用
  applyAnimationToGoodsSection();
  applySlideAnimeToGoodsSection();
  applySlideAnimeSlowToGoodsSection();

  // works-section に対してアニメーションを適用
  applyAnimationToWorksSection();
  applySlideAnimeToWorksSection();
  applySlideAnimeSlowToWorksSection();
};

/*********** goods スクロール *********/
$(document).ready(function () {
  $('.slider').slick({
    autoplay: false, // 自動再生を無効にする
    speed: 1000,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<div class="slick-prev"></div>',
    nextArrow: '<div class="slick-next"></div>',
    dots: false, // ドットナビゲーションを無効にする
    pauseOnFocus: false,
    pauseOnHover: false,
    pauseOnDotsHover: false,
    lazyLoad: 'progressive',
  });
});
