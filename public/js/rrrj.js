
document.addEventListener("DOMContentLoaded", function () {
    const reduceMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    if (reduceMotion || !("IntersectionObserver" in window)) {
        return;
    }

    // Animasi semua section saat scroll naik atau turun
    const elements = document.querySelectorAll("[data-reveal]");

    document.documentElement.classList.add("motion-ready");

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            const visible = entry.isIntersecting &&
                            entry.intersectionRatio >= 0.15;

            if (visible) {
                entry.target.classList.add("is-visible");
            } else {
                entry.target.classList.remove("is-visible");
            }
        });
    }, {
        threshold: [0, 0.15],
        rootMargin: "0px 0px -4% 0px"
    });

    elements.forEach(function (element) {
        observer.observe(element);
    });


    // Ulangi animasi hero ketika kembali ke atas
    const hero = document.querySelector(".lux-hero");

    if (hero) {
        let heroVisible = false;

        const heroObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                const visible = entry.isIntersecting &&
                                entry.intersectionRatio >= 0.15;

                if (visible && !heroVisible) {
                    hero.classList.remove("hero-playing");

                    // Reset animasi sebelum dijalankan lagi
                    void hero.offsetWidth;

                    hero.classList.add("hero-playing");
                }

                if (!visible) {
                    hero.classList.remove("hero-playing");
                }

                heroVisible = visible;
            });
        }, {
            threshold: [0, 0.15]
        });

        heroObserver.observe(hero);
    }


    // Filter kategori tema tanpa database
    const filterButtons = document.querySelectorAll("[data-filter]");
    const themeCards = document.querySelectorAll("[data-category]");

    filterButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const category = button.dataset.filter;

            filterButtons.forEach(function (item) {
                const active = item === button;

                item.classList.toggle("is-active", active);
                item.setAttribute("aria-pressed", String(active));
            });

            themeCards.forEach(function (card) {
                const matches = category === "semua" ||
                                card.dataset.category === category;

                card.hidden = !matches;

                if (!matches) {
                    card.classList.remove("is-visible");
                }
            });
        });
    });
});
