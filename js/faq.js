// FAQ page: search and topic filter. Without JS every question stays visible.
(function () {
    var input = document.getElementById('faq-search');
    var chips = document.querySelectorAll('.chip');
    var items = document.querySelectorAll('.faq-item');
    var empty = document.getElementById('faq-empty');
    if (!input || !items.length) return;

    var filter = 'all';

    function apply() {
        var term = input.value.trim().toLowerCase();
        var shown = 0;

        items.forEach(function (item) {
            var inCat = filter === 'all' || item.getAttribute('data-category') === filter;
            var inText = !term || item.textContent.toLowerCase().indexOf(term) !== -1;
            var show = inCat && inText;
            item.hidden = !show;
            if (show) shown++;
        });

        if (empty) empty.hidden = shown !== 0;
    }

    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            filter = chip.getAttribute('data-filter');
            chips.forEach(function (c) {
                var on = c === chip;
                c.classList.toggle('active', on);
                c.setAttribute('aria-pressed', on ? 'true' : 'false');
            });
            apply();
        });
    });

    input.addEventListener('input', apply);
})();
