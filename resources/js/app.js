import './bootstrap';
import Alpine from 'alpinejs';
import Swiper, { Navigation, Pagination } from 'swiper';
import 'swiper/swiper-bundle.css';

import '../css/app.css'; // Tailwind CSSのみ

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
  var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    loop: true,
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 7,
        spaceBetween: 30,
      },
    },
  });
});
