# Evolve Fit - Gym Management System

Evolve Fit is a web-based gym management system built with **PHP, MySQL, Bootstrap 5, HTML/CSS and JavaScript**. It gives a gym a public website to attract new members, and separate dashboards for **admins**, **trainers** and **members** to manage memberships, classes, attendance and payments in one place.

![Evolve Fit landing page](docs/images/landing-page.png)

## Table of contents
- [Features](#features)
- [How it works](#how-it-works)
- [Database](#database)
- [Project structure](#project-structure)
- [Local setup (XAMPP)](#local-setup-xampp)
- [Known limitations](#known-limitations)

## Features

### Public website (`content/`)
- **Landing page** with hero, stats, features, membership plans, 4-week workout plan, testimonials and call-to-action, with scroll animations and hover effects.
- **About, Facilities, Class, Membership, FAQ and Contact** pages.
- Shared navbar and footer; responsive layout for desktop, tablet and phone.

### Authentication (`log_reg/`, `php/log_reg_validation/`)
- Combined **login / registration** page with live validation messages.
- Members register with name, username, email, date of birth, contact number, address and password (duplicate emails/usernames are rejected).
- One login form for everyone: the system checks the **admin**, **member** and **trainer** accounts and redirects to the matching dashboard.
- Passwords are checked with `password_verify`, and logout (`php/log_out.php`) destroys the session.

### Member dashboard (`dashboard/user/`)
- Overview with welcome message and recent attendance activity.
- **Profile** and personal information.
- **My Membership:** current plan, start and end dates, and join or renew a package.
- **Classes:** browse the schedule, book a class and cancel a booking.
- **Attendance:** history, weekly visits, monthly attendance and attendance streak.
- **Payments:** payment history.
- Notifications and support.

### Trainer dashboard (`dashboard/trainer/`)
- Overview ("Trainer Panel") and **profile**.
- **Class schedule** for assigned classes.
- **Members** list and attendance of their members.
- Payments, announcements, notifications and support.

### Admin dashboard (`dashboard/admin/`)
- **Members:** add, view and manage member records.
- **Trainers:** trainer management (specialty, contact, active/inactive).
- **Classes and schedule:** create classes, assign trainers, set date and time.
- **Attendance:** attendance tracker and logs (check-in / check-out).
- **Billing and membership:** manage packages (add or delete plans), memberships and record payments (paid or pending).
- **Reports and analysis:** summaries of members, attendance and revenue.

## How it works

1. A visitor opens the **landing page**, compares membership plans and clicks **Join Now**.
2. They **register** on `log_reg/log_reg.php`. Their account is stored in the `member` table with a hashed password and an active status.
3. On **login**, `php/log_reg_validation/loginValidate.php` looks the user up in the admin, member and trainer tables, verifies the password, stores the user in the PHP session and returns JSON that the page's JavaScript uses to redirect to `dashboard/admin/`, `dashboard/trainer/` or `dashboard/user/`.
4. A member **chooses a package** and pays. A `membership` row is created (start date today, end date = package duration) together with a `payment` row.
5. Members **book classes** from the schedule created by the admin. Each booking is a `class_booking` row (reserved, cancelled or attended).
6. Staff record **attendance** (check-in / check-out). The member dashboard turns it into weekly, monthly and streak statistics.
7. The admin tracks **billing and reports**, adds or deletes packages (`php/package/`), and records cash payments.

## Database

Schema: [`database/mySql.sql`](database/mySql.sql) (database name `final_gym_system`).

| Table | Purpose |
| --- | --- |
| `member` | Member accounts and personal details |
| `trainer` | Trainer accounts, specialty and status |
| `admin` | Administrator accounts |
| `package` | Membership plans (name, description, duration, price) |
| `membership` | A member's subscription to a package (start, end, status) |
| `payment` | Payments for memberships (amount, method, paid/pending) |
| `class_schedule` | Classes with trainer, date and time |
| `class_booking` | Member bookings for classes |
| `attendance` | Member check-in and check-out times |
| `notifications` | Messages for members, trainers or admins |

## Project structure

| Folder | Purpose |
| --- | --- |
| `content/` | Public pages (landing, about, class, facilities, membership, FAQ, contact) plus shared `navbar.php` and `footer.php` |
| `log_reg/` | Login and registration page |
| `dashboard/` | `admin/`, `trainer/` and `user/` dashboards |
| `php/` | Form handlers: `class/`, `package/`, `log_reg_validation/`, logout, membership processing |
| `config/` | Database connection (`config.php` is git-ignored; copy `config.example.php`) |
| `database/` | `mySql.sql` database schema |
| `setup/` | One-time setup scripts (`adminInsert.php` creates the default admin) |
| `css/`, `js/`, `img/` | Stylesheets, scripts and images |
| `docs/` | Documentation assets such as screenshots |

## Local setup (XAMPP)

1. Place the project in `C:\xampp\htdocs\Gym Management System`.
2. Start **Apache** and **MySQL** in the XAMPP Control Panel.
3. Open http://localhost/phpmyadmin, create the database `final_gym_system` and import `database/mySql.sql`.
4. Copy `config/config.example.php` to `config/config.php` and adjust the credentials if needed.
5. Visit `http://localhost/Gym%20Management%20System/setup/adminInsert.php` once to create the admin account, then **delete or protect that file** and change the default admin password.
6. Open http://localhost/Gym%20Management%20System/content/index.php

## Known limitations

This is a work in progress. A few handlers still need finishing:
- `php/class/book_class.php` and `cancel_class.php` use a placeholder member ID instead of the logged-in member's session.
- `php/process_membership.php` uses relative paths and redirects that don't match its current folder.
- Package prices on the landing page are written directly in the page rather than loaded from the `package` table.
