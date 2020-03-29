$(document).ready(function () {
    
    // Меню
    const toggleMenu = () => {

        const menu = document.querySelector('.nav__block'),
            body = document.querySelector('body'),
            maskNav = document.querySelector('.mask-nav');

        body.addEventListener('click', (event) => {

            let target = event.target;

            if (target.closest('.burger')) {
                menu.classList.add('nav__block-active');
                maskNav.style.display = 'block';
            } else if (target.classList.contains('nav__close') || 
                target.classList.contains('mask-nav')) {
                menu.classList.remove('nav__block-active');
                maskNav.style.display = 'none';
            } else if (target.tagName !== 'DIV') {
                menu.classList.remove('nav__block-active');
                maskNav.style.display = 'none';
            } else {
                return;
            }

        });

    };

    toggleMenu();

});