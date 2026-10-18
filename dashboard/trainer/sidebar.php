<!-- ✅ Trainer Dashboard Sidebar -->
<style>
  body {
    background-color: #f8f9fa;
    font-family: "Poppins", sans-serif;
    margin: 0;
  }

  /* --- Wrapper --- */
  #wrapper {
    display: flex;
    width: 100%;
    min-height: 100vh;
    overflow-x: hidden;
  }

  /* --- Sidebar --- */
  #sidebar {
    width: 250px;
    background-color: #1e2a38;
    color: #fff;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    overflow-y: auto;
    transition: left 0.3s ease;
    z-index: 1000;
  }

  #sidebar .sidebar-header {
    display: flex;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #2f3c4f;
    background-color: #16212e;
    position: sticky;
    top: 0;
    z-index: 10;
  }

  #sidebar .avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    margin-right: 12px;
    object-fit: cover;
  }

  #sidebar .sidebar-header h4 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #fff;
  }

  .sidebar-nav {
    list-style: none;
    padding: 0;
    margin: 0;
    flex-grow: 1;
  }

  .sidebar-nav li a {
    display: block;
    color: #d1d1d1;
    padding: 12px 20px;
    text-decoration: none;
    transition: all 0.3s;
    font-size: 0.95rem;
  }

  .sidebar-nav li a i {
    margin-right: 10px;
    width: 20px;
    text-align: center;
  }

  .sidebar-nav li a:hover,
  .sidebar-nav li a.active {
    background-color: #007bff;
    color: #fff;
  }

  .sidebar-footer {
    border-top: 1px solid #2f3c4f;
    padding: 15px 20px;
    background-color: #16212e;
  }

  .sidebar-footer a {
    color: #ffc107;
    text-decoration: none;
    display: flex;
    align-items: center;
  }

  .sidebar-footer a i {
    margin-right: 8px;
  }

  .sidebar-footer a:hover {
    color: #fff;
  }

  /* --- Main Content --- */
  #page-content-wrapper {
    flex-grow: 1;
    margin-left: 250px;
    padding: 30px;
    transition: margin-left 0.3s ease;
  }

  .card {
    border: none;
    border-radius: 12px;
  }

  .card-body h5 {
    font-weight: 600;
  }

  .btn {
    border-radius: 8px;
    padding: 10px 18px;
  }

  /* --- Responsive Sidebar --- */
  @media (max-width: 768px) {
    #sidebar {
      left: -250px;
    }

    #sidebar.active {
      left: 0;
    }

    #page-content-wrapper {
      margin-left: 0;
      padding: 20px;
    }
  }
</style>

<aside id="sidebar">
  <div class="sidebar-header">
    <img src="image/logo.png" alt="Logo" class="avatar">
    <h4>Trainer Panel</h4>
  </div>

  <ul class="sidebar-nav">
    <li>
      <a href="index.php" class="active">
        <i class="fa-solid fa-gauge"></i> Dashboard
      </a>
    </li>
    <li>
      <a href="profile.php">
        <i class="fa-solid fa-user"></i> My Profile
      </a>
    </li>
    <li>
      <a href="members.php">
        <i class="fa-solid fa-users"></i> My Members
      </a>
    </li>
    <li>
      <a href="schedule.php">
        <i class="fa-solid fa-calendar-check"></i> Class Schedule
      </a>
    </li>
    <li>
      <a href="attendance.php">
        <i class="fa-solid fa-clipboard-check"></i> Attendance Logs
      </a>
    </li>
    <li>
      <a href="payments.php">
        <i class="fa-solid fa-wallet"></i> Payment Records
      </a>
    </li>
    <li>
      <a href="announcements.php">
        <i class="fa-solid fa-bullhorn"></i> Announcements
      </a>
    </li>
    <li>
      <a href="notifications.php">
        <i class="fa-solid fa-bell"></i> Notifications
      </a>
    </li>
    <li>
      <a href="support.php">
        <i class="fa-solid fa-headset"></i> Support
      </a>
    </li>
  </ul>

  <div class="sidebar-footer">
    <a href="../../php/log_out.php">
      <i class="fa-solid fa-door-open"></i> Logout
    </a>
  </div>
</aside>
