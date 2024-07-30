document.addEventListener('DOMContentLoaded', () => {
    const carrosseis = document.querySelectorAll('.carrossel');

    carrosseis.forEach(carrossel => {
        const carrosselContent = carrossel.querySelector('.carrossel-content');
        const setaEsquerda = carrossel.querySelector('.seta-esquerda');
        const setaDireita = carrossel.querySelector('.seta-direita');

        let scrollAmount = 0;

        setaEsquerda.addEventListener('click', () => {
            const scrollStep = carrosselContent.clientWidth;
            if (scrollAmount > 0) {
                scrollAmount -= scrollStep;
                carrosselContent.scrollTo({
                    top: 0,
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        });

        setaDireita.addEventListener('click', () => {
            const scrollStep = carrosselContent.clientWidth;
            if (scrollAmount < carrosselContent.scrollWidth - carrosselContent.clientWidth) {
                scrollAmount += scrollStep;
                carrosselContent.scrollTo({
                    top: 0,
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        });
    });
});


