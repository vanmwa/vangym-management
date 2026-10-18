<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact Evolve Fit. Send us a message about memberships, classes or billing, or reach us by phone and email.">
    <title>Contact Us | Evolve Fit</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>
    <a href="#contact-form" class="skip-link">Skip to contact form</a>

    <!--Navbar-->
    <?php include("navbar.php");?>

    <main id="main">

        <!-- Hero -->
        <section class="ct-hero" aria-labelledby="ct-title">
            <img src="../img/contactImg/pexels-ketut-subiyanto-4853268.jpg" alt="" class="ct-hero-img" fetchpriority="high">
            <div class="ct-hero-overlay"></div>
            <div class="container ct-hero-content">
                <nav aria-label="Breadcrumb">
                    <ol class="crumbs">
                        <li><a href="index.php">Home</a></li>
                        <li aria-current="page">Contact</li>
                    </ol>
                </nav>
                <span class="eyebrow">Get in touch</span>
                <h1 id="ct-title">Let&rsquo;s <span class="accent">Talk</span></h1>
                <p>We&rsquo;d love to hear from you! Send us a message or reach us using the details below.</p>
            </div>
        </section>

        <!-- Contact -->
        <section class="contact" aria-labelledby="contact-title">
            <div class="container">
                <div class="row g-5">

                    <!-- Info -->
                    <div class="col-lg-5 reveal reveal-left">
                        <span class="eyebrow">Contact details</span>
                        <h2 id="contact-title" class="section-title">We&rsquo;re Here to Help</h2>
                        <p class="intro-text">Questions about memberships, classes or billing? Pick the way that suits you best.</p>

                        <ul class="info-list">
                            <li>
                                <span class="info-icon"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i></span>
                                <div><strong>Visit us</strong><span>123 Fitness Ave, Suite 101, Cityville</span></div>
                            </li>
                            <li>
                                <span class="info-icon"><i class="bi bi-telephone-fill" aria-hidden="true"></i></span>
                                <div><strong>Call us</strong><a href="tel:+631234567890">(123) 456-7890</a></div>
                            </li>
                            <li>
                                <span class="info-icon"><i class="bi bi-envelope-fill" aria-hidden="true"></i></span>
                                <div><strong>Email us</strong><a href="mailto:info@evolvefit.com">info@evolvefit.com</a></div>
                            </li>
                            <li>
                                <span class="info-icon"><i class="bi bi-clock-fill" aria-hidden="true"></i></span>
                                <div><strong>Open</strong><span>7 days a week</span></div>
                            </li>
                        </ul>

                        <div class="social" aria-label="Social media">
                            <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" aria-label="X (Twitter)"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                        </div>

                        <a href="faq.php" class="faq-link">
                            <i class="bi bi-question-circle-fill" aria-hidden="true"></i>
                            <span>Looking for quick answers? <strong>Check our FAQ</strong></span>
                            <i class="bi bi-arrow-right arrow" aria-hidden="true"></i>
                        </a>
                    </div>

                    <!-- Form -->
                    <div class="col-lg-7 reveal reveal-right">
                        <div class="form-card" id="contact-form">
                            <h2 class="form-title">Send Us a Message</h2>
                            <p class="form-sub">Fields marked <span class="req">*</span> are required.</p>

                            <form id="contactForm" novalidate>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="fname" class="form-label">First name <span class="req">*</span></label>
                                        <input type="text" id="fname" name="fname" class="form-control" autocomplete="given-name" required>
                                        <div class="invalid-feedback">Please enter your first name.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lname" class="form-label">Last name <span class="req">*</span></label>
                                        <input type="text" id="lname" name="lname" class="form-control" autocomplete="family-name" required>
                                        <div class="invalid-feedback">Please enter your last name.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email <span class="req">*</span></label>
                                        <input type="email" id="email" name="email" class="form-control" autocomplete="email" required>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mobile" class="form-label">Mobile number <span class="req">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">+63</span>
                                            <input type="tel" id="mobile" name="mobile" class="form-control" autocomplete="tel-national" inputmode="numeric" placeholder="9XX XXX XXXX" required pattern="[0-9 ]{9,12}">
                                            <div class="invalid-feedback">Enter a valid mobile number.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="topic" class="form-label">I would like to talk about <span class="req">*</span></label>
                                        <select id="topic" name="topic" class="form-select" required>
                                            <option value="" selected disabled>Choose a topic</option>
                                            <option>Membership</option>
                                            <option>Classes</option>
                                            <option>Billing</option>
                                            <option>Facilities</option>
                                            <option>Personal training</option>
                                            <option>Corporate plans</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="invalid-feedback">Please choose a topic.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contact_time" class="form-label">Preferred contact time</label>
                                        <select id="contact_time" name="contact_time" class="form-select">
                                            <option value="" selected>Any time</option>
                                            <option>Morning</option>
                                            <option>Afternoon</option>
                                            <option>Evening</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="membership_no" class="form-label">Membership number <span class="opt">(optional)</span></label>
                                        <input type="text" id="membership_no" name="membership_no" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label for="comments" class="form-label">Message <span class="req">*</span></label>
                                        <textarea id="comments" name="comments" class="form-control" rows="5" maxlength="600" required></textarea>
                                        <div class="field-foot">
                                            <div class="invalid-feedback">Please tell us how we can help.</div>
                                            <span class="counter" id="counter" aria-live="polite">0 / 600</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms" required>
                                            <label class="form-check-label" for="terms">
                                                I&rsquo;ve read and agree to the <a href="#">terms</a> and <a href="#">data privacy policy</a>. <span class="req">*</span>
                                            </label>
                                            <div class="invalid-feedback">Please accept to continue.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-brand w-100">
                                            <i class="bi bi-send-fill" aria-hidden="true"></i> Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="form-success" id="formSuccess" role="status" tabindex="-1" hidden>
                                <i class="bi bi-envelope-check-fill" aria-hidden="true"></i>
                                <h3>Almost there!</h3>
                                <p>Your email app should now open with your message ready to send to <strong>info@evolvefit.com</strong>. Just press send.</p>
                                <button type="button" class="btn btn-outline-brand" id="again">Write another message</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!--Footer-->
    <?php include("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/contact.js"></script>
</body>
</html>
