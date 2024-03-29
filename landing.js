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
//toggle
document.addEventListener('DOMContentLoaded', function() {
    // Select the toggle button and the nav-links list
    const toggleButton = document.querySelector('.navbar-toggle');
    const navLinks = document.querySelector('.nav-links');

    // Add an event listener for click events on the toggle button
    toggleButton.addEventListener('click', function() {
        // Toggle the 'active' class on the nav-links list
        navLinks.classList.toggle('active');
    });
});
