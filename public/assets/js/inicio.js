const carouselContainer = document.querySelector('.carousel-container');
const carouselSlide = document.querySelectorAll('.carousel-slide');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
const carouselIndicators = document.querySelector('.carousel-indicators');
const indicators = document.querySelectorAll('.indicator');

let counter = 0;
const slideWidth = carouselSlide[0].offsetWidth; // Ancho de cada slide

// Inicializar el primer slide como visible
carouselSlide[0].style.display = 'block';
indicators[0].classList.add('active');

// Función para mostrar un slide específico
function goToSlide(index) {
  carouselSlide.forEach((slide) => {
    slide.style.display = 'none';
  });
  indicators.forEach((indicator) => {
    indicator.classList.remove('active');
  });

  carouselSlide[index].style.display = 'block';
  indicators[index].classList.add('active');
  counter = index; // Actualizar el contador
}

// Evento para el botón "Anterior"
prevButton.addEventListener('click', () => {
  counter--;
  if (counter < 0) {
    counter = carouselSlide.length - 1;
  }
  goToSlide(counter);
});

// Evento para el botón "Siguiente"
nextButton.addEventListener('click', () => {
  counter++;
  if (counter >= carouselSlide.length) {
    counter = 0;
  }
  goToSlide(counter);
});

// Eventos para los indicadores
indicators.forEach((indicator) => {
  indicator.addEventListener('click', () => {
    const index = parseInt(indicator.dataset.index);
    goToSlide(index);
  });
});

// Opcional: Auto-desplazamiento
// function autoSlide() {
//   setInterval(() => {
//     counter++;
//     if (counter >= carouselSlide.length) {
//       counter = 0;
//     }
//     goToSlide(counter);
//   }, 3000); // Cambia la velocidad (en milisegundos)
// }

// autoSlide();
