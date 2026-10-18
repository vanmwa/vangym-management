<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/membership.css">
    <title>Membership Page</title>
</head>
<body>
    <!--Navbar-->
    <?php include("navbar.php");?>

    <main >

        <section class="hero-section d-flex align-items-center justify-content-start position-relative">
            <img src="../img/membershipImg/Couple-working-out-with-dumbbe.jpg"
                alt="Membership Banner"
                class="hero-bg">

            <div class="hero-overlay"></div>

            <div class="container position-relative text-white z-2">
                <div class="row">
                <div class="col-lg-8 col-md-10">
                    <p class="text-uppercase fw-semibold text-light mb-2" style="letter-spacing: 1px;">Membership</p>
                    <h1 class="display-4 fw-bold mb-3">The Ultimate Membership Experience</h1>
                    <p class="fs-5 mb-4" style="color: rgba(255,255,255,0.9); max-width: 600px;">
                    Your fitness, your way. Enjoy flexible memberships from 
                    <strong>₱2,390/month</strong>. Don’t miss out on our 
                    <strong>exclusive deals</strong> available now.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                    <a href="#" class="btn btn-success btn-lg px-4 fw-semibold shadow-sm rounded-pill">Let’s Get Started</a>
                    <a href="#" class="btn btn-outline-light btn-lg px-4 fw-semibold rounded-pill">Learn More</a>
                    </div>
                </div>
                </div>
            </div>
        </section>



            <!-- Membership Plans Section -->
        <section id="membership-section" class="membership-section text-center" style="background:#000; padding:80px 0;">
            <h2 class="mb-5 text-success fw-bold">MEMBERSHIPS</h2>
            <div class="container">
                <div class="row g-4 justify-content-center">
                    
                    <!-- Flexi Card -->
                    <div class="col-md-4 col-lg-4">
                        <div class="membership-card text-center p-4 shadow-lg h-100" 
                            style="background:#111; border-radius:15px; transition:0.3s; border:1px solid #1db954;">
                            <i class="bi bi-lightning-charge-fill display-4 text-success mb-4"></i>
                            <h3 class="text-white fw-bold">FLEXI</h3>
                            <p class="price text-success fw-bold" style="font-size:28px;">₱500<span style="font-size:16px;"> /mo</span></p>
                            <ul class="features list-unstyled text-white mb-4" style="line-height:2;">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>12 Classes / Month</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>3 Classes / Week</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>No Joining Fees</li>
                            </ul>
                            <a href="#" class="btn fw-semibold join-btn" 
                            data-plan="Flexi" style="background:#1db954; color:#000; border-radius:30px; padding:10px 25px;">JOIN TODAY</a>
                        </div>
                    </div>

                    <!-- All Access Card -->
                    <div class="col-md-4 col-lg-4">
                        <div class="membership-card text-center p-4 shadow-lg h-100"
                            style="background:#111; border-radius:15px; transition:0.3s; border:1px solid #1db954;">
                            <i class="bi bi-infinity display-4 text-success mb-4"></i>
                            <h3 class="text-white fw-bold">ALL ACCESS</h3>
                            <p class="price text-success fw-bold" style="font-size:28px;">₱1000<span style="font-size:16px;"> /mo</span></p>
                            <ul class="features list-unstyled text-white mb-4" style="line-height:2;">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Unlimited Classes</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>3 Classes / Day</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>No Joining Fees</li>
                            </ul>
                            <a href="#" class="btn fw-semibold join-btn" 
                            data-plan="AllAccess" style="background:#1db954; color:#000; border-radius:30px; padding:10px 25px;">JOIN TODAY</a>
                        </div>
                    </div>

                    <!-- Off-Peak Card -->
                    <div class="col-md-4 col-lg-4">
                        <div class="membership-card text-center p-4 shadow-lg h-100"
                            style="background:#111; border-radius:15px; transition:0.3s; border:1px solid #1db954;">
                            <i class="bi bi-clock-history display-4 text-success mb-4"></i>
                            <h3 class="text-white fw-bold">OFF-PEAK</h3>
                            <p class="price text-success fw-bold" style="font-size:28px;">₱700<span style="font-size:16px;"> /mo</span></p>
                            <ul class="features list-unstyled text-white mb-4" style="line-height:2;">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>20 Classes / Month</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>5 Classes / Week</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>No Joining Fees</li>
                            </ul>
                            <a href="#" class="btn fw-semibold join-btn" 
                            data-plan="OffPeak" style="background:#1db954; color:#000; border-radius:30px; padding:10px 25px;">JOIN TODAY</a>
                        </div>
                    </div>

                    <!-- Premium Basic -->
                    <div class="col-md-4 col-lg-4">
                        <div class="membership-card text-center p-4 shadow-lg h-100"
                            style="background:#111; border-radius:15px; transition:0.3s; border:2px solid gold;">
                            <i class="bi bi-star-fill display-4 text-warning mb-4"></i>
                            <h3 class="text-white fw-bold">PREMIUM BASIC</h3>
                            <p class="price text-warning fw-bold" style="font-size:28px;">₱1500<span style="font-size:16px;"> /mo</span></p>
                            <ul class="features list-unstyled text-white mb-4" style="line-height:2;">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Unlimited Classes</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Nutrition Guide</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Free Starter Kit</li>
                            </ul>
                            <a href="#" class="btn fw-semibold join-btn" 
                                data-plan="PremiumBasic" style="background:gold; color:#000; border-radius:30px; padding:10px 25px;">JOIN TODAY</a>
                        </div>
                    </div>

                    <!-- Premium Plus -->
                    <div class="col-md-4 col-lg-4">
                        <div class="membership-card text-center p-4 shadow-lg h-100"
                            style="background:#111; border-radius:15px; transition:0.3s; border:2px solid gold;">
                            <i class="bi bi-gem display-4 text-warning mb-4"></i>
                            <h3 class="text-white fw-bold">PREMIUM PLUS</h3>
                            <p class="price text-warning fw-bold" style="font-size:28px;">₱2500<span style="font-size:16px;"> /mo</span></p>
                            <ul class="features list-unstyled text-white mb-4" style="line-height:2;">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Unlimited Access</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Personal Trainer (2x/month)</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Exclusive Discounts</li>
                            </ul>
                            <a href="#" class="btn fw-semibold join-btn" 
                            data-plan="PremiumPlus" style="background:gold; color:#000; border-radius:30px; padding:10px 25px;">JOIN TODAY</a>
                        </div>
                    </div>

                    <!-- Premium Elite -->
                    <div class="col-md-4 col-lg-4">
                        <div class="membership-card text-center p-4 shadow-lg h-100"
                            style="background:#111; border-radius:15px; transition:0.3s; border:2px solid gold;">
                            <i class="bi bi-trophy-fill display-4 text-warning mb-4"></i>
                            <h3 class="text-white fw-bold">PREMIUM ELITE</h3>
                            <p class="price text-warning fw-bold" style="font-size:28px;">₱4000<span style="font-size:16px;"> /mo</span></p>
                            <ul class="features list-unstyled text-white mb-4" style="line-height:2;">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>All Premium Benefits</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Dedicated Personal Trainer</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>VIP Lounge Access</li>
                            </ul>
                            <a href="#" class="btn fw-semibold join-btn" 
                            data-plan="PremiumElite" style="background:gold; color:#000; border-radius:30px; padding:10px 25px;">JOIN TODAY</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="py-5">
            <div class="container">
                <div class="row align-items-center">
                
                <!-- Left Side (Image + Card Overlay) -->
                <div class="col-lg-6 position-relative mb-4 mb-lg-0">
                    <img src="../img/aboutImg/about_section.jpg" alt="Personal Training" class="img-fluid rounded shadow">
                    
                    <!-- Overlay Card -->
                    <div class="bg-white p-3 shadow rounded position-absolute" 
                        style="bottom: 15px; left: 15px; width: 80%; background: rgba(255,255,255,0.95);">
                    <p class="mb-2 fw-semibold small">Certified Fitness Coaches get you on track with:</p>
                    <ul class="list-unstyled mb-0 small">
                        <li class="mb-2"><i class="text-success me-2 bi bi-check-circle-fill"></i> Training programmes that are <strong>INTERNATIONALLY RECOGNISED</strong></li>
                        <li class="mb-2"><i class="text-success me-2 bi bi-check-circle-fill"></i> <strong>FLEXIBLE, PERSONALIZED</strong> schedules</li>
                        <li class="mb-2"><i class="text-success me-2 bi bi-check-circle-fill"></i> A <strong>CUSTOMISED</strong> workout plan</li>
                        <li class="mb-2"><i class="text-success me-2 bi bi-check-circle-fill"></i> Progress tracking with <strong>MYCOACH</strong></li>
                        <li><i class="text-success me-2 bi bi-check-circle-fill"></i> A guide to <strong>NUTRITION</strong> &amp; <strong>WELL-BEING</strong></li>
                    </ul>
                    </div>
                </div>
                
                <!-- Right Side (Text + Button) -->
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">PERSONAL TRAINING</h2>
                    <p class="mb-4">Attain the results you want with customised programmes managed by our Certified Fitness Coaches.</p>
                    <a href="#" class="btn btn-success px-4 fw-semibold">Find A Trainer</a>
                </div>
                
                </div>
            </div>
        </section>


        <section>
            <div>
                <div class="row g-0 text-white">
                
                <!-- Left Side: Corporate Membership -->
                <div class="col-md-6 d-flex flex-column justify-content-center p-5" style="background-color: #198754;">
                    <h2 class="fw-bold">CORPORATE MEMBERSHIP</h2>
                    <p class="fs-5">
                    Keep your employees happy, healthy, and productive.
                    </p>
                    <a href="#" class="btn btn-light btn-lg fw-semibold mt-3">
                    Corporate Plans
                    </a>
                </div>

                <!-- Right Side: 1-Day Trial -->
                <div class="col-md-6 d-flex flex-column justify-content-center p-5 bg-black">
                    <h2 class="fw-bold">Start your 1-DAY TRIAL</h2>
                    <p class="fs-5">
                    Get an exclusive free trial experience. No strings attached.
                    </p>
                    <a href="#" class="btn btn-success btn-lg fw-semibold mt-3">
                    Sign Up
                    </a>
                </div>

                </div>
            </div>
        </section>

    </main>
    <!--Footer-->
    <?php include("footer.php");?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>