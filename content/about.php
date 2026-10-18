<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn about Evolve Fit: our mission, our objectives and the digital membership and attendance system that makes training simple.">
    <title>About Us | Evolve Fit</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/about.css">
</head>
<body>
    <a href="#aboutPage" class="skip-link">Skip to main content</a>

    <!--Navbar-->
    <?php include("navbar.php");?>

    <main id="aboutPage">

        <!-- Hero -->
        <section class="about-hero" aria-labelledby="about-title">
            <img src="../img/aboutImg/about_section.jpg" alt="" class="about-hero-img" fetchpriority="high">
            <div class="about-hero-overlay"></div>
            <div class="container about-hero-content">
                <nav aria-label="Breadcrumb">
                    <ol class="crumbs">
                        <li><a href="index.php">Home</a></li>
                        <li aria-current="page">About</li>
                    </ol>
                </nav>
                <span class="eyebrow">About Evolve Fit</span>
                <h1 id="about-title">Fitness, Made <span class="accent">Simple</span> &amp; Smart</h1>
                <p>
                    A modern gym with a digital membership and attendance system that helps you
                    focus on what matters: showing up and getting stronger.
                </p>
                <div class="hero-actions">
                    <a href="../log_reg/log_reg.php#signup" class="btn btn-brand">Join Now</a>
                    <a href="#overview" class="btn btn-outline-light-custom">Learn More</a>
                </div>
            </div>
        </section>

        <!-- Overview -->
        <section class="about-section" id="overview">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 reveal reveal-left">
                        <span class="eyebrow">System overview</span>
                        <h2 class="section-title">One Place to Run the Whole Gym</h2>
                        <p class="lead-text">
                            Our Gym Membership &amp; Attendance Management System helps owners, administrators and staff
                            handle day-to-day operations with less effort and fewer mistakes.
                        </p>
                        <ul class="check-list">
                            <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Easy registration of new members</li>
                            <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Accurate attendance tracking</li>
                            <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Active and expired membership management</li>
                            <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Quick access to records, payments and status</li>
                        </ul>
                        <p>
                            By replacing manual processes with a digital solution, the system saves time, reduces errors
                            and keeps everything transparent and reliable.
                        </p>
                    </div>
                    <div class="col-lg-6 reveal reveal-right">
                        <figure class="photo-frame">
                            <img src="../img/aboutImg/about-img.jpg" alt="Members working out together in the gym" loading="lazy" width="800" height="560">
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <!-- How it works -->
        <section class="about-section alt" aria-labelledby="steps-title">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">How it works</span>
                    <h2 id="steps-title" class="section-title">Get Started in Three Steps</h2>
                </div>
                <div class="row g-4">
                    <div class="col-md-4 reveal">
                        <div class="step-card">
                            <span class="step-num">01</span>
                            <i class="bi bi-person-plus-fill step-icon" aria-hidden="true"></i>
                            <h3>Create Your Account</h3>
                            <p>Sign up in minutes with your details and get your own member profile.</p>
                        </div>
                    </div>
                    <div class="col-md-4 reveal">
                        <div class="step-card">
                            <span class="step-num">02</span>
                            <i class="bi bi-credit-card-2-front-fill step-icon" aria-hidden="true"></i>
                            <h3>Choose Your Plan</h3>
                            <p>Pick a membership that fits your routine and see your status and payments anytime.</p>
                        </div>
                    </div>
                    <div class="col-md-4 reveal">
                        <div class="step-card">
                            <span class="step-num">03</span>
                            <i class="bi bi-graph-up-arrow step-icon" aria-hidden="true"></i>
                            <h3>Train &amp; Track Progress</h3>
                            <p>Book classes, check in, and watch your attendance and streaks grow.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Objectives -->
        <section class="about-section" aria-labelledby="objectives-title">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">Our objectives</span>
                    <h2 id="objectives-title" class="section-title">What We Set Out to Achieve</h2>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 reveal">
                        <div class="objective-card">
                            <i class="bi bi-arrow-repeat" aria-hidden="true"></i>
                            <h3>Automate Membership Management</h3>
                            <p>Streamline registering, updating and renewing memberships through a digital platform.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 reveal">
                        <div class="objective-card">
                            <i class="bi bi-clipboard-data-fill" aria-hidden="true"></i>
                            <h3>Track Attendance Accurately</h3>
                            <p>Monitor active members, spot peak hours and analyze trends in real time.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 reveal">
                        <div class="objective-card">
                            <i class="bi bi-file-earmark-x-fill" aria-hidden="true"></i>
                            <h3>Reduce Manual Paperwork</h3>
                            <p>Cut time-consuming manual work by digitizing records and reports.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 reveal">
                        <div class="objective-card">
                            <i class="bi bi-emoji-smile-fill" aria-hidden="true"></i>
                            <h3>Enhance Member Experience</h3>
                            <p>Offer quick check-ins and transparent membership details for a hassle-free visit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Community -->
        <section class="about-section alt" aria-labelledby="community-title">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 reveal reveal-left">
                        <figure class="photo-frame">
                            <img src="../img/aboutImg/pexels-rdne-6539870.jpg" alt="A diverse group of members in a community fitness session" loading="lazy" width="800" height="560">
                        </figure>
                    </div>
                    <div class="col-lg-6 reveal reveal-right">
                        <span class="eyebrow">Our vision</span>
                        <h2 id="community-title" class="section-title">Towards Healthier Communities, Towards a Healthier World</h2>
                        <p class="lead-text">
                            We believe true wellness begins within our communities. We make fitness accessible to all
                            and build inclusive spaces where everyone feels welcome.
                        </p>
                        <p>
                            By prioritizing sustainable practices and cultivating healthy cultures, we aim to create
                            a lasting impact that benefits our members, the environment and society at large.
                        </p>
                        <div class="value-pills">
                            <span><i class="bi bi-people-fill" aria-hidden="true"></i>Inclusive</span>
                            <span><i class="bi bi-unlock-fill" aria-hidden="true"></i>Accessible</span>
                            <span><i class="bi bi-tree-fill" aria-hidden="true"></i>Sustainable</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="cta-banner">
            <div class="container text-center reveal">
                <h2>Ready to Join the Evolve Fit Community?</h2>
                <p>Create your account today and take the first step.</p>
                <a href="../log_reg/log_reg.php#signup" class="btn btn-dark-custom">Become a Member</a>
                <a href="contact.php" class="btn btn-link-dark">Have questions? Contact us</a>
            </div>
        </section>

    </main>

    <!--Footer-->
    <?php include("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/index.js"></script>
</body>
</html>
