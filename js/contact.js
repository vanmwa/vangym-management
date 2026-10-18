// Contact page: validation, character counter and a mailto hand-off.
// There is no server-side mail handler yet, so submitting opens the visitor's email app
// with the message pre-filled instead of pretending it was sent.
(function () {
    var form = document.getElementById('contactForm');
    if (!form) return;

    var success = document.getElementById('formSuccess');
    var again = document.getElementById('again');
    var comments = document.getElementById('comments');
    var counter = document.getElementById('counter');
    var TO = 'info@evolvefit.com';

    function updateCounter() {
        counter.textContent = comments.value.length + ' / ' + comments.maxLength;
    }
    comments.addEventListener('input', updateCounter);

    // Clear error state as the user fixes a field
    form.addEventListener('input', function (e) {
        if (e.target.classList && e.target.classList.contains('is-invalid') && e.target.checkValidity()) {
            e.target.classList.remove('is-invalid');
        }
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        var fields = form.querySelectorAll('input, select, textarea');
        var firstBad = null;
        fields.forEach(function (f) {
            var ok = f.checkValidity();
            f.classList.toggle('is-invalid', !ok);
            if (!ok && !firstBad) firstBad = f;
        });

        if (firstBad) {
            firstBad.focus();
            return;
        }

        var v = function (id) { return form.elements[id] ? form.elements[id].value.trim() : ''; };
        var subject = 'Website inquiry: ' + v('topic');
        var body = [
            'Name: ' + v('fname') + ' ' + v('lname'),
            'Email: ' + v('email'),
            'Mobile: +63 ' + v('mobile'),
            'Preferred contact time: ' + (v('contact_time') || 'Any time'),
            'Membership number: ' + (v('membership_no') || 'N/A'),
            '',
            v('comments')
        ].join('\n');

        window.location.href = 'mailto:' + TO +
            '?subject=' + encodeURIComponent(subject) +
            '&body=' + encodeURIComponent(body);

        form.hidden = true;
        success.hidden = false;
        success.focus();
    });

    again.addEventListener('click', function () {
        form.reset();
        form.querySelectorAll('.is-invalid').forEach(function (f) { f.classList.remove('is-invalid'); });
        updateCounter();
        success.hidden = true;
        form.hidden = false;
        document.getElementById('fname').focus();
    });

    updateCounter();
})();
