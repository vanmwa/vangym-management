<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Choose your Evolve Fit membership: Flexi, All Access, Off-Peak and Premium plans with no joining fees. Start with a free 1-day trial.">
    <title>Membership | Evolve Fit</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/membership.css">
</head>
<body>
    <a href="#plans" class="skip-link">Skip to membership plans</a>

    <!--Navbar-->
    <?php include("navbar.php");?>

    <main id="main">

        <!-- Hero -->
        <section class="mem-hero" aria-labelledby="mem-title">
            <img src="../img/membershipImg/Couple-working-out-with-dumbbe.jpg" alt="" class="mem-hero-img" fetchpriority="high">
            <div class="mem-hero-overlay"></div>
            <div class="container mem-hero-content">
                <nav aria-label="Breadcrumb">
                    <ol class="crumbs">
                        <li><a href="index.php">Home</a></li>
                        <li aria-current="page">Membership</li>
                    </ol>
                </nav>
                <span class="eyebrow">Membership</span>
                <h1 id="mem-title">The Ultimate <span class="accent">Membership</span> Experience</h1>
                <p>
                    Your fitness, your way. Enjoy flexible memberships from
                    <strong>&#8369;500/month</strong> with no joining fees.
                </p>
                <div class="hero-actions">
                    <a href="#plans" class="btn btn-brand">See Plans</a>
                    <a href="#trial" class="btn btn-outline-light-custom">Free 1-Day Trial</a>
                </div>
            </div>
        </section>

        <!-- Perks strip -->
        <section class="perks" aria-label="Included with every membership">
            <div class="container">
                <ul class="perk-list">
                    <li><i class="bi bi-cash-coin" aria-hidden="true"></i>No joining fees</li>
                    <li><i class="bi bi-arrow-repeat" aria-hidden="true"></i>Flexible monthly plans</li>
                    <li><i class="bi bi-person-check-fill" aria-hidden="true"></i>Certified coaches</li>
                    <li><i class="bi bi-calendar-check-fill" aria-hidden="true"></i>Easy class booking</li>
                </ul>
            </div>
        </section>

        <!-- Standard plans -->
        <section class="plans" id="plans" aria-labelledby="plans-title">
            <div class="container">
                <div class="section-header reveal">
                    <span class="eyebrow">Pricing</span>
                    <h2 id="plans-title" class="section-title">Choose Your Membership</h2>
                    <p>Simple monthly plans. Pick the one that fits your routine and upgrade anytime.</p>
                </div>

                <h3 class="plan-group reveal">Standard Plans</h3>
                <div class="row g-4 justify-content-center">

                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="plan-card">
                            <i class="bi bi-lightning-charge-fill plan-icon" aria-hidden="true"></i>
                            <h4>Flexi</h4>
                            <p class="price">&#8369;500<span class="per"> / month</span></p>
                            <ul class="features">
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>12 Classes / Month</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>3 Classes / Week</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>No Joining Fees</li>
                            </ul>
                            <a href="../log_reg/log_reg.php#signup" class="btn btn-brand w-100 join-btn" data-plan="Flexi">Join Today</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="plan-card featured">
                            <span class="badge-pop">Most Popular</span>
                            <i class="bi bi-infinity plan-icon" aria-hidden="true"></i>
                            <h4>All Access</h4>
                            <p class="price">&#8369;1,000<span class="per"> / month</span></p>
                            <ul class="features">
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Unlimited Classes</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>3 Classes / Day</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>No Joining Fees</li>
                            </ul>
                            <a href="../log_reg/log_reg.php#signup" class="btn btn-brand w-100 join-btn" data-plan="AllAccess">Join Today</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="plan-card">
                            <i class="bi bi-clock-history plan-icon" aria-hidden="true"></i>
                            <h4>Off-Peak</h4>
                            <p class="price">&#8369;700<span class="per"> / month</span></p>
                            <ul class="features">
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>20 Classes / Month</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>5 Classes / Week</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>No Joining Fees</li>
                            </ul>
                            <a href="../log_reg/log_reg.php#signup" class="btn btn-brand w-100 join-btn" data-plan="OffPeak">Join Today</a>
                        </div>
                    </div>
                </div>

                <h3 class="plan-group premium reveal"><i class="bi bi-star-fill" aria-hidden="true"></i> Premium Plans</h3>
                <div class="row g-4 justify-content-center">

                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="plan-card premium">
                            <i class="bi bi-star-fill plan-icon" aria-hidden="true"></i>
                            <h4>Premium Basic</h4>
                            <p class="price">&#8369;1,500<span class="per"> / month</span></p>
                            <ul class="features">
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Unlimited Classes</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Nutrition Guide</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Free Starter Kit</li>
                            </ul>
                            <a href="../log_reg/log_reg.php#signup" class="btn btn-outline-brand w-100 join-btn" data-plan="PremiumBasic">Join Today</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="plan-card premium">
                            <i class="bi bi-gem plan-icon" aria-hidden="true"></i>
                            <h4>Premium Plus</h4>
                            <p class="price">&#8369;2,500<span class="per"> / month</span></p>
                            <ul class="features">
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Unlimited Access</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Personal Trainer (2x/month)</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Exclusive Discounts</li>
                            </ul>
                            <a href="../log_reg/log_reg.php#signup" class="btn btn-outline-brand w-100 join-btn" data-plan="PremiumPlus">Join Today</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <div class="plan-card premium">
                            <i class="bi bi-trophy-fill plan-icon" aria-hidden="true"></i>
                            <h4>Premium Elite</h4>
                            <p class="price">&#8369;4,000<span class="per"> / month</span></p>
                            <ul class="features">
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>All Premium Benefits</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Dedicated Personal Trainer</li>
                                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>VIP Lounge Access</li>
                            </ul>
                            <a href="../log_reg/log_reg.php#signup" class="btn btn-outline-brand w-100 join-btn" data-plan="PremiumElite">Join Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Personal training -->
        <section class="training" aria-labelledby="pt-title">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 reveal reveal-left">
                        <figure class="photo-frame">
                            <img src="../img/aboutImg/about_section.jpg" alt="Certified coach training members" loading="lazy" width="800" height="560">
                            <figcaption class="photo-card">
                                <strong>Certified Fitness Coaches get you on track with:</strong>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Internationally recognised training programmes</li>
                                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Flexible, personalized schedules</li>
                                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>A customised workout plan</li>
                                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Progress tracking with MyCoach</li>
                                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>A guide to nutrition &amp; well-being</li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-lg-6 reveal reveal-right">
                        <span class="eyebrow">One-on-one coaching</span>
                        <h2 id="pt-title" class="section-title">Personal Training</h2>
                        <p>Attain the results you want with customised programmes managed by our Certified Fitness Coaches.</p>
                        <a href="contact.php" class="btn btn-brand">Find A Trainer</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trial + corporate -->
        <section class="split" id="trial" aria-label="Free trial and corporate membership">
            <div class="row g-0">
                <div class="col-md-6 split-trial reveal">
                    <div class="split-inner">
                        <span class="eyebrow eyebrow-dark">No strings attached</span>
                        <h2>Start Your 1-Day Trial</h2>
                        <p>Get an exclusive free trial experience. Try the gym before you commit.</p>
                        <a href="../log_reg/log_reg.php#signup" class="btn btn-dark-custom">Sign Up</a>
                    </div>
                </div>
                <div class="col-md-6 split-corp reveal">
                    <div class="split-inner">
                        <span class="eyebrow">For teams</span>
                        <h2>Corporate Membership</h2>
                        <p>Keep your employees happy, healthy and productive.</p>
                        <a href="contact.php" class="btn btn-outline-light-custom">Corporate Plans</a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!--Footer-->
    <?php include("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/index.js"></script>
</body>
</html>
