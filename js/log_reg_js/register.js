$(document).ready(function () {
  $("#registerForm").on("submit", function (e) {
    e.preventDefault();
    var $form = $(this);

    // Collect form data
    var formData = $form.serializeArray();

    // Add current date/time for member_date_join
    var currentDate = new Date().toISOString().slice(0, 10); // YYYY-MM-DD format
    formData.push({ name: "member_date_join", value: currentDate });

    $.ajax({
      url: "../php/log_reg_validation/registerValidate.php",
      type: "POST",
      data: $.param(formData), // convert back to query string
      dataType: "json",
      success: function (response) {
        console.log("Ajax Success:", response);
        if (response.status === "success") {
          console.log("Redirecting to Log in");
          $form[0].reset();
          window.location.href = "../log_reg/log_reg.php";
        } else if (response.status === "error") {
          console.error("Registration Error:", response.message);
          $("#" + response.field + "-error-msg").text(response.message).show();
        }
      },
      error: function (xhr, status, errorThrown) {
        console.error("AJAX request failed!");
        console.error("Status:", status);
        console.error("Error Thrown:", errorThrown);
        console.error("Response Text:", xhr.responseText);
      },
    });
  });
});
