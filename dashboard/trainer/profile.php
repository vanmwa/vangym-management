

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Profile | Gym Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Poppins', sans-serif;
        }
        #page-content-wrapper {
            margin-left: 250px;
            padding: 30px;
        }
        .profile-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .profile-header img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 3px solid #007bff;
            object-fit: cover;
        }
        .profile-header h3 {
            margin: 0;
            font-weight: 600;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn {
            border-radius: 8px;
        }
        .alert {
            border-radius: 10px;
        }
        @media (max-width: 768px) {
            #page-content-wrapper { margin-left: 0; }
            .profile-header { flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>
    <!-- ✅ Sidebar -->
    <?php include("sidebar.php"); ?>

    <!-- ✅ Main Content -->
    <div id="page-content-wrapper">
        <div class="container">
            <div class="profile-card">
                <div class="profile-header mb-4">
                    <img src="../../assets/default-profile.png" alt="Profile Picture">
                    <div>
                        <h3><?= htmlspecialchars($trainer['trainer_first_name'] . ' ' . $trainer['trainer_last_name']); ?></h3>
                        <p class="text-muted mb-0">Specialty: <?= htmlspecialchars($trainer['trainer_specialty']); ?></p>
                        <p class="text-muted">Status: 
                            <span class="badge bg-<?= $trainer['trainer_status'] === 'active' ? 'success' : 'secondary'; ?>">
                                <?= ucfirst($trainer['trainer_status']); ?>
                            </span>
                        </p>
                    </div>
                </div>

                <?php if (isset($success)) : ?>
                    <div class="alert alert-success"><?= $success; ?></div>
                <?php elseif (isset($error)) : ?>
                    <div class="alert alert-danger"><?= $error; ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($trainer['trainer_first_name']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($trainer['trainer_last_name']); ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Specialty</label>
                            <input type="text" name="specialty" class="form-control" value="<?= htmlspecialchars($trainer['trainer_specialty']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contact" class="form-control" value="<?= htmlspecialchars($trainer['trainer_contact_number']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($trainer['trainer_email']); ?>" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save"></i> Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
