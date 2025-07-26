# Blog App 📝

A simple blog web application built with **PHP** and **MySQL** that allows users to create and read blog posts, while admins have full control over the content and users through an admin dashboard.

---

## ⚙️ Technologies Used

- PHP
- MySQL
- HTML / CSS
- JavaScript (optional)
- XAMPP (for local server setup)

---

## ✨ Features

### 👤 Regular Users:
- Register and log in.
- View and read blog posts.
- Filter posts by categories.
- View full post details.
- User profile images are displayed with posts and comments.

### 🛠️ Admin Dashboard:
- Full control over the website content.
- Add, edit, and delete posts.
- Manage users (create, delete users, and assign admin roles).
- Manage categories (add/edit/delete categories).
- View all posts and filter them by author or category.
- Upload and manage images for blog posts and user profiles.

---

📂 Project Structure
bloggg
- config/         # Database config and connection
- images/         # Uploaded user avatars and post thumbnails
- admin/          # Admin dashboard pages
- parts/          # Reusable components like header, footer, navbar
- index/      # Main entry point

---

## 🚀 Getting Started

1. Clone the repository.
2. Import the provided SQL file into your local MySQL server (via phpMyAdmin).
3. Place the project in `htdocs` if using XAMPP.
4. Start Apache and MySQL from the XAMPP control panel.
5. Visit `http://localhost/bloggg` in your browser.

---

## 📌 Notes

- Make sure file uploads are enabled in your PHP config.
- Passwords are hashed before storing in the database for security.
- Only users with admin privileges can access the dashboard.

---

## 👩‍💻 Author

Mai Salah – Computer and Systems Engineering Student  

