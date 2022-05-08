require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


var swiper = new Swiper(".mySwiper", {
effect: "cards",
grabCursor: true,
});
