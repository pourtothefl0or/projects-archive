let sliderBlock = document.querySelector('.banner__swiper-container');

sliderBlock.addEventListener("mouseleave", function(e) {
    swiper_banner.autoplay.start();
});

sliderBlock.addEventListener("mouseenter", function(e) {
    swiper_banner.autoplay.stop();
});