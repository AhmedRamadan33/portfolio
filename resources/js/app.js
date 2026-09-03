import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');

    if (navbar) {
        const handleNavbarScroll = () => {
            const scrolled = window.scrollY > 50;
            navbar.classList.toggle('bg-soft-white', scrolled);
            navbar.classList.toggle('border-b', scrolled);
            navbar.classList.toggle('border-gray-300', scrolled);
            navbar.classList.toggle('bg-white', !scrolled);
        };
        window.addEventListener('scroll', handleNavbarScroll);
        handleNavbarScroll();
    }

    document.querySelectorAll('[data-menu-link]').forEach((link) => {
        link.addEventListener('click', () => {
            if (document.activeElement instanceof HTMLElement) {
                document.activeElement.blur();
            }
        });
    });

    const scrollToTopBtn = document.getElementById('scroll-to-top');

    if (scrollToTopBtn) {
        const handleScrollToTopVisibility = () => {
            scrollToTopBtn.classList.toggle('scale-0', window.scrollY < 200);
        };
        window.addEventListener('scroll', handleScrollToTopVisibility);
        handleScrollToTopVisibility();

        scrollToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    const navLinks = document.querySelectorAll('[data-nav-link]');

    if (navLinks.length) {
        const spyObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        navLinks.forEach((link) => {
                            link.classList.toggle(
                                'text-picto-primary',
                                link.getAttribute('href') === `#${entry.target.id}`
                            );
                        });
                    }
                });
            },
            { rootMargin: '-45% 0px -50% 0px' }
        );

        navLinks.forEach((link) => {
            const id = link.getAttribute('href')?.replace('#', '');
            const target = id ? document.getElementById(id) : null;
            if (target) {
                spyObserver.observe(target);
            }
        });
    }

    const revealTargets = document.querySelectorAll('.reveal');

    if (revealTargets.length) {
        const revealObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.1 }
        );

        revealTargets.forEach((target) => revealObserver.observe(target));
    }
});
