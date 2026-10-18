<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/about.css">
    <title>About Page</title>
</head>
<body>
    <!--Navbar-->
    <?php include("navbar.php");?>

        <main id="aboutPage">
        <!-- Hero Section -->
        <section class="hero-section mt-5">
            <div class="hero-overlay"></div>
            <div class="container d-flex align-items-center h-100">
                <div class="row w-100">
                    <div class="col-lg-6">
                        <h1 class="hero-title">
                            About Our Gym Membership & Attendance System
                        </h1>
                        <p class="hero-subtitle">
                            A smart solution to manage members, track attendance, and improve gym efficiency.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- System Overview -->
        <section class="content-section my-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left -->
                    <div class="col-md-6">
                        <h1 class="section-title">SYSTEM OVERVIEW</h1>
                        <p>
                            This Gym Membership & Attendance Management System is designed to help gym owners, administrators, 
                            and staff efficiently handle day-to-day operations. It allows easy registration of new members, 
                            accurate tracking of attendance, and effective management of active and expired memberships. 
                            By replacing manual processes with a digital solution, the system minimizes errors, saves time, 
                            and improves overall efficiency. It also provides quick access to member records, payment history, 
                            and membership status, ensuring transparency and reliability.
                        </p>
                    </div>
                    <!-- Right -->
                    <div class="col-md-6">
                        <img src="../img/aboutImg/about-img.jpg" alt="Workout" class="img-fluid rounded-lg shadow">
                    </div>
                </div>
            </div>
        </section>

        <!-- Community Section -->
        <section class="content-section bg-dark py-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left -->
                    <div class="col-md-6">
                        <img src="../img/aboutImg/pexels-rdne-6539870.jpg" alt="Community" class="img-fluid rounded-lg shadow">
                    </div>
                    <!-- Right -->
                    <div class="col-md-6 text-light">
                        <h1>Towards Healthier Communities, <br> Towards a Healthier World</h1>
                        <p>
                            We believe that true wellness begins within our communities. That’s why we’re passionate about 
                            making fitness accessible to all, building inclusive spaces where everyone feels welcome, 
                            and embracing sustainable practices that leave a lasting impact on both people and the environment.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Objectives -->
        <section class="content-section my-5">
            <div class="container">
                <div class="row">
                    <!-- Left -->
                    <div class="col-md-6">
                        <h1 class="section-title">OBJECTIVES</h1>
                        <ul>
                            <li>
                                <h5>Automate Membership Management</h5>
                                Streamline the process of registering, updating, and renewing memberships through a digital platform.
                            </li>
                            <li>
                                <h5>Track Attendance Accurately</h5>
                                Provide real-time monitoring to identify active members, track peak hours, and analyze trends.
                            </li>
                            <li>
                                <h5>Reduce Manual Paperwork</h5>
                                Eliminate time-consuming manual processes by digitizing records and reports.
                            </li>
                        </ul>
                    </div>

                    <!-- Right -->
                    <div class="col-md-6">
                        <ul>
                            <li>
                                <h5>Enhance Member Experience</h5>
                                Offer members a seamless and hassle-free gym experience with quick check-ins 
                                and transparent membership details.
                            </li>
                        </ul>
                        <p>
                            Our vision goes beyond fitness—we aim to build inclusive spaces where everyone feels welcome 
                            and supported. By prioritizing sustainable practices and cultivating healthy cultures, 
                            we strive to create lasting impact that benefits not only our members, but also the 
                            environment and society at large.
                        </p>
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