// Initialize Swiper with "fade" effect
var swiper = new Swiper('.swiper-container', {
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 5000, // Time in milliseconds between slides
        disableOnInteraction: false, // Enable/disable autoplay on user interaction
    },
    effect: 'fade', // Set the transition effect to "fade"
});
