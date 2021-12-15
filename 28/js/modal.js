// modal window 変数
const modalArea = document.getElementById("u-modalNav");
const modalOpen = document.getElementById("p-aside-nav-icon");
// open
modalOpen.addEventListener("click", () => {
  modalArea.style.display = "block";
});
// close
const modalClose = document.getElementsByClassName("u-closeModal")[0];
modalClose.addEventListener("click", () => {
  modalArea.style.display = "none";
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

  // 横スライドモーダル ナビクリックで表示
  // $("#p-aside-nav-icon").on("click", function () {
  //   if ($("#p-aside-nav-icon").hasClass("off")) {
  //     $("#p-aside-nav-icon").removeClass("off");
  //     $(this).animate({ marginLeft: "400px" }, 300).addClass("on");
  //   } else {
  //     $("#p-aside-nav-icon").addClass("off");
  //     $(this).animate({ marginLeft: "0px" }, 300);
  //   }
  // });

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
