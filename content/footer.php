<style>
/* ================================
   Footer - Gym Themed
================================= */
.footer {
    background: linear-gradient(135deg, #0b0b0b, #1a1a1a);
    color: #ccc;
    padding: 4rem 10%;
    border-top: 4px solid #9fdc35;
    transition: background-color 0.3s ease;
    animation: fadeInUp 1s ease-in-out;
}

.footer:hover {
    background-color: #1f1f1f;
}

.footer h5 {
    color: #fff;
    font-weight: 700;
    margin-bottom: 1.5rem;
    font-size: 1.25rem;
    position: relative;
    transition: all 0.3s ease-in-out;
}

.footer h5::after {
    content: "";
    position: absolute;
    bottom: -8px;
    left: 0;
    height: 3px;
    width: 0;
    background-color: #9fdc35;
    transition: width 0.4s ease;
}

.footer h5:hover::after {
    width: 50px;
}

.footer .footer-logo {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #9fdc35;
    margin-bottom: 1rem;
    transition: transform 0.6s ease, box-shadow 0.4s ease;
}

.footer .footer-logo:hover {
    transform: rotate(1turn) scale(1.05);
    box-shadow: 0 0 15px #9fdc35;
}

.footer .list-unstyled a {
    color: #bbbbbb;
    text-decoration: none;
    font-size: 1rem;
    transition: color 0.3s ease, transform 0.3s ease;
}

.footer .list-unstyled a:hover {
    color: #9fdc35;
    transform: translateX(5px);
}

.footer .social-icons a {
    color: #fff;
    margin-right: 1.5rem;
    font-size: 1.5rem;
    transition: transform 0.3s ease, color 0.3s ease, text-shadow 0.3s ease;
}

.footer .social-icons a:hover {
    color: #9fdc35;
    transform: scale(1.2) rotate(5deg);
    text-shadow: 0 0 8px #9fdc35;
}

.footer .copyright {
    margin-top: 2rem;
    font-size: 0.85rem;
    text-align: center;
    font-weight: 500;
    color: #888;
}

/* ================================
   Fixed Arrow Button (Back to Top)
================================= */
.fixed-arrow-btn {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background-color: #9fdc35;
    color: #111;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 1.5rem;
    text-decoration: none;
    z-index: 1000;
    box-shadow: 0 8px 20px rgba(159, 220, 53, 0.5);
    transition: all 0.3s ease;
    animation: bounceIn 1s ease-out;
}

.fixed-arrow-btn:hover {
    background-color: #7fc02b;
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 12px 28px rgba(159, 220, 53, 0.7);
}

/* ================================
   Animations
================================= */
@keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(40px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes bounceIn {
    0% { opacity: 0; transform: scale(0.3); }
    50% { opacity: 1; transform: scale(1.05); }
    70% { transform: scale(0.95); }
    100% { transform: scale(1); }
}

/* ================================
   Responsive
================================= */
@media (max-width: 768px) {
    .footer {
        text-align: center;
    }

    .footer .social-icons {
        justify-content: center;
        margin-top: 1rem;
    }

    .footer-logo {
        margin: 0 auto 15px auto;
    }

    .footer h5::after {
        left: 50%;
        transform: translateX(-50%);
    }

    .fixed-arrow-btn {
        width: 45px;
        height: 45px;
        font-size: 1.2rem;
    }
}
</style>

  

  
  <footer class="footer" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <img src="../img/logo.png" alt="Logo" class="footer-logo">
                <p class="text-white-50">Empowering you to evolve and achieve your fitness goals. Join our community and transform your life.</p>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#features">Features</a></li>
                    <li><a href="membership.php">Membership</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li><a href="#">
                        <i class="fa-solid fa-location-dot"></i>123 Fitness Ave, Suite 101, Cityville</a></li>
                    <li><a href="#">
                        <i class="fa-solid fa-phone"></i>
                        (123) 456-7890</a></li>
                    <li><a href="#">
                        <i class="fa-solid fa-envelope"></i>
                        info@evolvefit.com</a></li>
                </ul>
                <div class="social-icons mt-3">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p class="mb-0">&copy; 2025 Evolve Fit. All rights reserved.</p>
        </div>
    </div>
</footer>

<a href="#" class="fixed-arrow-btn" aria-label="Back to top">
    <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
</a>
