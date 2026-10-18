<?php
// Highlight the link for the page being viewed
$currentPage = basename($_SERVER['PHP_SELF']);
$navLinks = [
    'about.php'      => 'About',
    'facilities.php' => 'Facilities',
    'class.php'      => 'Classes',
    'membership.php' => 'Membership',
    'faq.php'        => 'FAQ',
    'contact.php'    => 'Contact',
];
?>
<style>
/* ================================
   Navbar - compact, dark, lime accent
================================= */
.navbar-custom {
    background: rgba(11, 11, 11, 0.92);
    -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
    border-bottom: 1px solid #242424;
    padding: 0.55rem 1.5rem;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.35);
    transition: padding 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
}

header.scrolled .navbar-custom {
    padding: 0.35rem 1.5rem;
    background: rgba(11, 11, 11, 0.97);
    box-shadow: 0 6px 22px rgba(0, 0, 0, 0.6);
}

/* Brand */
.navbar-custom .navbar-brand {
    display: flex;
    align-items: center;
    gap: 0.65rem;
    margin-right: 1.5rem;
    padding: 0;
    text-decoration: none;
}

.navbar-custom .navbar-brand img {
    height: 42px;
    width: 42px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid #9fdc35;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
}

.navbar-custom .navbar-brand:hover img {
    transform: rotate(-6deg) scale(1.06);
    box-shadow: 0 0 12px rgba(159, 220, 53, 0.6);
}

.navbar-custom .brand-text {
    font-size: 1.05rem;
    font-weight: 800;
    letter-spacing: 0.06em;
    color: #fff;
    line-height: 1;
}

.navbar-custom .brand-text span { color: #9fdc35; }

/* Links */
.navbar-custom .nav-link {
    position: relative;
    margin: 0 0.15rem;
    padding: 0.55rem 0.8rem;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: #e6e6e6 !important;
    transition: color 0.25s ease;
}

.navbar-custom .nav-link::after {
    content: "";
    position: absolute;
    left: 0.8rem;
    right: 0.8rem;
    bottom: 0.2rem;
    height: 2px;
    background: #9fdc35;
    border-radius: 2px;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.navbar-custom .nav-link:hover,
.navbar-custom .nav-link.active {
    color: #9fdc35 !important;
    transform: none;
}

.navbar-custom .nav-link:hover::after,
.navbar-custom .nav-link.active::after {
    transform: scaleX(1);
}

.navbar-custom .nav-link:focus-visible,
.navbar-custom .navbar-brand:focus-visible,
.navbar-custom .navbar-toggler:focus-visible,
.admin-btn:focus-visible,
.account-btn:focus-visible {
    outline: 3px solid #9fdc35;
    outline-offset: 2px;
    box-shadow: none;
}

/* Buttons */
.nav-actions {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    margin-left: 0.75rem;
}

.admin-btn,
.account-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    padding: 0.5rem 1.15rem;
    font-size: 0.78rem;
    font-weight: 800;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    text-decoration: none;
    white-space: nowrap;
    border-radius: 999px;
    transition: background-color 0.25s ease, color 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
}

.admin-btn {
    background: #9fdc35;
    color: #111;
    border: 2px solid #9fdc35;
    box-shadow: none;
}

.admin-btn:hover {
    background: #b6e54d;
    border-color: #b6e54d;
    color: #111;
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(159, 220, 53, 0.4);
}

.account-btn {
    background: transparent;
    color: #9fdc35;
    border: 2px solid #9fdc35;
    margin: 0 !important;
}

.account-btn:hover {
    background: #9fdc35;
    color: #111;
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(159, 220, 53, 0.3);
}

/* Mobile toggler */
.navbar-custom .navbar-toggler {
    border: 1px solid #3a3a3a;
    border-radius: 8px;
    padding: 0.35rem 0.6rem;
}

.navbar-custom .navbar-toggler:hover { border-color: #9fdc35; }

/* ================================
   Responsive (collapsed menu)
================================= */
@media (max-width: 991.98px) {
    .navbar-custom { padding: 0.5rem 1rem; }
    header.scrolled .navbar-custom { padding: 0.4rem 1rem; }

    .navbar-custom .navbar-collapse {
        margin-top: 0.6rem;
        padding: 0.75rem 0 1rem;
        border-top: 1px solid #242424;
    }

    .navbar-custom .nav-link {
        margin: 0;
        padding: 0.8rem 0.25rem;
        border-bottom: 1px solid #1d1d1d;
    }

    .navbar-custom .nav-link::after { display: none; }

    .navbar-custom .nav-link.active { padding-left: 0.75rem; border-left: 3px solid #9fdc35; }

    .nav-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 0.6rem;
        margin: 1rem 0 0;
    }

    .admin-btn,
    .account-btn { width: 100%; padding: 0.7rem 1rem; }
}

@media (max-width: 380px) {
    .navbar-custom .brand-text { font-size: 0.9rem; }
}

@media (prefers-reduced-motion: reduce) {
    .navbar-custom,
    .navbar-custom *,
    .admin-btn,
    .account-btn { transition: none !important; }
}
</style>

<header class="position-fixed top-0 start-0 w-100 z-3">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom" aria-label="Main navigation">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php" aria-label="Evolve Fit home">
                <img src="../img/logo.png" alt="">
                <span class="brand-text">EVOLVE <span>FIT</span></span>
            </a>

            <!-- Toggle button for responsive navigation -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Items -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <?php foreach ($navLinks as $file => $label): ?>
                        <?php $isActive = ($currentPage === $file); ?>
                        <li class="nav-item">
                            <a class="nav-link<?= $isActive ? ' active' : '' ?>" href="<?= $file ?>"<?= $isActive ? ' aria-current="page"' : '' ?>><?= $label ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="nav-actions">
                    <a href="../log_reg/log_reg.php#signup" class="admin-btn">Join Us</a>
                    <a href="../log_reg/log_reg.php" class="account-btn">
                        <i class="fa-solid fa-user" aria-hidden="true"></i>
                        My Account
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
