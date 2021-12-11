// === ACCORDION === 
document.querySelector('.faq-accordion').addEventListener('click', (event) => {
    if (event.target.closest('.faq-accordion__item')) {
        event.target.closest('.faq-accordion__item')
            .classList.toggle('faq-accordion__item--active');
    }
})
// === ACCORDION === 


// === BURGER MENU === 
const header = document.querySelector('.section-header');
const navLink = document.querySelectorAll('.nav__link');
const body = document.querySelector('body');

document.querySelector('.btn-burger').addEventListener('click', () => {
    header.classList.toggle('section-header--active-nav');
    body.style.overflowY = (body.style.overflowY == 'hidden') ? '' : 'hidden';

    navLink.forEach((e) => {
        e.addEventListener('click', () => {
            resetNav();
        });
    });
})

const resetNav = () => {
    header.classList.remove('section-header--active-nav');
    body.style.overflowY = '';
}

window.addEventListener('resize', resetNav);

// === / BURGER MENU ===


// === SWIPER ===
const swiperHero = new Swiper('.section-hero-image', {
    direction: 'horizontal',
    loop: true,
    
    pagination: {
        el: '.section-hero-image__dots',
        clickable: true,
    },

    autoplay: {
        delay: 5000,
    },
});

const swiperBlog = new Swiper('.slider-blog-container', {
    direction: 'horizontal',
    loop: true,
    
    pagination: {
        el: '.section-blog__dots',
        clickable: true,
    },
    
    navigation: {
        nextEl: '.btn-arrow--next',
        prevEl: '.btn-arrow--prev',
    },

    autoplay: {
        delay: 5000,
    },
});

const swiperQuotes = new Swiper('.slider-quotes', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 40,

    pagination: {
        el: '.section-quotes__dots',
        clickable: true,
    },

    autoplay: {
        delay: 5000,
    },
});
// === / SWIPER ===