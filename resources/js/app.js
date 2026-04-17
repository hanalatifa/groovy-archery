document.addEventListener('DOMContentLoaded', () => {
    const gradient = new Gradient();
    gradient.initGradient('#gradient-canvas');

    const counters = document.querySelectorAll('.counter');
    const speed = 50;

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {

                const counter = entry.target;
                const target = +counter.dataset.target;

                const update = () => {
                    const count = +counter.innerText;
                    const inc = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + inc);
                        setTimeout(update, 20);
                    } else {
                        counter.innerText = target;
                    }
                };

                update();
                obs.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => observer.observe(c));
});