<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  >
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
  <link rel="stylesheet" href="../css/log_reg.css">
  <title>Login Page</title>
</head>

<body>
  <div class="container" id="container">
    <!-- REGISTER -->
    <div class="form-container sign-up">
      <form id="registerForm" method="POST">
        <br>
        <br>
        <h1>Create Account</h1>
        <span>or use your email for registration</span>
        <input class="form-control" type="text" placeholder="First Name" name="member_first_name" required>
        <input class="form-control" type="text" placeholder="Last Name" name="member_last_name" required>
        <input class="form-control" type="text" placeholder="Username" name="member_username" required>
        <input class="form-control" type="email" placeholder="Email" name="member_email" required>
        <input class="form-control" type="date" placeholder="Birth Date" name="member_date_of_birth" required>
        <input class="form-control" type="text" placeholder="Contact Number" name="member_contact_number" required>
        <input class="form-control" type="text" placeholder="Address" name="member_address" required>
        <input class="form-control" type="password" placeholder="Password" name="member_password" required>
        <input class="form-control" type="password" placeholder="Confirm Password" name="confirm_password" required>
        <button class="btn w-100">Sign Up</button>
      </form>
    </div>

    <!-- LOGIN -->
    <div class="form-container sign-in">
      <form id="loginForm" method="POST">
        <h1>Sign In</h1>
        <span>or use your email or username</span>
        <input class="form-control" type="text" placeholder="Email or Username" name="email_username" required>
        <input class="form-control" type="password" placeholder="Password" name="password" required>
        <a href="#">Forget Your Password?</a>
        <button class="btn w-100">Sign In</button>
      </form>
    </div>

    <!-- TOGGLE SECTION -->
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Enter your personal details to use all site features</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello, Friend!</h1>
          <p>Register with your personal details to use all site features</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/log_reg_js/register.js"></script>
  <script src="../js/log_reg_js/login.js"></script>

  <script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
      container.classList.add('active');
    });

    loginBtn.addEventListener('click', () => {
      container.classList.remove('active');
    });
  </script>
</body>
</html>
