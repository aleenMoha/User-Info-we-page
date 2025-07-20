# 📝 User Info Web App

This project is a simple full-stack web application built with **HTML**, **CSS**, **PHP**, **MySQL**, and optional **JavaScript** to:

- Accept user input (name and age) via a one-line form.
- Store the data in a MySQL database.
- Display all user records in a table.
- Allow toggling a user's status (0 or 1) dynamically.

---

## 🚀 Setup Instructions

### 1. Install XAMPP
- Download and install [XAMPP](https://www.apachefriends.org/index.html).
- Launch **XAMPP Control Panel**.
- Start **Apache** and **MySQL** modules.

---

### 2. Create MySQL Database and Table

- Open [phpMyAdmin](http://localhost/phpmyadmin).
- Create a new **database** called `info`.
- Run the following SQL to create a table named `user`:

```sql
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    status TINYINT(1) DEFAULT 0
);
```

---

## ✅ How It Works
- The user enters a name and age into a single-line form.
- Clicking Submit saves the entry into the database with default status = 0.
- Below the form, all records are shown in a table.
- Each record has a "Toggle" button that switches the status between 0 and 1.
- The page refreshes automatically after each toggle to show the new status.

---



