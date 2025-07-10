# MyPortfolio Project

A portfolio and blog application developed with core PHP, Bootstrap, MySQL, JavaScript, CSS, jQuery, and Ajax. This project demonstrates modern web development best practices and incorporates the Singleton and Factory design patterns.

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Design Patterns](#design-patterns)
- [Getting Started](#getting-started)
- [Configuration](#configuration)

---

## Features

- Personal portfolio showcase (projects, skills, etc.)
- Blog module with CRUD (Create, Read, Update, Delete) operations
- Responsive design using Bootstrap
- AJAX-powered forms and dynamic updates
- Authentication and user management
- Commenting system
- Admin dashboard for content management

## Tech Stack

- **Backend:** Core PHP (no frameworks)
- **Frontend:** Bootstrap, JavaScript, CSS, jQuery
- **Database:** MySQL
- **AJAX:** For dynamic client-server communication

## Design Patterns Used

- **Singleton Pattern:** Ensures a single instance of key classes (e.g., database connection).
- **Factory Pattern:** Used for object creation, promoting loose coupling and scalability.

## Getting Started

### Prerequisites

- PHP 7.x or later
- MySQL 5.x or later
- Web server (Apache, Nginx, or similar)
- Composer (optional, if any dependencies are managed)

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/gautamw3/myportfolio_project.git
   cd myportfolio_project
   ```

2. **Set up the database:**
   - Create a MySQL database (e.g., `portfolio_db`).
   - Import the provided SQL schema (if available):
     ```bash
     mysql -u youruser -p portfolio_db < path/to/schema.sql
     ```

3. **Configure database connection:**
   - Edit the database configuration file (e.g., `config.php` or similar) and update your credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'youruser');
     define('DB_PASS', 'yourpassword');
     define('DB_NAME', 'portfolio_db');
     ```
