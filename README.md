# Inventory Management System

## Overview

This project is an Inventory Management System built with **Laravel** and **Livewire**. It provides a comprehensive solution for managing products, suppliers, and inventory. The system includes features for product management, inventory tracking, and supplier management.

## Features

- **Product Management**: Add, update, delete, and view products.
- **Inventory Tracking**: Monitor stock levels and track inventory changes.
- **Supplier Management**: Manage supplier details and relationships.
- **Real-time Updates**: Live updates with Livewire components.

## Requirements

- PHP 8.2 or higher
- Laravel 11.x
- Composer
- MySQL or another supported database

## Installation

Follow these steps to set up and run the application locally:

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/Enoch18/ims.git

2. **Navigate to the Project Directory:**

   ```bash
   cd ims


3. **Install Dependencies:**

   ```bash
   composer install

4. **Install Dependencies:**

   ```bash
   cp .example.env .env

5. **Configure Database:**

   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password

6. **Run Migrations:**

   ```bash
   php artisan migrate

7. **Seed the Database:**

   ```bash
   php artisan db:seed

8. **Serve the Application:**

   ```bash
   php artisan serve

## Login Credentials
To log in to the application, use the following credentials:

- Email: admin@test.com
- Password: admin