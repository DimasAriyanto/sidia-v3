# Sidia

**Sidia** is a warehouse management system designed to simplify inventory tracking, stock management, and order fulfillment processes. Built using Laravel and MySQL, this application ensures seamless management of warehouse operations.

This project follows the **Service Repository Pattern** to ensure clean architecture and maintainability.

## Features

✅ Efficient product management with CRUD operations  
✅ Inventory tracking and stock control  
✅ Order and delivery management  
✅ User role and permission management  
✅ Detailed reporting for better insights  
✅ Responsive design for both desktop and mobile  

## Installation

### Prerequisites
Ensure you have the following installed:
- PHP 8.1 or higher
- Composer
- MySQL
- Laravel 11

### Steps to Install
1. **Install dependencies**
```bash
composer install
```

2. **Create `.env` file**
```bash
cp .env.example .env
```

3. **Configure `.env` file**
- Set database credentials (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)

4. **Generate application key**
```bash
php artisan key:generate
```

5. **Run migrations and seeders**
```bash
php artisan migrate --seed
```

6. **Start the application**
```bash
php artisan serve
```

## Usage
1. Access the application by visiting `http://localhost:8000`
2. Log in with the seeded credentials or create a new user account
3. Manage inventory, orders, and track warehouse operations efficiently

---
Enjoy managing your warehouse with **Sidia**! 🚀

