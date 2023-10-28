// モーダル部分
$(function () { //①
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modal-inner').on('click', function (e) {
    console.log('hello');
    if (!$(e.target).closest('.inner-content').length) {
      $('.js-modal').fadeOut();
      return false;
    }
  });
});


// 矢印あり↓
$(function () {
  $(".js-accordion-title").on("click", function () {
    $(this).next().slideToggle(300);
    $(this).toggleClass("open", 300);
  });
});
// 矢印あり↑
