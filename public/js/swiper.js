// core version + navigation, pagination modules:
import Swiper, { Navigation, Pagination } from 'swiper';
// configure Swiper to use modules
Swiper.use([Navigation, Pagination]);

import 'swiper/swiper-bundle.css';
﻿
﻿
﻿const swiper = new Swiper(".swiper", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
    clickable: "clickable"
  },
  loop: true, //繰り返し指定
  spaceBetween: 8, //スライド間の余白
  slidesPerView: 1.5, //一度に表示するスライド枚数
  centeredSlides: true, //スライダーの最初と最後に余白を追加せずスライドが真ん中に配置される
  centeredSlidesBounds: true //アクティブなスライドを中央に配置
});