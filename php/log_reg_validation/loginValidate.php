<?php
session_start();
include("../../config/config.php");
header("Content-Type: application/json");

$email_username = trim(htmlspecialchars($_POST["email_username"]));
$password       = trim(htmlspecialchars($_POST["password"]));

if (empty($email_username) || empty($password)) {
    echo json_encode([
        "status" => "error",
        "message" => "All fields are required",
        "field"   => "email_username"
    ]);
    exit;
}

//Check in ADMIN table

$check_admin = $dbconn->prepare("SELECT * FROM admin WHERE admin_email = ? OR admin_username = ?");
$check_admin->bind_param("ss", $email_username, $email_username);
$check_admin->execute();
$result_admin = $check_admin->get_result();

if ($result_admin->num_rows > 0) {
    $admin = $result_admin->fetch_assoc();


    if (password_verify($password,$admin["admin_password"])) {
        $_SESSION["admin_id"]       = $admin["admin_id"];
        $_SESSION["admin_username"] = $admin["admin_username"];
        $_SESSION["admin_email"]    = $admin["admin_email"];
        $_SESSION["role"]           = $admin["role"];

        echo json_encode([
            "status"  => "success",
            "message" => "Login successful",
            "role"    => $admin["role"]
        ]);
        exit;
    } else {
        echo json_encode([
            "status"  => "error",
            "message" => "Invalid password",
            "field"   => "password"
        ]);
        exit;
    }
}

//Check in MEMBER table

$check_member = $dbconn->prepare("SELECT * FROM member WHERE member_email = ? OR member_username = ?");
$check_member->bind_param("ss", $email_username, $email_username);
$check_member->execute();
$result_member = $check_member->get_result();

if ($result_member->num_rows > 0) {
    $member = $result_member->fetch_assoc();

    if (password_verify($password, $member["member_password"])) {
        $_SESSION["member_id"]       = $member["member_id"];
        $_SESSION["member_username"] = $member["member_username"];
        $_SESSION["member_email"]    = $member["member_email"];
        $_SESSION["role"]            = $member["role"];

        echo json_encode([
            "status"  => "success",
            "message" => "Login successful",
            "role"    => $member["role"]
        ]);
        exit;
    } else {
        echo json_encode([
            "status"  => "error",
            "message" => "Invalid password",
            "field"   => "password"
        ]);
        exit;
    }
}

//Check in TRAINER table

$check_trainer = $dbconn->prepare("SELECT * FROM trainer WHERE trainer_email = ? OR trainer_username = ?");
$check_trainer->bind_param("ss", $email_username, $email_username);
$check_trainer->execute();
$result_trainer = $check_trainer->get_result();

if ($result_trainer->num_rows > 0) {
    $trainer = $result_trainer->fetch_assoc();

    if (password_verify($password, $trainer["trainer_password"])) {
        $_SESSION["trainer_id"]       = $trainer["trainer_id"];
        $_SESSION["trainer_username"] = $trainer["trainer_username"];
        $_SESSION["trainer_email"]    = $trainer["trainer_email"];
        $_SESSION["role"]             = $trainer["role"];

        echo json_encode([
            "status"  => "success",
            "message" => "Login successful",
            "role"    => $trainer["role"]
        ]);
        exit;
    } else {
        echo json_encode([
            "status"  => "error",
            "message" => "Invalid password",
            "field"   => "password"
        ]);
        exit;
    }
}

echo json_encode([
    "status"  => "error",
    "message" => "Account not found",
    "field"   => "email_username"
]);
exit;

?>
