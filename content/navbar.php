<style>
/* ================================
   Navbar & Header - Gym Revamp
================================= */
.navbar-custom {
    background: linear-gradient(90deg, #0b0b0b, #1a1a1a); /* Dark gym look */
    padding: 1rem 2rem;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
    transition: all 0.4s ease-in-out;
    animation: slideDown 1s ease-in-out;
}

@keyframes slideDown {
    0% { transform: translateY(-100%); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}

.navbar-brand img {
    height: 60px;
    width: 60px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid #9fdc35; /* Gym green */
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.navbar-brand img:hover {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 0 15px #9fdc35;
}

.nav-link {
    font-weight: 600;
    font-size: 0.95rem;
    text-transform: uppercase;
    margin: 0 0.75rem;
    color: #fff !important;
    position: relative;
    transition: all 0.3s ease-in-out;
}

.nav-link::after {
    content: "";
    position: absolute;
    bottom: -6px;
    left: 50%;
    width: 0;
    height: 2px;
    background-color: #9fdc35; /* Accent green */
    transition: width 0.3s ease, left 0.3s ease;
}

.nav-link:hover::after {
    width: 100%;
    left: 0;
}

.nav-link:hover {
    color: #9fdc35 !important;
    transform: scale(1.1);
}

/* ================================
   Buttons
================================= */
.admin-btn {
    background: linear-gradient(45deg, #9fdc35, #7fc02b);
    color: #111;
    font-weight: bold;
    padding: 0.6rem 1.6rem;
    border-radius: 30px;
    border: none;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 5px 15px rgba(159, 220, 53, 0.4);
}

.admin-btn:hover {
    background: linear-gradient(45deg, #b6e54d, #aadc35);
    transform: scale(1.05) translateY(-2px);
    box-shadow: 0 8px 25px rgba(159, 220, 53, 0.6);
    color: #111;
}

.account-btn {
    background-color: transparent;
    color: #9fdc35;
    font-weight: bold;
    padding: 0.6rem 1.6rem;
    border-radius: 30px;
    border: 2px solid #9fdc35;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
}

.account-btn:hover {
    background-color: #9fdc35;
    color: #111;
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(159, 220, 53, 0.4);
}

/* ================================
   Responsive
================================= */
@media (max-width: 768px) {
    .navbar-brand img {
        height: 50px;
        width: 50px;
    }
    .nav-link {
        margin: 0.5rem 0;
        text-align: center;
    }
    .admin-btn, .account-btn {
        width: 100%;
        margin: 0.5rem 0;
    }
}
</style>

<header class="position-fixed top-0 start-0 w-100 z-3">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand me-4" href="index.php">
                <img src="../img/logo.png" alt="Gym Logo">
            </a>

            <!-- Toggle button for responsive navigation -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Items -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="about.php">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="facilities.php">FACILITIES</a></li>
                    <li class="nav-item"><a class="nav-link" href="class.php">CLASS</a></li>
                    <li class="nav-item"><a class="nav-link" href="membership.php">MEMBERSHIP</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">CONTACT US</a></li>
                </ul>
                <a href="../log_reg/log_reg.php" class="admin-btn">JOIN US</a>
                <a href="../log_reg/log_reg.php" class="account-btn ms-lg-3 me-2">
                    <i class="fa-solid fa-user" aria-hidden="true"></i>
                    MY ACCOUNT
                </a>
            </div>
        </div>
    </nav>
</header>
