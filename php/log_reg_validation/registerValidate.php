<?php
include("../../config/config.php");
header("Content-Type: application/json");

// 🧩 Sanitize and collect form data (match lowercase names from form & DB)
$member_first_name     = trim(htmlspecialchars($_POST["member_first_name"] ?? ''));
$member_last_name      = trim(htmlspecialchars($_POST["member_last_name"] ?? ''));
$member_username       = trim(htmlspecialchars($_POST["member_username"] ?? ''));
$member_email          = trim(htmlspecialchars($_POST["member_email"] ?? ''));
$member_date_of_birth  = trim(htmlspecialchars($_POST["member_date_of_birth"] ?? ''));
$member_contact_number = trim(htmlspecialchars($_POST["member_contact_number"] ?? ''));
$member_address        = trim(htmlspecialchars($_POST["member_address"] ?? ''));
$member_password       = trim(htmlspecialchars($_POST["member_password"] ?? ''));
$confirm_password      = trim(htmlspecialchars($_POST["confirm_password"] ?? ''));
$member_date_join      = trim(htmlspecialchars($_POST["member_date_join"] ?? ''));



// 🧩 Validate empty fields
if (
    empty($member_first_name) || empty($member_last_name) || empty($member_username) ||
    empty($member_email) || empty($member_date_of_birth) || empty($member_contact_number) ||
    empty($member_password) || empty($confirm_password) || empty($member_address)
) {
    echo json_encode(["status" => "error", "message" => "All fields are required", "field" => "form"]);
    exit;
}

// 🧩 Check if username or email already exists
$check_user = $dbconn->prepare("SELECT member_email, member_username FROM member WHERE member_email = ? OR member_username = ?");
$check_user->bind_param("ss", $member_email, $member_username);
$check_user->execute();
$result = $check_user->get_result();

if ($result->num_rows > 0) {
    $existing = $result->fetch_assoc();
    if ($existing["member_email"] === $member_email) {
        echo json_encode(["status" => "error", "message" => "Email already exists", "field" => "member_email"]);
        exit;
    } elseif ($existing["member_username"] === $member_username) {
        echo json_encode(["status" => "error", "message" => "Username already exists", "field" => "member_username"]);
        exit;
    }
}

// 🧩 Check password match
if ($member_password !== $confirm_password) {
    echo json_encode(["status" => "error", "message" => "Passwords do not match", "field" => "member_password"]);
    exit;
}

// 🧩 Hash password
$hash_password = password_hash($member_password, PASSWORD_DEFAULT);

// 🧩 Insert data into database
$insert = $dbconn->prepare("
    INSERT INTO member (
        member_first_name,
        member_last_name,
        member_username,
        member_email,
        member_date_of_birth,
        member_contact_number,
        member_address,
        member_password,
        member_date_join
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$insert->bind_param(
    "sssssssss",
    $member_first_name,
    $member_last_name,
    $member_username,
    $member_email,
    $member_date_of_birth,
    $member_contact_number,
    $member_address,
    $hash_password,
    $member_date_join
);

if ($insert->execute()) {
    echo json_encode(["status" => "success", "message" => "Account created successfully!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Account creation failed. Please try again."]);
}

$check_user->close();
$insert->close();
$dbconn->close();
exit;
?>
