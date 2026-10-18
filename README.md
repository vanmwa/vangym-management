# Evolve Fit - Gym Management System

A PHP/MySQL gym management system with a public website, member login/registration, and admin, trainer and member dashboards.

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

## Local setup (XAMPP)

1. Place the project in `C:\xampp\htdocs\Gym Management System`.
2. Start **Apache** and **MySQL** in the XAMPP Control Panel.
3. Open http://localhost/phpmyadmin, create the database `final_gym_system` and import `database/mySql.sql`.
4. Copy `config/config.example.php` to `config/config.php` and adjust the credentials if needed.
5. Visit `http://localhost/Gym%20Management%20System/setup/adminInsert.php` once to create the admin account, then **delete or protect that file**.
6. Open http://localhost/Gym%20Management%20System/content/index.php
