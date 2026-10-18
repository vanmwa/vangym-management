<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/facilities.css">
    <title>Facilities Page</title>
</head>
<body>
    <!--Navbar-->
    <?php include("navbar.php");?>
        <main>
        <!-- Hero Section -->
        <section class="hero-section" style="position: relative; height: 100vh; overflow: hidden;">
            <div class="hero-bg" 
                style="position: absolute; width: 100%; height: 100%; z-index: -1;  
                        background-size: cover; background-position: center; background-repeat: no-repeat; transition: transform 0.1s ease-out;">
                <div class="overlay" 
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; 
                            background: linear-gradient(135deg, rgba(0, 0, 0, 0.6) 0%, rgba(44, 62, 80, 0.4) 100%);"></div>
            </div>

            <div class="container hero-content" style="position: relative; z-index: 1; height: 100%; display: flex; align-items: center;">
                <div class="row w-100">
                    <div class="col-lg-6 text-white">
                        <h1 class="hero-title fw-bold mb-3">Our Facilities</h1>
                        <p class="hero-subtitle text-white-50">
                            We provide state-of-the-art equipment and spaces to support every workout style.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Title Section -->
        <div class="bg-black">
            <section class="facilities-title p-5 text-center mb-5">
                <h1 class="fw-bold title-glow">CHECK OUT OUR GYM FACILITIES</h1>
            </section>

            <!-- Carousel -->
            <section id="hero-carousel" class="carousel-section">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="5" aria-label="Slide 6"></button>
                    </div>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <img src="../img/facilitiesImg/gym-with-indoor-cycling-equipment.jpg" class="d-block w-100" alt="Cardio Area" loading="lazy">
                            <div class="carousel-caption d-none d-md-block caption-left">
                                <h5>Cardio Area</h5>
                                <p>Equipped with treadmills, stationary bikes, and ellipticals for all endurance needs.</p>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img src="../img/facilitiesImg/black-dumbbells-with-different-weight.jpg" class="d-block w-100" alt="Weightlifting Zone" loading="lazy">
                            <div class="carousel-caption d-none d-md-block caption-left">
                                <h5>Weightlifting Zone</h5>
                                <p>Dumbbells, barbells, squat racks, and benches for strength training.</p>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img src="../img/facilitiesImg/close-up-blue-dumbbells-floor-yoga-mat-train-muscles-physical-exercise-home-empty-space-with-lifting-weights-used-work-arms-sport-workout-equipment.jpg" class="d-block w-100" alt="Group Exercise Studio" loading="lazy">
                            <div class="carousel-caption d-none d-md-block caption-left">
                                <h5>Group Exercise Studio</h5>
                                <p>Spacious studio for Zumba, yoga, HIIT, and other group classes.</p>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="carousel-item">
                            <img src="../img/facilitiesImg/equipments-gym.jpg" class="d-block w-100" alt="Functional Training" loading="lazy">
                            <div class="carousel-caption d-none d-md-block caption-left">
                                <h5>Functional Training</h5>
                                <p>Kettlebells, ropes, and medicine balls for dynamic, functional workouts.</p>
                            </div>
                        </div>

                        <!-- Slide 5 -->
                        <div class="carousel-item">
                            <img src="../img/facilitiesImg/punching-bags-rope-gym.jpg" class="d-block w-100" alt="Boxing & Martial Arts" loading="lazy">
                            <div class="carousel-caption d-none d-md-block caption-left">
                                <h5>Boxing & Martial Arts</h5>
                                <p>Dedicated space with punching bags and mats for combat training.</p>
                            </div>
                        </div>

                        <!-- Slide 6 -->
                        <div class="carousel-item">
                            <img src="../img/facilitiesImg/pexels-tima-miroshnichenko-6389861.jpg" class="d-block w-100" alt="Locker Rooms & Showers" loading="lazy">
                            <div class="carousel-caption d-none d-md-block caption-left">
                                <h5>Locker Rooms & Showers</h5>
                                <p>Clean, secure, and spacious changing areas with showers and lockers.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
        </div>
    </main>

    <!--Footer-->
    <?php include("footer.php");?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>