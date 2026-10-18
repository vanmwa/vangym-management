<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sign in or create your Evolve Fit account to book classes, manage your membership and track your attendance.">
  <title>Sign In | Evolve Fit</title>
  <link rel="icon" type="image/png" href="../img/logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="../css/log_reg.css">
</head>

<body>
  <a href="#auth-panel" class="skip-link">Skip to form</a>

  <div class="auth">

    <!-- Brand side -->
    <aside class="auth-brand">
      <img src="../img/indexImg/pexels-willpicturethis-1954524.jpg" alt="" class="auth-brand-img">
      <div class="auth-brand-overlay"></div>
      <span class="orb orb-1" aria-hidden="true"></span>
      <span class="orb orb-2" aria-hidden="true"></span>

      <div class="auth-brand-inner">
        <a href="../content/index.php" class="brand-link" aria-label="Evolve Fit - back to the website">
          <img src="../img/logo.png" alt="">
          <span class="brand-text">EVOLVE <span>FIT</span></span>
        </a>

        <div class="brand-copy">
          <span class="eyebrow">Gym &amp; Fitness Club</span>
          <h2>Your strongest self <span class="accent">starts here.</span></h2>
          <p>Join the Evolve Fit community and manage your whole fitness journey in one place.</p>

          <ul class="benefits">
            <li><i class="fa-solid fa-dumbbell" aria-hidden="true"></i>Book and cancel group classes</li>
            <li><i class="fa-solid fa-calendar-check" aria-hidden="true"></i>Track your attendance and streaks</li>
            <li><i class="fa-solid fa-id-card" aria-hidden="true"></i>Manage your membership and payments</li>
          </ul>
        </div>

        <a href="../content/index.php" class="back-link"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to website</a>
      </div>
    </aside>

    <!-- Form side -->
    <main class="auth-panel" id="auth-panel">
      <div class="auth-card">

        <a href="../content/index.php" class="mobile-back"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to website</a>

        <div class="tabs" role="tablist" aria-label="Account">
          <button type="button" class="tab active" id="tab-signin" role="tab" aria-selected="true" aria-controls="panel-signin" data-tab="signin">Sign In</button>
          <button type="button" class="tab" id="tab-signup" role="tab" aria-selected="false" aria-controls="panel-signup" data-tab="signup" tabindex="-1">Sign Up</button>
          <span class="tab-indicator" aria-hidden="true"></span>
        </div>

        <div class="panels">
        <!-- SIGN IN -->
        <section id="panel-signin" class="tab-panel active" role="tabpanel" aria-labelledby="tab-signin">
          <h1>Welcome back</h1>
          <p class="sub">Sign in to book classes and check your progress.</p>

          <div class="notice success" id="signin-notice" role="status" hidden></div>
          <div class="notice error" id="login-error-msg" role="alert" hidden></div>

          <form id="loginForm" method="POST" novalidate>
            <div class="field">
              <label for="email_username">Email or username</label>
              <div class="input">
                <i class="fa-solid fa-user" aria-hidden="true"></i>
                <input type="text" id="email_username" name="email_username" autocomplete="username" required>
              </div>
              <p class="field-error" id="email_username-error-msg" role="alert" hidden></p>
            </div>

            <div class="field">
              <label for="password">Password</label>
              <div class="input">
                <i class="fa-solid fa-lock" aria-hidden="true"></i>
                <input type="password" id="password" name="password" autocomplete="current-password" required>
                <button type="button" class="toggle-pw" data-target="password" aria-label="Show password"><i class="fa-regular fa-eye" aria-hidden="true"></i></button>
              </div>
              <p class="field-error" id="password-error-msg" role="alert" hidden></p>
            </div>

            <a href="../content/contact.php" class="forgot">Forgot your password? Contact us</a>

            <button type="submit" class="submit"><span class="label">Sign In</span><span class="spinner" aria-hidden="true"></span></button>
          </form>

          <p class="switch">New to Evolve Fit? <button type="button" class="link-btn" data-tab="signup">Create an account</button></p>
        </section>

        <!-- SIGN UP -->
        <section id="panel-signup" class="tab-panel" role="tabpanel" aria-labelledby="tab-signup" aria-hidden="true" inert>
          <h1>Create your account</h1>
          <p class="sub">It takes less than a minute. All fields are required.</p>

          <div class="notice error" id="form-error-msg" role="alert" hidden></div>

          <form id="registerForm" method="POST" novalidate>
            <div class="grid">
              <div class="field">
                <label for="member_first_name">First name</label>
                <div class="input"><i class="fa-solid fa-user" aria-hidden="true"></i>
                  <input type="text" id="member_first_name" name="member_first_name" autocomplete="given-name" required></div>
                <p class="field-error" id="member_first_name-error-msg" role="alert" hidden></p>
              </div>
              <div class="field">
                <label for="member_last_name">Last name</label>
                <div class="input"><i class="fa-solid fa-user" aria-hidden="true"></i>
                  <input type="text" id="member_last_name" name="member_last_name" autocomplete="family-name" required></div>
                <p class="field-error" id="member_last_name-error-msg" role="alert" hidden></p>
              </div>

              <div class="field">
                <label for="member_username">Username</label>
                <div class="input"><i class="fa-solid fa-at" aria-hidden="true"></i>
                  <input type="text" id="member_username" name="member_username" autocomplete="username" required></div>
                <p class="field-error" id="member_username-error-msg" role="alert" hidden></p>
              </div>
              <div class="field">
                <label for="member_email">Email</label>
                <div class="input"><i class="fa-solid fa-envelope" aria-hidden="true"></i>
                  <input type="email" id="member_email" name="member_email" autocomplete="email" required></div>
                <p class="field-error" id="member_email-error-msg" role="alert" hidden></p>
              </div>

              <div class="field">
                <label for="member_date_of_birth">Birth date</label>
                <div class="input"><i class="fa-solid fa-cake-candles" aria-hidden="true"></i>
                  <input type="date" id="member_date_of_birth" name="member_date_of_birth" autocomplete="bday" required></div>
                <p class="field-error" id="member_date_of_birth-error-msg" role="alert" hidden></p>
              </div>
              <div class="field">
                <label for="member_contact_number">Contact number</label>
                <div class="input"><i class="fa-solid fa-phone" aria-hidden="true"></i>
                  <input type="tel" id="member_contact_number" name="member_contact_number" autocomplete="tel" inputmode="tel" required></div>
                <p class="field-error" id="member_contact_number-error-msg" role="alert" hidden></p>
              </div>

              <div class="field full">
                <label for="member_address">Address</label>
                <div class="input"><i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                  <input type="text" id="member_address" name="member_address" autocomplete="street-address" required></div>
                <p class="field-error" id="member_address-error-msg" role="alert" hidden></p>
              </div>

              <div class="field">
                <label for="member_password">Password</label>
                <div class="input"><i class="fa-solid fa-lock" aria-hidden="true"></i>
                  <input type="password" id="member_password" name="member_password" autocomplete="new-password" required>
                  <button type="button" class="toggle-pw" data-target="member_password" aria-label="Show password"><i class="fa-regular fa-eye" aria-hidden="true"></i></button></div>
                <div class="strength" id="strength" aria-hidden="true"><span></span><span></span><span></span><span></span></div>
                <p class="hint" id="strength-text">8+ characters, letters and numbers</p>
                <p class="field-error" id="member_password-error-msg" role="alert" hidden></p>
              </div>
              <div class="field">
                <label for="confirm_password">Confirm password</label>
                <div class="input"><i class="fa-solid fa-lock" aria-hidden="true"></i>
                  <input type="password" id="confirm_password" name="confirm_password" autocomplete="new-password" required>
                  <button type="button" class="toggle-pw" data-target="confirm_password" aria-label="Show password"><i class="fa-regular fa-eye" aria-hidden="true"></i></button></div>
                <p class="field-error" id="confirm_password-error-msg" role="alert" hidden></p>
              </div>
            </div>

            <button type="submit" class="submit"><span class="label">Create Account</span><span class="spinner" aria-hidden="true"></span></button>
          </form>

          <p class="switch">Already a member? <button type="button" class="link-btn" data-tab="signin">Sign in</button></p>
        </section>
        </div>

      </div>
    </main>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="../js/log_reg_js/auth.js"></script>
  <script src="../js/log_reg_js/register.js"></script>
  <script src="../js/log_reg_js/login.js"></script>
</body>
</html>
