<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Evolve Fit is a modern gym offering guided classes, expert coaching and flexible memberships. Start your fitness journey today.">
    <title>Evolve Fit | Gym &amp; Fitness Club</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <a href="#main" class="skip-link">Skip to main content</a>

    <!--Navbar-->
    <?php include("navbar.php");?>

    <main id="main">

        <!-- Hero -->
        <section class="hero-section" id="landingpage" aria-labelledby="hero-title">
            <img src="../img/indexImg/pexels-willpicturethis-1954524.jpg" alt="" class="hero-image" fetchpriority="high">
            <div class="overlay"></div>
            <div class="hero-content">
                <span class="eyebrow">Evolve Fit &middot; Gym &amp; Fitness Club</span>
                <h1 id="hero-title">Build Your <span class="accent">Strongest</span> Self</h1>
                <p>
                    Expert-led classes, elite equipment and a community that pushes you further.
                    Whether you're just starting out or chasing a new personal best, there's a place for you here.
                </p>
                <div class="hero-actions">
                    <a href="../log_reg/log_reg.php#signup" class="btn btn-brand">Join Now</a>
                    <a href="membership.php" class="btn btn-outline-light-custom">View Memberships</a>
                </div>
            </div>
            <a href="#stats" class="scroll-hint" aria-label="Scroll to content"><i class="bi bi-chevron-double-down" aria-hidden="true"></i></a>
        </section>

        <!-- Stats -->
        <section class="stats-section" id="stats" aria-label="Evolve Fit at a glance">
            <div class="container">
                <div class="row g-4 text-center">
                    <div class="col-6 col-md-3 reveal">
                        <div class="stat-number"><span data-count="500">500</span>+</div>
                        <div class="stat-label">Active Members</div>
                    </div>
                    <div class="col-6 col-md-3 reveal">
                        <div class="stat-number"><span data-count="20">20</span>+</div>
                        <div class="stat-label">Expert Trainers</div>
                    </div>
                    <div class="col-6 col-md-3 reveal">
                        <div class="stat-number"><span data-count="50">50</span>+</div>
                        <div class="stat-label">Weekly Classes</div>
                    </div>
                    <div class="col-6 col-md-3 reveal">
                        <div class="stat-number">7 Days</div>
                        <div class="stat-label">Open Every Week</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section id="features" class="about-cards-section">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">What we offer</span>
                    <h2>Our Unique Approach, Something for Everyone</h2>
                    <p>
                        At Evolve Fit, we believe in a holistic approach to fitness.
                        We offer a variety of services designed to meet you wherever you are on your fitness journey.
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4 reveal">
                        <a href="class.php" class="feature-card" aria-label="Guided Classes - view classes">
                            <img src="../img/indexImg/gymclass.jpg" class="feature-img" alt="Group fitness class in progress" loading="lazy" width="600" height="400">
                            <div class="feature-body">
                                <h3>Guided Classes</h3>
                                <p>Workouts from professional coaches designed to help you achieve your fitness goals effectively and safely.</p>
                                <span class="feature-link">View classes <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 reveal">
                        <a href="about.php" class="feature-card" aria-label="Education and Coaching - learn about us">
                            <img src="../img/indexImg/coaching.jpg" class="feature-img" alt="Coach guiding a member on technique" loading="lazy" width="600" height="400">
                            <div class="feature-body">
                                <h3>Education &amp; Coaching</h3>
                                <p>Guidance on technique, form, and posture to empower you with the skills to succeed in your fitness journey.</p>
                                <span class="feature-link">Meet the team <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 reveal">
                        <a href="facilities.php" class="feature-card" aria-label="Open Gym - view facilities">
                            <img src="../img/indexImg/facilitate.jpg" class="feature-img" alt="Open gym floor with training equipment" loading="lazy" width="600" height="400">
                            <div class="feature-body">
                                <h3>Open Gym</h3>
                                <p>Elite-level equipment built for durability, performance, and helping you train like the pros.</p>
                                <span class="feature-link">See facilities <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Memberships -->
        <section id="membership-section" class="membership-section text-center">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">Pricing</span>
                    <h2>Choose Your Membership</h2>
                    <p>Simple monthly plans with no joining fees. Pick what fits your routine.</p>
                </div>

                <div class="row g-4 justify-content-center">

                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="membership-card">
                            <i class="bi bi-lightning-charge-fill plan-icon" aria-hidden="true"></i>
                            <h3>Flexi</h3>
                            <p class="price">&#8369;500<span class="price-cents">.00</span></p>
                            <p class="price-subtext">per month</p>
                            <ul class="features">
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>12 Classes Per Month</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>3 Classes Per Week</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>No joining fees</li>
                            </ul>
                            <a href="../log_reg/log_reg.php#signup" class="btn btn-brand w-100">Join Today</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="membership-card featured">
                            <span class="popular-badge">Most Popular</span>
                            <i class="bi bi-infinity plan-icon" aria-hidden="true"></i>
                            <h3>All Access</h3>
                            <p class="price">&#8369;1000<span class="price-cents">.00</span></p>
                            <p class="price-subtext">per month</p>
                            <ul class="features">
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Unlimited Classes Per Month</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>3 Classes Per Day</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>No joining fees</li>
                            </ul>
                            <a href="../log_reg/log_reg.php#signup" class="btn btn-brand w-100">Join Today</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="membership-card">
                            <i class="bi bi-clock-history plan-icon" aria-hidden="true"></i>
                            <h3>Off-Peak</h3>
                            <p class="price">&#8369;700<span class="price-cents">.00</span></p>
                            <p class="price-subtext">per month</p>
                            <ul class="features">
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>20 Classes Per Month</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>5 Classes Per Week</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>No joining fees</li>
                            </ul>
                            <a href="../log_reg/log_reg.php#signup" class="btn btn-brand w-100">Join Today</a>
                        </div>
                    </div>

                </div>
                <p class="mt-4 mb-0"><a href="membership.php" class="plain-link">Compare all membership options <i class="bi bi-arrow-right" aria-hidden="true"></i></a></p>
            </div>
        </section>

        <!-- Workout plan -->
        <section class="content-section" id="workout-plan">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 reveal reveal-left">
                        <span class="eyebrow">Free program</span>
                        <h2>4 Week <br>Workout Plan</h2>
                        <p>
                            Transform your body and mind in just 4 weeks.
                            Stay consistent, stay strong, and see the change happen.
                        </p>
                        <a href="contact.php" class="btn btn-brand">Try For Free</a>
                    </div>

                    <div class="col-lg-6 reveal reveal-right">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="img-zoom">
                                    <img src="../img/indexImg/pexels-anastasia-shuraeva-4944435.jpg" alt="Member performing a strength workout" class="img-fluid plan-image" loading="lazy" width="800" height="500">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-custom">
                                    <h3>Get Inspired</h3>
                                    <p>Push yourself today for a stronger tomorrow. Every rep takes you closer to your goals.</p>
                                    <a href="class.php" class="card-link">Explore More <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-custom">
                                    <h3>Challenge Yourself</h3>
                                    <p>Don&rsquo;t limit your challenges&mdash;challenge your limits. Prove to yourself what you&rsquo;re truly capable of.</p>
                                    <a href="facilities.php" class="card-link">Explore More <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials (sample copy: replace with real member feedback) -->
        <section class="testimonials-section" aria-labelledby="testimonials-title">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">Member stories</span>
                    <h2 id="testimonials-title">Real People, Real Results</h2>
                </div>
                <div class="row g-4">
                    <div class="col-md-4 reveal">
                        <figure class="testimonial">
                            <div class="stars" aria-label="5 out of 5 stars"><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i></div>
                            <blockquote>The coaches actually care. I learned proper form and finally feel confident in the gym.</blockquote>
                            <figcaption>Maria S. <span>Flexi member</span></figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 reveal">
                        <figure class="testimonial">
                            <div class="stars" aria-label="5 out of 5 stars"><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i></div>
                            <blockquote>Unlimited classes for one price is unbeatable. The community keeps me coming back.</blockquote>
                            <figcaption>James R. <span>All Access member</span></figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 reveal">
                        <figure class="testimonial">
                            <div class="stars" aria-label="5 out of 5 stars"><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i><i class="bi bi-star-fill" aria-hidden="true"></i></div>
                            <blockquote>Off-peak hours are quiet and the equipment is top-notch. Great value for my schedule.</blockquote>
                            <figcaption>Anna L. <span>Off-Peak member</span></figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA -->
        <section class="cta-banner">
            <div class="container text-center reveal">
                <h2>Ready to Start Your Journey?</h2>
                <p>Create your account in minutes and book your first class today.</p>
                <a href="../log_reg/log_reg.php#signup" class="btn btn-dark-custom">Join Evolve Fit</a>
            </div>
        </section>

    </main>

    <!--Footer-->
    <?php include("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/index.js"></script>
</body>
</html>
