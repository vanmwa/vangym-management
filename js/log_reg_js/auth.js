// Sign in / Sign up page: tab switching, password toggles, strength meter and helpers
// shared by login.js and register.js (exposed on window.Auth).
(function () {
    var tabs = document.querySelectorAll('.tab');
    var panels = document.querySelectorAll('.tab-panel');
    var indicator = document.querySelector('.tab-indicator');

    function showTab(name, focus) {
        tabs.forEach(function (t) {
            var on = t.getAttribute('data-tab') === name;
            t.classList.toggle('active', on);
            t.setAttribute('aria-selected', on ? 'true' : 'false');
            t.tabIndex = on ? 0 : -1;
        });
        panels.forEach(function (p) {
            var on = p.id === 'panel-' + name;
            p.classList.toggle('active', on);
            p.setAttribute('aria-hidden', on ? 'false' : 'true');
            if (on) p.removeAttribute('inert'); else p.setAttribute('inert', '');
            // direction hint for the slide transition
            p.setAttribute('data-side', name === 'signup' ? (on ? 'center' : 'left') : (on ? 'center' : 'right'));
        });
        if (indicator) indicator.style.transform = name === 'signup' ? 'translateX(100%)' : 'translateX(0)';
        document.title = (name === 'signup' ? 'Sign Up' : 'Sign In') + ' | Evolve Fit';
        if (focus) {
            var first = document.querySelector('#panel-' + name + ' input');
            if (first) first.focus();
        }
    }

    document.querySelectorAll('[data-tab]').forEach(function (el) {
        el.addEventListener('click', function () {
            showTab(el.getAttribute('data-tab'), el.classList.contains('link-btn'));
        });
    });

    // Arrow-key navigation between tabs
    document.querySelector('.tabs').addEventListener('keydown', function (e) {
        if (e.key !== 'ArrowLeft' && e.key !== 'ArrowRight') return;
        var next = e.key === 'ArrowRight' ? 'signup' : 'signin';
        showTab(next);
        document.getElementById('tab-' + next).focus();
    });

    // Initial slide positions
    panels.forEach(function (p) {
        p.setAttribute('data-side', p.classList.contains('active') ? 'center' : 'right');
    });

    // Open the sign up tab from links like log_reg.php#signup
    if (location.hash === '#signup') showTab('signup');

    // Show / hide password
    document.querySelectorAll('.toggle-pw').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = document.getElementById(btn.getAttribute('data-target'));
            var show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            btn.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
            btn.firstElementChild.className = show ? 'fa-regular fa-eye-slash' : 'fa-regular fa-eye';
        });
    });

    // Password strength meter (visual hint only)
    var pw = document.getElementById('member_password');
    var meter = document.getElementById('strength');
    var meterText = document.getElementById('strength-text');
    var labels = ['Too weak', 'Weak', 'Okay', 'Good', 'Strong'];

    if (pw && meter) {
        pw.addEventListener('input', function () {
            var v = pw.value;
            var score = 0;
            if (v.length >= 8) score++;
            if (/[a-z]/.test(v) && /[A-Z]/.test(v)) score++;
            if (/\d/.test(v)) score++;
            if (/[^A-Za-z0-9]/.test(v) || v.length >= 12) score++;
            if (!v) score = -1;

            meter.setAttribute('data-score', String(Math.max(score, 0)));
            meter.classList.toggle('on', v.length > 0);
            meterText.textContent = v ? 'Strength: ' + labels[score] : '8+ characters, letters and numbers';
        });
    }

    // Shared helpers
    function clearErrors(form) {
        form.querySelectorAll('.field-error').forEach(function (p) { p.hidden = true; p.textContent = ''; });
        form.querySelectorAll('.input.invalid').forEach(function (i) { i.classList.remove('invalid'); });
        form.querySelectorAll('input[aria-invalid]').forEach(function (i) { i.removeAttribute('aria-invalid'); });
    }

    function showFieldError(field, message) {
        var p = document.getElementById(field + '-error-msg');
        var input = document.getElementById(field);
        if (!p) return false;
        p.textContent = message;
        p.hidden = false;
        if (input) {
            input.setAttribute('aria-invalid', 'true');
            var box = input.parentElement;
            box.classList.add('invalid');
            box.classList.remove('shake');
            void box.offsetWidth; // restart animation
            box.classList.add('shake');
            input.focus();
        }
        return true;
    }

    function showNotice(id, message) {
        var n = document.getElementById(id);
        if (!n) return;
        n.textContent = message;
        n.hidden = !message;
    }

    function setLoading(form, on) {
        var btn = form.querySelector('.submit');
        btn.disabled = on;
        btn.classList.toggle('loading', on);
    }

    window.Auth = {
        showTab: showTab,
        clearErrors: clearErrors,
        showFieldError: showFieldError,
        showNotice: showNotice,
        setLoading: setLoading
    };

    // Clear a field's error as soon as the user edits it
    document.addEventListener('input', function (e) {
        var input = e.target;
        if (!input.matches || !input.matches('.input input')) return;
        var p = document.getElementById(input.id + '-error-msg');
        if (p) { p.hidden = true; }
        input.parentElement.classList.remove('invalid');
        input.removeAttribute('aria-invalid');
    });
})();
