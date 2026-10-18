<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/faq.css">
    <title>FAQ Page</title>
</head>
<body>
    <!--Navbar-->
    <?php include("navbar.php");?>
    <main>
        <!-- Hero Section -->
        <section class="faq-hero">
            <div class="faq-overlay"></div>
            <div class="container hero-content">
                <div class="row w-100">
                    <div class="col-lg-6">
                        <h1 class="text-white display-4 mb-3">Got A Question?</h1>
                        <p class="lead text-white-50 mb-4">We have the answer</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="container faq-section" id="faq">
            <h2 class="text-center mb-5 faq-title">Frequently Asked Questions</h2>

            <div class="accordion" id="faqAccordion">

                <!-- Q1 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            What is the Gym Membership and Attendance System?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            It’s a digital platform that helps members register, manage memberships, and track attendance while allowing staff to monitor gym activity.
                        </div>
                    </div>
                </div>

                <!-- Q2 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            How do I sign up for a membership?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can sign up online through the system’s registration page or directly at the gym’s front desk. A unique membership ID will be provided.
                        </div>
                    </div>
                </div>

                <!-- Q3 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Can I check my attendance history?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes. Members can log in to their account to view their attendance history, including dates and times of gym visits.
                        </div>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            How do I renew or upgrade my membership?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            The system will notify you before your membership expires. You can renew or upgrade online or at the gym reception.
                        </div>
                    </div>
                </div>

                <!-- Q5 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            What if I forget to check in at the gym?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Members must check in using their ID, QR code, or fingerprint scanner. If you forget, notify the front desk staff to update your record.
                        </div>
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