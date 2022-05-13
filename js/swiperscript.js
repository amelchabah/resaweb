$(document).ready(function () {
  var classList = ['blue', 'red', 'green', 'purple', 'yellow', 'yellow'];
  var Slider = new Swiper('.slider-container .swiper-container', {
    loop: false,
    navigation: {
      nextEl: '.left-btn',
      prevEl: '.right-btn',
    },
    autoplay: {
      delay: 6000,
    },
    slidesPerView: 1,
    observer: true,
    observeParents: true,
    keyboard: {
      enabled: true,
      onlyInViewport: false,
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    on: {
      init: function () {
        var index = this.activeIndex; // current slide index
        $('.slider-container')
          .removeClass(classList)
          .addClass(classList[index]);

        $('.slider-container .img-wrapper')
          .removeClass('active')
          .eq(index)
          .addClass('active');
      }
    }
  }).on('slideChange', function () {
    var index = this.activeIndex; // current slide index
    $('.slider-container')
      .removeClass(classList)
      .addClass(classList[index]);
    $('.slider-container .img-wrapper')
      .removeClass('active')
      .eq(index)
      .addClass('active');
  });
  $(window).on('resize', function () {
    Slider.update();
  });
});




