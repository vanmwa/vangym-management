<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore Evolve Fit group classes: cycling, weight lifting, cardio, yoga, strength training and Zumba, guided by expert trainers for every fitness level.">
    <title>Classes | Evolve Fit</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/class.css">
</head>
<body>
    <a href="#main" class="skip-link">Skip to main content</a>

    <!--Navbar-->
    <?php include("navbar.php");?>

    <main id="main">

        <!-- Hero -->
        <section class="cls-hero" aria-labelledby="cls-title">
            <img src="../img/classImg/active-people-taking-part-zumba-class-together.jpg" alt="" class="cls-hero-img" fetchpriority="high">
            <div class="cls-hero-overlay"></div>
            <div class="container cls-hero-content">
                <nav aria-label="Breadcrumb">
                    <ol class="crumbs">
                        <li><a href="index.php">Home</a></li>
                        <li aria-current="page">Classes</li>
                    </ol>
                </nav>
                <span class="eyebrow">Group fitness</span>
                <h1 id="cls-title">Move. Sweat. <span class="accent">Repeat.</span></h1>
                <p>
                    Explore a variety of classes designed to keep you motivated, fit and healthy,
                    guided by expert trainers.
                </p>
                <div class="hero-actions">
                    <a href="#classes" class="btn btn-brand">Browse Classes</a>
                    <a href="../log_reg/log_reg.php#signup" class="btn btn-outline-light-custom">Join Now</a>
                </div>
            </div>
        </section>

        <!-- Intro -->
        <section class="intro" aria-labelledby="intro-title">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">Why our classes</span>
                    <h2 id="intro-title" class="section-title">Join Our Group Fitness Classes</h2>
                    <p>
                        Whether you&rsquo;re a beginner or an experienced athlete, there&rsquo;s a session to match
                        your schedule and fitness level.
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4 reveal">
                        <div class="perk">
                            <i class="bi bi-person-check-fill" aria-hidden="true"></i>
                            <h3>Expert Trainers</h3>
                            <p>Every class is guided by a qualified coach who helps you with form and technique.</p>
                        </div>
                    </div>
                    <div class="col-md-4 reveal">
                        <div class="perk">
                            <i class="bi bi-bar-chart-steps" aria-hidden="true"></i>
                            <h3>All Levels Welcome</h3>
                            <p>Just starting out or returning after a break? Our classes make it easy to get moving again.</p>
                        </div>
                    </div>
                    <div class="col-md-4 reveal">
                        <div class="perk">
                            <i class="bi bi-calendar-check-fill" aria-hidden="true"></i>
                            <h3>Stay Consistent</h3>
                            <p>A friendly community and a regular schedule help you build a habit that lasts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Classes -->
        <section class="classes" id="classes" aria-labelledby="classes-title">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">Our classes</span>
                    <h2 id="classes-title" class="section-title">Explore Our Gym Classes</h2>
                </div>

                <div class="filters reveal" role="group" aria-label="Filter classes by type">
                    <button type="button" class="filter-btn active" data-filter="all" aria-pressed="true">All</button>
                    <button type="button" class="filter-btn" data-filter="cardio" aria-pressed="false">Cardio</button>
                    <button type="button" class="filter-btn" data-filter="strength" aria-pressed="false">Strength</button>
                    <button type="button" class="filter-btn" data-filter="mind" aria-pressed="false">Mind &amp; Body</button>
                </div>

                <div class="row g-4" id="class-grid">

                    <div class="col-md-6 col-lg-4 class-item" data-category="cardio">
                        <article class="class-card">
                            <div class="class-media">
                                <img src="../img/classImg/pexels-julia-larson-6456008.jpg" alt="Members in an indoor cycling class" loading="lazy" width="600" height="420">
                                <span class="class-tag">Cardio</span>
                            </div>
                            <div class="class-body">
                                <h3>Cycling</h3>
                                <p>Engage in a high-energy indoor cycling workout to improve cardiovascular health and stamina.</p>
                                <a href="../log_reg/log_reg.php#signup" class="class-link">Join this class <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 class-item" data-category="strength">
                        <article class="class-card">
                            <div class="class-media">
                                <img src="../img/classImg/pexels-ketut-subiyanto-4720792.jpg" alt="Member lifting weights with coaching" loading="lazy" width="600" height="420">
                                <span class="class-tag">Strength</span>
                            </div>
                            <div class="class-body">
                                <h3>Weight Lifting</h3>
                                <p>Master proper form and technique to build strength and muscle mass in a safe, guided environment.</p>
                                <a href="../log_reg/log_reg.php#signup" class="class-link">Join this class <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 class-item" data-category="cardio">
                        <article class="class-card">
                            <div class="class-media">
                                <img src="../img/classImg/pexels-olly-3837293.jpg" alt="Participants doing a cardio workout" loading="lazy" width="600" height="420">
                                <span class="class-tag">Cardio</span>
                            </div>
                            <div class="class-body">
                                <h3>Cardio</h3>
                                <p>Join this dynamic class to burn calories, increase endurance and get your heart pumping.</p>
                                <a href="../log_reg/log_reg.php#signup" class="class-link">Join this class <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 class-item" data-category="mind">
                        <article class="class-card">
                            <div class="class-media">
                                <img src="../img/classImg/yoga-group-classes-inside-gym.jpg" alt="Group yoga class inside the gym" loading="lazy" width="600" height="420">
                                <span class="class-tag">Mind &amp; Body</span>
                            </div>
                            <div class="class-body">
                                <h3>Yoga</h3>
                                <p>Relax your mind and strengthen your body with guided yoga sessions perfect for all levels.</p>
                                <a href="../log_reg/log_reg.php#signup" class="class-link">Join this class <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 class-item" data-category="strength">
                        <article class="class-card">
                            <div class="class-media">
                                <img src="../img/classImg/sports-man-gym-man-performs-exercises-guy-t-shirt.jpg" alt="Man performing a strength exercise" loading="lazy" width="600" height="420">
                                <span class="class-tag">Strength</span>
                            </div>
                            <div class="class-body">
                                <h3>Strength Training</h3>
                                <p>Build muscle, increase endurance and boost energy levels with structured strength workouts.</p>
                                <a href="../log_reg/log_reg.php#signup" class="class-link">Join this class <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 class-item" data-category="cardio">
                        <article class="class-card">
                            <div class="class-media">
                                <img src="../img/classImg/active-people-taking-part-zumba-class-together.jpg" alt="People dancing together in a Zumba class" loading="lazy" width="600" height="420">
                                <span class="class-tag">Cardio</span>
                            </div>
                            <div class="class-body">
                                <h3>Zumba</h3>
                                <p>Dance your way to fitness with fun, high-energy Zumba classes that burn calories while keeping you entertained.</p>
                                <a href="../log_reg/log_reg.php#signup" class="class-link">Join this class <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    </div>

                </div>
                <p class="no-results" id="no-results" hidden>No classes in this category yet.</p>
            </div>
        </section>

        <!-- CTA -->
        <section class="cls-cta" aria-labelledby="cta-title">
            <img src="../img/classImg/pexels-klaus-nielsen-6303479.jpg" alt="" class="cls-cta-img" loading="lazy">
            <div class="cls-cta-overlay"></div>
            <div class="container text-center reveal">
                <h2 id="cta-title">Your Fitness Journey <span class="accent">Starts Here</span></h2>
                <p>Pick a membership, book your first class and start building momentum.</p>
                <a href="membership.php" class="btn btn-brand">Explore Our Memberships</a>
            </div>
        </section>

    </main>

    <!--Footer-->
    <?php include("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/class.js"></script>
</body>
</html>
