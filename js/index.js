// Scroll-reveal for landing page sections. Content stays visible if JS or IntersectionObserver is unavailable.
(function () {
    var items = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window) || !items.length) return;

    document.documentElement.classList.add('js');

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    items.forEach(function (el) { observer.observe(el); });
})();
