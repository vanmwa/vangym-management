<?php
include("../config/config.php"); // make sure this connects to your DB

// --- Default admin credentials ---
$admin_username = "AdminIan";
$admin_email = "AdminIan@gmail.com";
$admin_password = "AdminIan123";
$admin_role = "admin";

// --- Check if admin already exists in the admin table ---
$check = $dbconn->prepare("SELECT * FROM admin WHERE admin_username = ? OR admin_email = ?");
$check->bind_param("ss", $admin_username, $admin_email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "<h3 style='color:orange;'>⚠️ Admin account already exists.</h3>";
    exit();
}

// --- Hash the password securely ---
$hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

// --- Insert default admin account ---
$insert = $dbconn->prepare("
    INSERT INTO admin (admin_username, admin_email, admin_password, role)
    VALUES (?, ?, ?, ?)
");
$insert->bind_param("ssss", $admin_username, $admin_email, $hashed_password, $admin_role);

if ($insert->execute()) {
    echo "<h3 style='color:green;'>✅ Admin account created successfully!</h3>";
    echo "<p><strong>Username:</strong> {$admin_username}</p>";
    echo "<p><strong>Email:</strong> {$admin_email}</p>";
    echo "<p><strong>Password:</strong> {$admin_password}</p>";
    echo "<p><strong>Role:</strong> {$admin_role}</p>";
} else {
    echo "<h3 style='color:red;'>❌ Failed to create admin: " . htmlspecialchars($dbconn->error) . "</h3>";
}

// --- Close connections ---
$insert->close();
$check->close();
$dbconn->close();
?>
