$(document).ready(function () {
  $("#registerForm").on("submit", function (e) {
    e.preventDefault();
    var $form = $(this);
    var form = $form[0];

    Auth.clearErrors(form);
    Auth.showNotice("form-error-msg", "");

    // Client-side checks (the server still validates everything)
    var labels = {
      member_first_name: "your first name",
      member_last_name: "your last name",
      member_username: "a username",
      member_email: "your email",
      member_date_of_birth: "your birth date",
      member_contact_number: "your contact number",
      member_address: "your address",
      member_password: "a password",
      confirm_password: "your password again"
    };

    for (var id in labels) {
      if (!form.elements[id].value.trim()) {
        Auth.showFieldError(id, "Please enter " + labels[id] + ".");
        return;
      }
    }
    if (!form.elements.member_email.checkValidity()) {
      Auth.showFieldError("member_email", "Please enter a valid email address.");
      return;
    }
    if (form.elements.member_password.value !== form.elements.confirm_password.value) {
      Auth.showFieldError("confirm_password", "Passwords do not match.");
      return;
    }

    // Collect form data and add today's date as the join date
    var formData = $form.serializeArray();
    var currentDate = new Date().toISOString().slice(0, 10); // YYYY-MM-DD
    formData.push({ name: "member_date_join", value: currentDate });

    Auth.setLoading(form, true);

    $.ajax({
      url: "../php/log_reg_validation/registerValidate.php",
      type: "POST",
      data: $.param(formData),
      dataType: "json",
      success: function (response) {
        Auth.setLoading(form, false);

        if (response.status === "success") {
          var username = form.elements.member_username.value;
          form.reset();
          document.getElementById("strength").classList.remove("on");
          Auth.showTab("signin");
          Auth.showNotice("signin-notice", "Account created! Sign in to get started.");
          var user = document.getElementById("email_username");
          user.value = username;
          document.getElementById("password").focus();
          return;
        }

        var shown = response.field && response.field !== "form" && Auth.showFieldError(response.field, response.message);
        if (!shown) Auth.showNotice("form-error-msg", response.message || "Registration failed. Please try again.");
      },
      error: function (xhr, status, errorThrown) {
        console.error("Register request failed:", status, errorThrown, xhr.responseText);
        Auth.setLoading(form, false);
        Auth.showNotice("form-error-msg", "We couldn't reach the server. Please check your connection and try again.");
      },
    });
  });
});
