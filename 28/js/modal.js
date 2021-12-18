// modal window 変数
const modalArea = document.getElementById("u-modalNav");
const modalOpen = document.getElementById("p-aside-nav-icon");
// open
modalOpen.addEventListener("click", () => {
  modalArea.style.display = "block";
  window.setTimeout(function () {
    modalArea.style.marginRight = "0px";
  }, 1);
});
// close
const modalClose = document.getElementsByClassName("u-closeModal")[0];
modalClose.addEventListener("click", () => {
  modalArea.style.display = "none";
  modalArea.style.marginRight = "-200px";
});

// jquery
$(function () {
  // スクロールが100pxの位置に達したらheaderを消す
  $(window).on("scroll", () => {
    if ($(this).scrollTop() > 100) {
      $("#fixed-header").fadeOut();
    } else {
      $("#fixed-header").fadeIn();
    }
  });

  // スクロールが100pxの位置に達したらボタンを表示
  $(window).on("scroll", () => {
    if ($(this).scrollTop() > 100) {
      $("#page-top").fadeOut();
    } else {
      $("#page-top").fadeIn();
    }
  });
  // トップダウンを押すと動的にトップへ移動
  $("#page-top").on("click", () => {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      1000
    );
    // 親要素への影響をなくす
    return false;
  });
});
