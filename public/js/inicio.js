document.addEventListener("DOMContentLoaded", function () {
    // Carrusel del héroe
    new Swiper('.hero-swiper', {
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      effect: 'slide', // También puedes usar 'fade'
      speed: 800,
    });
  
    // Carrusel destacado
    new Swiper('.destacado-swiper', {
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      spaceBetween: 30,
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      },
      grabCursor: true,
    });
  });
  