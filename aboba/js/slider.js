// -- Banner slider
const swiper_banner = new Swiper('.banner__swiper-container', {
    direction: 'horizontal',
    loop: true,
    allowTouchMove: false,

    autoplay: {
        delay: 3000,
    },
});
// Banner slider --


// -- Related slider
const swiper_related = new Swiper('.related__swiper-container', {
    direction: 'horizontal',
    slidesPerView: 4,
    spaceBetween: 20,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
// Related slider --