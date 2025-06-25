# Employee Management System (Mini Project)

A simple Laravel 9 + MySQL web application with login authentication, employee CRUD functionality, and a dashboard summary of employee stats.

### Features

-   Login with Breeze
-   Add, Edit, Delete Employees
-   Gender count, average age, and total salary dashboard

## 🚀 Tech Stack

-   Laravel 9
-   MySQL
-   Blade (Laravel templating engine)
-   Tailwind CSS
-   Chart.js

## 📦 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/employee-management.git
cd employee-management
```

### 2. Install Dependencies

```bash
composer install
npm install
npm run build
```

### 3. Environment Setup

Copy the .env.example file and update your environment variables:

```bash
cp .env.example .env
Update these lines in your .env file:
```

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_mysql_user
DB_PASSWORD=your_mysql_password
```

### 4. Generate Application Key

```
php artisan key:generate
```

### 5. Run Migrations and Seeders (Optional)

```
php artisan migrate
php artisan db:seed

```

### 6. Start the Development Server

```
php artisan serve
```

Access the app at: http://localhost:8000
