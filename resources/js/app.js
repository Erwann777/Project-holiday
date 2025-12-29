import './bootstrap';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.swiper', {
        loop: true,
        autoplay: { delay: 3000 },
        pagination: { el: '.swiper-pagination' },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    });
});
