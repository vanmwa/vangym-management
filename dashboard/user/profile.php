<?php
// profile.php
session_start();
include("../../config/config.php"); // $dbconn (mysqli)

// --- Session check
if (
    !isset($_SESSION['member_id']) ||
    !isset($_SESSION['member_username']) ||
    !isset($_SESSION['role']) ||
    $_SESSION['role'] !== 'member'
) {
    header("Location: ../../log_reg/log_reg.php");
    exit;
}
$member_id = intval($_SESSION['member_id']);
$messages = ['success' => [], 'error' => []];

// --- Ensure profile_picture column exists (MySQL 8+ supports IF NOT EXISTS)
$alter_sql = "ALTER TABLE member ADD COLUMN IF NOT EXISTS profile_picture VARCHAR(255) NULL AFTER member_address";
$dbconn->query($alter_sql); // ignore failure on older MySQL (safe to ignore)

// --- Fetch current data
$stmt = $dbconn->prepare("SELECT member_first_name, member_last_name, member_email, member_contact_number, member_date_of_birth, member_address, member_date_join, member_password, profile_picture FROM member WHERE member_id = ?");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$member = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$member) {
    echo "Member not found.";
    exit;
}

// --- Helper: sanitize input
function clean($v) {
    return htmlspecialchars(trim($v));
}

// --- Handle profile update (name, contact, dob, address, profile picture)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_profile') {
    $first = $_POST['first_name'] ?? '';
    $last  = $_POST['last_name'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $address = $_POST['address'] ?? '';

    // Basic validation
    if (empty($first) || empty($last) || empty($contact) || empty($dob) || empty($address)) {
        $messages['error'][] = "All profile fields are required.";
    } else {
        // Handle file upload (optional)
        $profile_picture_path = $member['profile_picture']; // existing value
        if (!empty($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] !== UPLOAD_ERR_NO_FILE) {
            $file = $_FILES['profile_picture'];
            // Validate
            $allowed = ['image/jpeg','image/png','image/webp','image/gif'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);

            if (!in_array($mime, $allowed)) {
                $messages['error'][] = "Profile picture must be an image (jpeg, png, webp, gif).";
            } elseif ($file['size'] > 2 * 1024 * 1024) { // 2MB
                $messages['error'][] = "Profile picture must be less than 2MB.";
            } else {
                // Create upload dir
                $uploadDir = __DIR__ . "/uploads/members/{$member_id}/";
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

                // Generate a safe filename
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = 'profile_' . time() . '.' . $ext;
                $target = $uploadDir . $filename;

                if (move_uploaded_file($file['tmp_name'], $target)) {
                    // Save relative path to DB (path from project root or web-accessible path)
                    // Adjust how you want to serve images; here we store relative to this file
                    $profile_picture_path = "uploads/members/{$member_id}/" . $filename;
                    // Optionally delete previous file
                    if (!empty($member['profile_picture']) && file_exists(__DIR__ . '/' . $member['profile_picture'])) {
                        @unlink(__DIR__ . '/' . $member['profile_picture']);
                    }
                } else {
                    $messages['error'][] = "Failed to move uploaded file.";
                }
            }
        }

        // If no errors, update DB
        if (empty($messages['error'])) {
            $stmt = $dbconn->prepare("UPDATE member SET member_first_name = ?, member_last_name = ?, member_contact_number = ?, member_date_of_birth = ?, member_address = ?, profile_picture = ? WHERE member_id = ?");
            $stmt->bind_param("ssssssi", $first, $last, $contact, $dob, $address, $profile_picture_path, $member_id);
            if ($stmt->execute()) {
                $messages['success'][] = "Profile updated successfully.";
                // Refresh member info
                $member['member_first_name'] = $first;
                $member['member_last_name'] = $last;
                $member['member_contact_number'] = $contact;
                $member['member_date_of_birth'] = $dob;
                $member['member_address'] = $address;
                $member['profile_picture'] = $profile_picture_path;
            } else {
                $messages['error'][] = "Failed to update profile.";
            }
            $stmt->close();
        }
    }
}

// --- Handle password change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'change_password') {
    $current = $_POST['current_password'] ?? '';
    $newpw = $_POST['new_password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if (empty($current) || empty($newpw) || empty($confirm)) {
        $messages['error'][] = "All password fields are required.";
    } elseif ($newpw !== $confirm) {
        $messages['error'][] = "New password and confirm password do not match.";
    } else {
        $stored = $member['member_password'];

        $is_hashed = false;
        // Heuristic: if stored length >= 60, assume password_hash. (bcrypt ~60)
        if (strlen($stored) >= 60 || preg_match('/^\$2y\$|\$2a\$|\$argon2/', $stored)) $is_hashed = true;

        $current_ok = false;
        if ($is_hashed) {
            if (password_verify($current, $stored)) $current_ok = true;
        } else {
            // stored plain text fallback (legacy)
            if ($current === $stored) $current_ok = true;
        }

        if (!$current_ok) {
            $messages['error'][] = "Current password is incorrect.";
        } else {
            // Hash new password
            $new_hash = password_hash($newpw, PASSWORD_DEFAULT);
            // Attempt to update (note: recommend altering column to VARCHAR(255) to store hash reliably)
            $stmt = $dbconn->prepare("UPDATE member SET member_password = ? WHERE member_id = ?");
            $stmt->bind_param("si", $new_hash, $member_id);
            if ($stmt->execute()) {
                $messages['success'][] = "Password changed successfully.";
            } else {
                $messages['error'][] = "Failed to update password. Please ensure member_password column can store hashed passwords (consider ALTER TABLE to VARCHAR(255)).";
            }
            $stmt->close();
        }
    }
}

// --- Helper functions for display
function esc($v){ return htmlspecialchars($v ?? ''); }
function show_msgs($messages){
    foreach($messages['error'] as $e) echo "<div class='alert alert-danger'>{$e}</div>";
    foreach($messages['success'] as $s) echo "<div class='alert alert-success'>{$s}</div>";
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>My Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body{ background:#f8f9fa; font-family:"Poppins",sans-serif; }
    .card{ border-radius:10px; box-shadow:0 6px 18px rgba(0,0,0,0.03); }
    .avatar-preview{ width:96px; height:96px; border-radius:50%; object-fit:cover; border:2px solid #fff; box-shadow:0 2px 8px rgba(0,0,0,0.08); }
    .small-note{ font-size:.9rem; color:#6c757d; }
</style>
</head>
<body>
<?php include("sidebar.php"); ?>

<div id="page-content-wrapper" class="p-3">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card p-3">
                <h5 class="mb-3">Profile</h5>

                <?php show_msgs($messages); ?>

                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_profile">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First name</label>
                            <input type="text" name="first_name" class="form-control" value="<?= esc($member['member_first_name']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last name</label>
                            <input type="text" name="last_name" class="form-control" value="<?= esc($member['member_last_name']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email (readonly)</label>
                            <input type="email" class="form-control" value="<?= esc($member['member_email']); ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact</label>
                            <input type="text" name="contact" class="form-control" value="<?= esc($member['member_contact_number']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date of birth</label>
                            <input type="date" name="dob" class="form-control" value="<?= esc($member['member_date_of_birth']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Member since</label>
                            <input type="text" class="form-control" value="<?= esc($member['member_date_join']); ?>" readonly>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2" required><?= esc($member['member_address']); ?></textarea>
                        </div>

                        <div class="col-md-4 d-flex flex-column align-items-center">
                            <label class="form-label">Profile picture</label>
                            <div class="mb-2">
                                <?php if (!empty($member['profile_picture']) && file_exists(__DIR__ . '/' . $member['profile_picture'])): ?>
                                    <img src="<?= esc($member['profile_picture']); ?>" alt="avatar" class="avatar-preview">
                                <?php else: ?>
                                    <img src="image/default-avatar.png" alt="avatar" class="avatar-preview">
                                <?php endif; ?>
                            </div>
                            <input type="file" name="profile_picture" accept="image/*" class="form-control form-control-sm">
                            <div class="small-note mt-2">Max 2MB. jpeg/png/webp/gif</div>
                        </div>

                        <div class="col-12 text-end">
                            <button class="btn btn-primary">Save Profile</button>
                        </div>
                    </div>
                </form>

            </div>

            <div class="card p-3 mt-3">
                <h5 class="mb-3">Change Password</h5>
                <form method="POST">
                    <input type="hidden" name="action" value="change_password">
                    <div class="mb-3">
                        <label class="form-label">Current password</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">New password</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirm new password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button class="btn btn-warning">Change Password</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-lg-4">
            <div class="card p-3">
                <h6>Account Info</h6>
                <dl class="row small-note">
                    <dt class="col-5">Username</dt>
                    <dd class="col-7"><?= esc($_SESSION['member_username']); ?></dd>

                    <dt class="col-5">Email</dt>
                    <dd class="col-7"><?= esc($member['member_email']); ?></dd>

                    <dt class="col-5">Contact</dt>
                    <dd class="col-7"><?= esc($member['member_contact_number']); ?></dd>

                    <dt class="col-5">Joined</dt>
                    <dd class="col-7"><?= esc($member['member_date_join']); ?></dd>
                </dl>
                <hr>
                <div class="small-note">If you change your password, future logins will require the new password. If your passwords are currently stored as plain text in the DB, consider running an update to convert them to secure hashes (and increase column length to VARCHAR(255)).</div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
