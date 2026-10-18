$(document).ready(function(){
    $("#loginForm").on("submit",function(e){
        e.preventDefault();
        var $form = $(this);

        $.ajax({
            url: "../php/log_reg_validation/loginValidate.php",
            type: "POST",
            data: $form.serialize(),
            dataType:"json",
            success: function(response){
                console.log("Ajax success", response);
                if(response.status === "success"){
                    console.log("login success redirecting");
                    $form[0].reset();
                    switch(response.role){
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
                            window.location.href = "../log_reg/log_reg.php";
                            console.log("Invalid");
                    }
                }else if (response.status === "error") {
                    console.warn("⚠️ Login Error:", response.message);
                    // 🔸 Show error message under the correct input or as alert
                    if (response.field) {
                        $("#" + response.field + "-error-msg")
                            .text(response.message)
                            .show();
                    } else {
                        alert(response.message);
                    }
                } else {
                    console.warn("Unexpected response:", response);
                }
            },
            error: function (xhr, status, errorThrown) {
                console.error("❌ AJAX Request Failed");
                console.error("Status:", status);
                console.error("Error Thrown:", errorThrown);
                console.error("Response Text:", xhr.responseText);
            }   
        });

    })


});