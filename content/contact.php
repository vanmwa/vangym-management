<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Contact Page</title>
</head>
<body>
    <!--Navbar-->
    <?php include("navbar.php");?>
    <main>
        <!-- Hero Section -->
        <section class="hero-section mt-5">
            <div class="hero-bg">
                <div class="overlay"></div>
            </div>
            <div class="container hero-content">
                <div class="row w-100">
                    <div class="col-lg-6">
                        <h1 class="hero-title">Contact Us</h1>
                        <p class="hero-subtitle">
                            We'd love to hear from you! Reach us using the details below
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="container my-5 p-5 mt-5">
            <div class="container">
                <h1 class="text-center fw-bold mb-4">SEND US A MESSAGE</h1>
                
                            <!-- Form -->
                <form id="contactForm" class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="fname" class="form-control form-control-lg" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="lname" class="form-control form-control-lg" placeholder="Last Name" required>
                    </div>
                    <div class="col-md-6 d-flex">
                        <span class="input-group-text bg-white">+63</span>
                        <input type="tel" name="mobile" class="form-control form-control-lg" placeholder="Mobile Number" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                    </div>
                    <div class="col-md-6">
                        <select name="club" class="form-select form-select-lg" required>
                            <option selected disabled>Club</option>
                            <option>Club 1</option>
                            <option>Club 2</option>
                            <option>Club 3</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="contact_time" class="form-select form-select-lg" required>
                            <option selected disabled>Preferred Contact Time</option>
                            <option>Morning</option>
                            <option>Afternoon</option>
                            <option>Evening</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="membership_no" class="form-control form-control-lg" placeholder="Membership Number">
                    </div>
                    <div class="col-md-6">
                        <select name="topic" class="form-select form-select-lg" required>
                            <option selected disabled>I would like to talk about</option>
                            <option>Membership</option>
                            <option>Classes</option>
                            <option>Billing</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <textarea name="comments" class="form-control form-control-lg" rows="4" placeholder="Comments"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I've read and agree to the <a href="#" class="text-danger">terms</a> and 
                                <a href="#" class="text-danger">data privacy policy</a>.
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-lg w-100 py-2 fw-bold">Submit</button>
                    </div>    
                </form>
            </div>
        </section>
    </main>


    <!--Footer-->
    <?php include("footer.php");?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>