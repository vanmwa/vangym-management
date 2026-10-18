<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore Evolve Fit's facilities: cardio area, weightlifting zone, group exercise studio, functional training, boxing space and clean locker rooms.">
    <title>Facilities | Evolve Fit</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/facilities.css">
</head>
<body>
    <a href="#main" class="skip-link">Skip to main content</a>

    <!--Navbar-->
    <?php include("navbar.php");?>

    <main id="main">

        <!-- Hero -->
        <section class="fac-hero" aria-labelledby="fac-title">
            <img src="../img/facilitiesImg/pexels-totalshape-6046980.jpg" alt="" class="fac-hero-img" fetchpriority="high">
            <div class="fac-hero-overlay"></div>
            <div class="container fac-hero-content">
                <nav aria-label="Breadcrumb">
                    <ol class="crumbs">
                        <li><a href="index.php">Home</a></li>
                        <li aria-current="page">Facilities</li>
                    </ol>
                </nav>
                <span class="eyebrow">Train in style</span>
                <h1 id="fac-title">World-Class <span class="accent">Facilities</span></h1>
                <p>
                    State-of-the-art equipment and clean, spacious zones built to support every workout style,
                    from heavy lifting to yoga.
                </p>
                <div class="hero-actions">
                    <a href="#zones" class="btn btn-brand">Explore the Gym</a>
                    <a href="membership.php" class="btn btn-outline-light-custom">View Memberships</a>
                </div>
            </div>
        </section>

        <!-- Highlights -->
        <section class="highlights" aria-label="Facility highlights">
            <div class="container">
                <div class="row g-4">
                    <div class="col-6 col-lg-3 reveal">
                        <div class="highlight">
                            <i class="bi bi-lightning-charge-fill" aria-hidden="true"></i>
                            <div><strong>Modern Equipment</strong><span>Durable, pro-grade machines</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 reveal">
                        <div class="highlight">
                            <i class="bi bi-grid-3x3-gap-fill" aria-hidden="true"></i>
                            <div><strong>6 Training Zones</strong><span>A space for every style</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 reveal">
                        <div class="highlight">
                            <i class="bi bi-stars" aria-hidden="true"></i>
                            <div><strong>Clean &amp; Safe</strong><span>Sanitized every day</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 reveal">
                        <div class="highlight">
                            <i class="bi bi-people-fill" aria-hidden="true"></i>
                            <div><strong>Coach Support</strong><span>Help whenever you need it</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Zones -->
        <section class="zones" id="zones" aria-labelledby="zones-title">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">Our zones</span>
                    <h2 id="zones-title" class="section-title">Check Out Our Gym Facilities</h2>
                    <p>Everything you need to train, recover and stay motivated, all under one roof.</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="zone-card">
                            <div class="zone-media">
                                <img src="../img/facilitiesImg/gym-with-indoor-cycling-equipment.jpg" alt="Cardio area with indoor cycling bikes" loading="lazy" width="600" height="420">
                                <span class="zone-icon"><i class="bi bi-heart-pulse-fill" aria-hidden="true"></i></span>
                            </div>
                            <div class="zone-body">
                                <h3>Cardio Area</h3>
                                <p>Treadmills, stationary bikes and ellipticals for all endurance needs.</p>
                                <ul class="tags"><li>Treadmills</li><li>Bikes</li><li>Ellipticals</li></ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="zone-card">
                            <div class="zone-media">
                                <img src="../img/facilitiesImg/black-dumbbells-with-different-weight.jpg" alt="Rack of black dumbbells in different weights" loading="lazy" width="600" height="420">
                                <span class="zone-icon"><i class="fa-solid fa-dumbbell" aria-hidden="true"></i></span>
                            </div>
                            <div class="zone-body">
                                <h3>Weightlifting Zone</h3>
                                <p>Dumbbells, barbells, squat racks and benches for serious strength training.</p>
                                <ul class="tags"><li>Barbells</li><li>Squat racks</li><li>Benches</li></ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="zone-card">
                            <div class="zone-media">
                                <img src="../img/facilitiesImg/close-up-blue-dumbbells-floor-yoga-mat-train-muscles-physical-exercise-home-empty-space-with-lifting-weights-used-work-arms-sport-workout-equipment.jpg" alt="Blue dumbbells on a yoga mat in the group studio" loading="lazy" width="600" height="420">
                                <span class="zone-icon"><i class="bi bi-people-fill" aria-hidden="true"></i></span>
                            </div>
                            <div class="zone-body">
                                <h3>Group Exercise Studio</h3>
                                <p>A spacious studio for Zumba, yoga, HIIT and other group classes.</p>
                                <ul class="tags"><li>Zumba</li><li>Yoga</li><li>HIIT</li></ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="zone-card">
                            <div class="zone-media">
                                <img src="../img/facilitiesImg/equipments-gym.jpg" alt="Functional training equipment" loading="lazy" width="600" height="420">
                                <span class="zone-icon"><i class="bi bi-activity" aria-hidden="true"></i></span>
                            </div>
                            <div class="zone-body">
                                <h3>Functional Training</h3>
                                <p>Kettlebells, ropes and medicine balls for dynamic, functional workouts.</p>
                                <ul class="tags"><li>Kettlebells</li><li>Ropes</li><li>Medicine balls</li></ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="zone-card">
                            <div class="zone-media">
                                <img src="../img/facilitiesImg/punching-bags-rope-gym.jpg" alt="Punching bags and ropes in the boxing area" loading="lazy" width="600" height="420">
                                <span class="zone-icon"><i class="fa-solid fa-hand-fist" aria-hidden="true"></i></span>
                            </div>
                            <div class="zone-body">
                                <h3>Boxing &amp; Martial Arts</h3>
                                <p>A dedicated space with punching bags and mats for combat training.</p>
                                <ul class="tags"><li>Punching bags</li><li>Mats</li><li>Combat training</li></ul>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="zone-card">
                            <div class="zone-media">
                                <img src="../img/facilitiesImg/pexels-tima-miroshnichenko-6389861.jpg" alt="Clean locker room area" loading="lazy" width="600" height="420">
                                <span class="zone-icon"><i class="bi bi-droplet-fill" aria-hidden="true"></i></span>
                            </div>
                            <div class="zone-body">
                                <h3>Locker Rooms &amp; Showers</h3>
                                <p>Clean, secure and spacious changing areas with showers and lockers.</p>
                                <ul class="tags"><li>Lockers</li><li>Showers</li><li>Changing areas</li></ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="cta-banner">
            <div class="container text-center reveal">
                <h2>See It for Yourself</h2>
                <p>Join Evolve Fit and get full access to every zone.</p>
                <a href="../log_reg/log_reg.php#signup" class="btn btn-dark-custom">Join Now</a>
                <a href="contact.php" class="btn btn-link-dark">Ask about a tour</a>
            </div>
        </section>

    </main>

    <!--Footer-->
    <?php include("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/index.js"></script>
</body>
</html>
