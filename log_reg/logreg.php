<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modern Login Page</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />
  <!-- SweetAlert -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container" id="container">
    
    <!-- Register Form -->
    <div class="form-container sign-up">
      <form id="registerForm">
        <h1>Create Account</h1>
        <span>or use your email for registration</span>
        <input type="text" placeholder="First Name" name="member_first_name" required />
        <input type="text" placeholder="Last Name" name="member_last_name" required />
        <input type="email" placeholder="Email" name="member_email" required />
        <input type="text" placeholder="Contact Number" name="member_contact_number" required />
        <input type="password" placeholder="Password" name="member_password" required />
        <input type="password" placeholder="Confirm Password" name="confirm_password" required />
        <button class="btn w-100 btn-success mt-3" type="submit">Sign Up</button>
      </form>
    </div>

    <!-- Sign In Form -->
    <div class="form-container sign-in">
      <form id="loginForm">
        <h1>Sign In</h1>
        <span>or use your email and password</span>
        <input type="email" placeholder="Email" name="member_email" required />
        <input type="password" placeholder="Password" name="member_password" required />
        <button class="btn w-100 btn-success mt-3" type="submit">Sign In</button>
      </form>
    </div>

    <!-- Toggle Panel -->
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Sign in with your personal details to continue</p>
          <button  id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello, Friend!</h1>
          <p>Register to start your journey with us</p>
          <button  id="register">Sign Up</button>
        </div>
      </div>
    </div>

  </div>

  <!-- JS -->
   <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>
  <script src="logreg.js"></script>
  <script src="regJQuery.js"></script>
  <script src="logJQuery.js"></script>
</body>
</html>
