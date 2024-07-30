let currentIndex = 0;

function showNextImage() {
    const carousel = document.querySelector('.carousel');
    const images = document.querySelectorAll('.carousel img');
    currentIndex = (currentIndex + 1) % images.length;
    const offset = -currentIndex * 100;
    carousel.style.transform = `translateX(${offset}%)`;
}

setInterval(showNextImage, 3000);


