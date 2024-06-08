document.addEventListener('DOMContentLoaded', function () {
  // Lightboxのオプションを設定
  lightbox.option({
    fadeDuration: 200, // フェードイン/アウトの速度を200msに設定
    resizeDuration: 200, // 画像リサイズの速度を200msに設定
    imageFadeDuration: 200, // 画像のフェードインの速度を200msに設定
  });

  const moveCloseButton = () => {
    const lightboxImage = document.querySelector('.lb-image');
    const closeButtonContainer = document.querySelector('.lb-closeContainer');
    if (lightboxImage && closeButtonContainer) {
      // 画像の親要素（.lb-container）に閉じるボタンを追加
      const container = lightboxImage.closest('.lb-container');
      if (container) {
        container.style.position = 'relative'; // 親要素を相対位置に設定
        closeButtonContainer.style.position = 'absolute';
        closeButtonContainer.style.top = '10px';
        closeButtonContainer.style.right = '10px';
        container.appendChild(closeButtonContainer);
      }
    }
  };

  const lightboxContainer = document.getElementById('lightbox');
  if (lightboxContainer) {
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
          mutation.addedNodes.forEach((node) => {
            if (
              node.nodeType === 1 &&
              node.classList.contains('lb-outerContainer')
            ) {
              // setIntervalを使用して、Lightboxが完全に読み込まれるまで繰り返しチェックして閉じるボタンを移動
              const intervalId = setInterval(() => {
                moveCloseButton();
                // Lightboxが完全に読み込まれたことを特定の要素や状態で確認
                if (document.querySelector('.lb-loaded')) {
                  clearInterval(intervalId); // Lightboxが完全に読み込まれたらintervalをクリア
                }
              }, 100); // 100msごとにチェック
            }
          });
        }
      });
    });
    observer.observe(lightboxContainer, { childList: true, subtree: true });
  }

  window.addEventListener('resize', moveCloseButton);

  // 初回ロード時に実行
  moveCloseButton();
});
