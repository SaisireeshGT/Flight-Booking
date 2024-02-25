window.onscroll = () => {
    // Assuming menubar and navbar are elements with these classes
    const menubar = document.querySelector('.your-menubar-class');
    const navbar = document.querySelector('.your-navbar-class');

    if (menubar && navbar) {
        menubar.classList.remove('fa-times');
        navbar.classList.remove('active');
    }
}

let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}
function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

var swiper = new Swiper('.swiper-container', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

// Initial display of the first slide
showSlide(currentSlide);


