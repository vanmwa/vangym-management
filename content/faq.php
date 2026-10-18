<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Answers to common questions about Evolve Fit memberships, payments, class booking and attendance tracking.">
    <title>FAQ | Evolve Fit</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../css/faq.css">
</head>
<body>
    <a href="#faq" class="skip-link">Skip to questions</a>

    <!--Navbar-->
    <?php include("navbar.php");?>

    <main id="main">

        <!-- Hero -->
        <section class="faq-hero" aria-labelledby="faq-title">
            <img src="../img/faqImg/pexels-tima-miroshnichenko-5711173.jpg" alt="" class="faq-hero-img" fetchpriority="high">
            <div class="faq-hero-overlay"></div>
            <div class="container faq-hero-content">
                <nav aria-label="Breadcrumb">
                    <ol class="crumbs">
                        <li><a href="index.php">Home</a></li>
                        <li aria-current="page">FAQ</li>
                    </ol>
                </nav>
                <span class="eyebrow">Help center</span>
                <h1 id="faq-title">Got A <span class="accent">Question?</span></h1>
                <p>We have the answer. Search below or browse by topic.</p>
            </div>
        </section>

        <!-- FAQ -->
        <section class="faq-section" id="faq" aria-labelledby="faq-heading">
            <div class="container faq-wrap">
                <div class="section-header reveal">
                    <span class="eyebrow">FAQ</span>
                    <h2 id="faq-heading" class="section-title">Frequently Asked Questions</h2>
                </div>

                <div class="faq-tools reveal">
                    <label for="faq-search" class="visually-hidden">Search questions</label>
                    <div class="search-box">
                        <i class="bi bi-search" aria-hidden="true"></i>
                        <input type="search" id="faq-search" placeholder="Search questions, e.g. payment, trial, attendance" autocomplete="off">
                    </div>
                    <div class="chips" role="group" aria-label="Filter questions by topic">
                        <button type="button" class="chip active" data-filter="all" aria-pressed="true">All</button>
                        <button type="button" class="chip" data-filter="account" aria-pressed="false">Account</button>
                        <button type="button" class="chip" data-filter="membership" aria-pressed="false">Membership</button>
                        <button type="button" class="chip" data-filter="payments" aria-pressed="false">Payments</button>
                        <button type="button" class="chip" data-filter="classes" aria-pressed="false">Classes</button>
                        <button type="button" class="chip" data-filter="attendance" aria-pressed="false">Attendance</button>
                    </div>
                </div>

                <div class="accordion" id="faqAccordion">

                    <div class="accordion-item faq-item" data-category="account">
                        <h3 class="accordion-header" id="faq-h1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                <span class="q-cat">Account</span>
                                <span class="q-text">What is the Gym Membership and Attendance System?</span>
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse" aria-labelledby="faq-h1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">It&rsquo;s a digital platform that helps members register, manage memberships, and track attendance while allowing staff to monitor gym activity.</div>
                        </div>
                    </div>

                    <div class="accordion-item faq-item" data-category="account">
                        <h3 class="accordion-header" id="faq-h2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                <span class="q-cat">Account</span>
                                <span class="q-text">How do I sign up for a membership?</span>
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq-h2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">You can sign up online through the <a href="../log_reg/log_reg.php#signup">registration page</a> or directly at the gym&rsquo;s front desk. A unique membership ID will be provided.</div>
                        </div>
                    </div>

                    <div class="accordion-item faq-item" data-category="membership">
                        <h3 class="accordion-header" id="faq-h3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                <span class="q-cat">Membership</span>
                                <span class="q-text">Is there a joining fee?</span>
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq-h3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">No. All of our standard plans come with no joining fees, so you only pay the monthly price of the plan you choose. See the <a href="membership.php">membership page</a> for details.</div>
                        </div>
                    </div>

                    <div class="accordion-item faq-item" data-category="membership">
                        <h3 class="accordion-header" id="faq-h4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                <span class="q-cat">Membership</span>
                                <span class="q-text">Can I try the gym before I join?</span>
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faq-h4" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Yes. You can start with a free 1-day trial with no strings attached. Visit the <a href="membership.php#trial">membership page</a> to sign up.</div>
                        </div>
                    </div>

                    <div class="accordion-item faq-item" data-category="membership">
                        <h3 class="accordion-header" id="faq-h5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                <span class="q-cat">Membership</span>
                                <span class="q-text">How do I renew or upgrade my membership?</span>
                            </button>
                        </h3>
                        <div id="faq5" class="accordion-collapse collapse" aria-labelledby="faq-h5" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">The system will notify you before your membership expires. You can renew or upgrade online from your member dashboard or at the gym reception.</div>
                        </div>
                    </div>

                    <div class="accordion-item faq-item" data-category="payments">
                        <h3 class="accordion-header" id="faq-h6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                                <span class="q-cat">Payments</span>
                                <span class="q-text">What payment methods are accepted?</span>
                            </button>
                        </h3>
                        <div id="faq6" class="accordion-collapse collapse" aria-labelledby="faq-h6" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">You can pay by card, cash or online payment. Your payments and their status (paid or pending) are listed in the Payments section of your member dashboard.</div>
                        </div>
                    </div>

                    <div class="accordion-item faq-item" data-category="classes">
                        <h3 class="accordion-header" id="faq-h7">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false" aria-controls="faq7">
                                <span class="q-cat">Classes</span>
                                <span class="q-text">How do I book or cancel a class?</span>
                            </button>
                        </h3>
                        <div id="faq7" class="accordion-collapse collapse" aria-labelledby="faq-h7" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Log in to your member dashboard and open the Classes page to see the schedule. You can reserve a spot in a class and cancel your booking from the same page.</div>
                        </div>
                    </div>

                    <div class="accordion-item faq-item" data-category="attendance">
                        <h3 class="accordion-header" id="faq-h8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8" aria-expanded="false" aria-controls="faq8">
                                <span class="q-cat">Attendance</span>
                                <span class="q-text">Can I check my attendance history?</span>
                            </button>
                        </h3>
                        <div id="faq8" class="accordion-collapse collapse" aria-labelledby="faq-h8" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Yes. Members can log in to their account to view their attendance history, including dates and times of gym visits, plus weekly and monthly summaries.</div>
                        </div>
                    </div>

                    <div class="accordion-item faq-item" data-category="attendance">
                        <h3 class="accordion-header" id="faq-h9">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9" aria-expanded="false" aria-controls="faq9">
                                <span class="q-cat">Attendance</span>
                                <span class="q-text">What if I forget to check in at the gym?</span>
                            </button>
                        </h3>
                        <div id="faq9" class="accordion-collapse collapse" aria-labelledby="faq-h9" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Members must check in using their ID, QR code, or fingerprint scanner. If you forget, notify the front desk staff to update your record.</div>
                        </div>
                    </div>

                </div>

                <p class="no-results" id="faq-empty" hidden>
                    No questions match your search. Try another word or <a href="contact.php">contact us</a>.
                </p>
            </div>
        </section>

        <!-- Still need help -->
        <section class="help-cta" aria-labelledby="help-title">
            <div class="container text-center reveal">
                <i class="bi bi-chat-dots-fill help-icon" aria-hidden="true"></i>
                <h2 id="help-title">Still Have Questions?</h2>
                <p>Our team is happy to help. Send us a message and we&rsquo;ll get back to you.</p>
                <a href="contact.php" class="btn btn-dark-custom">Contact Us</a>
                <a href="../log_reg/log_reg.php#signup" class="btn btn-link-dark">Or join now</a>
            </div>
        </section>

    </main>

    <!--Footer-->
    <?php include("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/faq.js"></script>
</body>
</html>
