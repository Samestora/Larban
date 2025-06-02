import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        const target = parseFloat(counter.dataset.target);
        const suffix = counter.dataset.suffix || '';
        const increment = target / 100;
        let current = 0;

        const updateCounter = () => {
            current += increment;
            if (current >= target) {
                current = target;
            }

            if (suffix.includes('K+')) {
                counter.textContent = Math.floor(current / 1000) + 'K+';
            } else if (suffix === '%') {
                counter.textContent = current.toFixed(1) + '%';
            } else {
                counter.textContent = Math.floor(current) + suffix;
            }

            if (current < target) {
                requestAnimationFrame(updateCounter);
            }
        };

        updateCounter();
    });
});

