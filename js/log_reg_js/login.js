$(document).ready(function () {
    $("#loginForm").on("submit", function (e) {
        e.preventDefault();
        var $form = $(this);
        var form = $form[0];

        Auth.clearErrors(form);
        Auth.showNotice("login-error-msg", "");
        Auth.showNotice("signin-notice", "");

        // Basic client-side check before calling the server
        var emptyField = null;
        ["email_username", "password"].forEach(function (id) {
            if (!emptyField && !form.elements[id].value.trim()) emptyField = id;
        });
        if (emptyField) {
            Auth.showFieldError(emptyField, emptyField === "password" ? "Please enter your password." : "Please enter your email or username.");
            return;
        }

        Auth.setLoading(form, true);

        $.ajax({
            url: "../php/log_reg_validation/loginValidate.php",
            type: "POST",
            data: $form.serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    form.reset();
                    switch (response.role) {
                        case "admin":
                            window.location.href = "../dashboard/admin/index.php";
                            break;
                        case "trainer":
                            window.location.href = "../dashboard/trainer/index.php";
                            break;
                        case "member":
                            window.location.href = "../dashboard/user/index.php";
                            break;
                        default:
                            Auth.setLoading(form, false);
                            Auth.showNotice("login-error-msg", "Your account role is not recognised. Please contact the gym.");
                    }
                    return;
                }

                Auth.setLoading(form, false);
                var shown = response.field && Auth.showFieldError(response.field, response.message);
                if (!shown) Auth.showNotice("login-error-msg", response.message || "Sign in failed. Please try again.");
            },
            error: function (xhr, status, errorThrown) {
                console.error("Login request failed:", status, errorThrown, xhr.responseText);
                Auth.setLoading(form, false);
                Auth.showNotice("login-error-msg", "We couldn't reach the server. Please check your connection and try again.");
            }
        });
    });
});
