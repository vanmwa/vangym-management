// Class page: filter the class grid by category. Without JS all classes stay visible.
(function () {
    var buttons = document.querySelectorAll('.filter-btn');
    var items = document.querySelectorAll('.class-item');
    var empty = document.getElementById('no-results');
    if (!buttons.length || !items.length) return;

    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var filter = btn.getAttribute('data-filter');
            var shown = 0;

            buttons.forEach(function (b) {
                var on = b === btn;
                b.classList.toggle('active', on);
                b.setAttribute('aria-pressed', on ? 'true' : 'false');
            });

            items.forEach(function (item) {
                var match = filter === 'all' || item.getAttribute('data-category') === filter;
                item.hidden = !match;
                if (match) shown++;
            });

            if (empty) empty.hidden = shown !== 0;
        });
    });
})();
