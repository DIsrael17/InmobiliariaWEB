import '../css/login.css'
import '../css/index.css'
import '../css/botones.css'

document.addEventListener('DOMContentLoaded', () => {
  const carousel = document.querySelector('.carousel');
  if (!carousel) {
    return;
  }

  const scrollStep = 1; // píxeles por paso
  const intervalMs = 16; // ~60fps

  setInterval(() => {
    if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 0.5) {
      carousel.scrollLeft = 0; // Reinicia el scroll al inicio si llega al final
    } else {
      carousel.scrollLeft += scrollStep; // Desplaza el scroll hacia la derecha
    }
  }, intervalMs);
});