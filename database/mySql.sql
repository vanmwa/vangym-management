CREATE TABLE member (
    member_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    member_first_name VARCHAR(55) NOT NULL,
    member_last_name VARCHAR(55) NOT NULL,
    member_username VARCHAR(55) UNIQUE NOT NULL,
    member_password VARCHAR(55) NOT NULL,
    member_contact_number VARCHAR(15) UNIQUE NOT NULL,
    member_email VARCHAR(100) UNIQUE NOT NULL,
    member_date_of_birth DATE NOT NULL,
    member_address VARCHAR(200) NOT NULL,
    member_date_join DATE NOT NULL,
    member_status ENUM('active', 'inactive') NOT NULL,
    role ENUM('member') NOT NULL DEFAULT 'member'
);

---

CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    admin_email VARCHAR(100) UNIQUE NOT NULL,
    admin_username VARCHAR(255) UNIQUE NOT NULL,
    admin_password VARCHAR(255) NOT NULL,
    role ENUM('admin') NOT NULL DEFAULT 'admin'
);

---

CREATE TABLE package (
    package_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    package_name VARCHAR(100) NOT NULL,
    package_description VARCHAR(200) NOT NULL,
    duration INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

---

CREATE TABLE membership (
    membership_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    member_id INT NOT NULL,
    package_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    member_status ENUM('active', 'expired', 'cancelled') NOT NULL,
    FOREIGN KEY (member_id) REFERENCES member(member_id),
    FOREIGN KEY (package_id) REFERENCES package(package_id)
);

---

CREATE TABLE attendance (
    attendance_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    member_id INT NOT NULL,
    attendance_check_in TIME NOT NULL,
    attendance_check_out TIME NOT NULL,
    FOREIGN KEY (member_id) REFERENCES member(member_id)
);

---

CREATE TABLE trainer (
    trainer_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    trainer_username VARCHAR(55) UNIQUE NOT NULL,
    trainer_password VARCHAR(55) NOT NULL,
    trainer_first_name VARCHAR(55) NOT NULL,
    trainer_last_name VARCHAR(55) NOT NULL,
    trainer_specialty VARCHAR(55) NOT NULL,
    trainer_contact_number VARCHAR(55) UNIQUE NOT NULL,
    trainer_email VARCHAR(100) UNIQUE NOT NULL,
    trainer_status ENUM('active', 'inactive') NOT NULL,
    role ENUM('trainer') NOT NULL DEFAULT 'trainer'
);

---

CREATE TABLE class_schedule (
    class_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    admin_id INT NOT NULL,
    trainer_id INT NOT NULL,
    class_name VARCHAR(100) NOT NULL,
    class_date DATE NOT NULL,
    class_start TIME NOT NULL,
    class_end TIME NOT NULL,
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id),
    FOREIGN KEY (trainer_id) REFERENCES trainer(trainer_id)
);

---

CREATE TABLE class_booking (
    booking_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    member_id INT NOT NULL,
    class_id INT NOT NULL,
    booking_date DATE NOT NULL,
    status ENUM('reserved', 'cancelled', 'attended') NOT NULL,
    FOREIGN KEY (member_id) REFERENCES member(member_id),
    FOREIGN KEY (class_id) REFERENCES class_schedule(class_id)
);

---

CREATE TABLE payment (
    payment_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    membership_id INT NOT NULL,
    admin_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL,
    payment_method ENUM('card', 'cash', 'online payment') NOT NULL,
    status ENUM('paid', 'pending') NOT NULL,
    FOREIGN KEY (membership_id) REFERENCES membership(membership_id),
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id)
);
CREATE TABLE notifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NULL,
    receiver_id INT NULL,
    receiver_role ENUM('member', 'trainer', 'admin', 'all') NOT NULL DEFAULT 'all',
    title VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES member(member_id) ON DELETE SET NULL,
    FOREIGN KEY (receiver_id) REFERENCES member(member_id) ON DELETE CASCADE
);
