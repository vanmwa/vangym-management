<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/class.css">
    <title>Class Page</title>
</head>
<body>
    <!--Navbar-->
    <?php include("navbar.php");?>
    <main>
    <!-- Hero Section (keeps inline CSS) -->
    <section class="mt-5 gym-classes-hero" style="position: relative; height: 100vh; overflow: hidden;">
        <!-- Background Image -->
        <div style="position: absolute; width: 100%; height: 100%; z-index: -2; 
            background-image: url('../img/classImg/active-people-taking-part-zumba-class-together.jpg'); 
            background-size: cover; background-position: center 30%; background-repeat: no-repeat; height: 100vh; 
            animation: heroZoom 20s infinite alternate;">
        </div>

        <!-- Overlay (added fix) -->
        <div class="hero-overlay" 
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(0, 0, 0, 0.45); z-index: -1;">
        </div>

        <!-- Content -->
        <div class="container" style="position: relative; z-index: 1; height: 100%; display: flex; align-items: center;">
            <div class="row w-100">
                <div class="col-lg-6">
                    <h1 class="text-white display-4 fw-bold mb-3">Our Gym Classes</h1>
                    <p class="lead text-white-50 mb-4">
                        Explore a variety of classes designed to keep you motivated, fit, and healthy — guided by expert trainers.
                    </p>
                </div>
            </div>
        </div>
    </section>


        <!-- Intro Section -->
        <section class="row align-items-center my-5 intro-section">
            <div class="col-md-10 offset-md-1 text-center">
                <h2 class="fw-bold mb-3 text-uppercase text-dark">Join Our Gym Group Fitness Classes</h2>
                <p class="text-muted fs-5 mb-4">
                    Our fitness classes are <span class="fw-semibold">free for everyone</span> — whether you’re a beginner or an experienced athlete.  
                    With a wide variety of sessions, there’s something to match every schedule and fitness level.
                </p>
                <a href="#" class="btn btn-success btn-lg px-4 rounded-pill shadow-sm mb-5">JOIN NOW</a>
                <h3 class="fw-semibold mt-4 text-dark">Getting Back on Track Made Simple</h3>
                <p class="text-muted fs-5">
                    Whether you’re just starting out or returning after a break, our classes make it easy to get moving again and stay consistent.  
                </p>
            </div>
        </section>

        <!-- Explore Classes Heading -->
        <section class="row align-items-center my-5 explore-heading">
            <div class="col-md-12 text-center">
                <h1>EXPLORE OUR GYM CLASSES</h1>
            </div>
        </section>

        <!-- Classes Grid -->
        <section class="container mt-4" id="classes">
            <div class="row g-4">

                <!-- Cycling -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm class-card">
                        <img src="../img/classImg/pexels-julia-larson-6456008.jpg" class="card-img-top" alt="Cycling">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold">Cycling</h4>
                            <p class="card-text">Engage in a high-energy indoor cycling workout to improve cardiovascular health and stamina.</p>
                            <a href="#" class="btn btn-success px-4 fw-semibold class-btn">View Class</a>
                        </div>
                    </div>
                </div>

                <!-- Weight Lifting -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm class-card">
                        <img src="../img/classImg/pexels-ketut-subiyanto-4720792.jpg" class="card-img-top" alt="Weight Lifting">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold">Weight Lifting</h4>
                            <p class="card-text">Master proper form and technique to build strength and muscle mass in a safe, guided environment.</p>
                            <a href="#" class="btn btn-success px-4 fw-semibold class-btn">View Class</a>
                        </div>
                    </div>
                </div>

                <!-- Cardio -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm class-card">
                        <img src="../img/classImg/pexels-olly-3837293.jpg" class="card-img-top" alt="Cardio">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold">Cardio</h4>
                            <p class="card-text">Join this dynamic class to burn calories, increase endurance, and get your heart pumping.</p>
                            <a href="#" class="btn btn-success px-4 fw-semibold class-btn">View Class</a>
                        </div>
                    </div>
                </div>

                <!-- Yoga -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm class-card">
                        <img src="../img/classImg/yoga-group-classes-inside-gym.jpg" class="card-img-top" alt="Yoga">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold">Yoga</h4>
                            <p class="card-text">Relax your mind and strengthen your body with guided yoga sessions perfect for all levels.</p>
                            <a href="#" class="btn btn-success px-4 fw-semibold class-btn">View Class</a>
                        </div>
                    </div>
                </div>

                <!-- Strength Training -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm class-card">
                        <img src="../img/classImg/sports-man-gym-man-performs-exercises-guy-t-shirt.jpg" class="card-img-top" alt="Strength Training">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold">Strength Training</h4>
                            <p class="card-text">Build muscle, increase endurance, and boost energy levels with structured strength workouts.</p>
                            <a href="#" class="btn btn-success px-4 fw-semibold class-btn">View Class</a>
                        </div>
                    </div>
                </div>

                <!-- Zumba -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm class-card">
                        <img src="../img/classImg/active-people-taking-part-zumba-class-together.jpg" class="card-img-top" alt="Zumba">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold">Zumba</h4>
                            <p class="card-text">Dance your way to fitness with fun, high-energy Zumba classes that burn calories while keeping you entertained.</p>
                            <a href="#" class="btn btn-success px-4 fw-semibold class-btn">View Class</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Fitness Banner -->
        <section class="container my-5 p-5 mt-5">
            <div class="card border-0 shadow-lg banner-card">
                <img src="../img/classImg/pexels-klaus-nielsen-6303479.jpg" class="card-img" alt="Fitness Banner">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center banner-overlay">
                    <h2 class="fw-bold text-white">
                        YOUR FITNESS JOURNEY <br>
                        <span>STARTS HERE</span>
                    </h2>
                    <a href="membership.php" class="btn btn-light mt-3 px-4 py-2 fw-semibold banner-btn">Explore Our Memberships</a>
                </div>
            </div>
        </section>
    </main>


    <!--Footer-->
    <?php include("footer.php");?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>