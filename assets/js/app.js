const toggle = document.querySelector('.nav-toggle');
const navigation = document.querySelector('.main-nav');

if (toggle && navigation) {
    const closeMenu = () => {
        toggle.setAttribute('aria-expanded', 'false');
        navigation.classList.remove('open');
    };

    toggle.addEventListener('click', () => {
        const willOpen = toggle.getAttribute('aria-expanded') !== 'true';
        toggle.setAttribute('aria-expanded', String(willOpen));
        navigation.classList.toggle('open', willOpen);
    });

    navigation.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 760) {
            closeMenu();
        }
    });
}

