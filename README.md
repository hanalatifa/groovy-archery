# Groovy Archery Management System
## Overview

Groovy Archery Management System is a web-based application developed to support the management of archery training activities digitally and efficiently.
This system helps administrators manage members, schedules, bookings, and payments within a single integrated platform.
The project was developed as part of the Uji Kompetensi Keahlian (Ujikom) in the field of Web Development.

## Features
- User Authentication
- Dashboard Management
- Member Management
- Booking Management
- Schedule Management
- Responsive User Interface
- Dark Mode Support

## Technologies
The application was developed using the following technologies:
- Laravel
- PHP
- MySQL
- Tailwind CSS
- JavaScript

## Installation Guide

### 1. Clone Repository

```bash
git clone https://github.com/username/groovy-archery.git
```

### 2. Move to Project Directory
```bash
cd groovy-archery
```

### 3. Install Dependencies
```bash
composer install
npm install
```

### 4. Configure Environment File
```bash
Copy the .env.example file and rename it to .env
cp .env.example .env
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Configure Database
Edit the database configuration inside the .env file
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=groovy_archery
DB_USERNAME=root
DB_PASSWORD=
```

7. Run Database Migration
```bash
php artisan migrate
```

8. Start Development Server
```bash
php artisan serve
npm run dev
```

## User Roles
Role	Access
Admin	Full system management
User	Booking and profile management