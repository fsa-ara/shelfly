# Shelfly

Shelfly is a web application that helps users manage and organize their food inventory. It provides secure authentication, product management, barcode scanning, and stock tracking through a modern Laravel application.

## Table of contents

- [Purpose](#purpose)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Status](#status)
- [Installation](#installation)
- [Documentations](docs/index.md)

## Purpose

The goal of this project is to build a complete inventory management application while following Laravel best practices and modern software architecture.

## Features

### Authentication

- ✅ Login
- ✅ Remember me
- ✅ Forgot password
- ✅ Register
- ✅ Email verification
- ✅ Logout

### Products

- ⏳ Product API
- ⏳ Product management

### Inventory

- ⏳ Dashboard
- ⏳ Stock management
- ⏳ Barcode scanner

## Tech Stack

- PHP 8.5
- Laravel 13.19
- MySQL 9.6
- Blade
- Tailwind CSS
- Vite

## Status

[![php][php]][php-url]
[![laravel][laravel]][laravel-url]
[![mysql][mysql]][mysql-url]
[![license][license]][license-url]

## Installation

### Clone the repository

```bash
git clone https://github.com/fsa-ara/shelfly.git
```

### Install dependencies

```bash
cd shelfly

composer install
npm install
```

### Environment

```bash
cp .env.example .env
```

### Generate the application key

```bash
php artisan key:generate
```

### Configure the database

Update your `.env` file with your database credentials.

### Run migrations

```bash
php artisan migrate
```

### Start the development server

```bash
composer run dev
```

---

[php]: https://img.shields.io/badge/PHP-v8.5.x-8892be
[php-url]: https://www.php.net/
[laravel]: https://img.shields.io/badge/Laravel-v13.19.x-f55247
[laravel-url]: https://laravel.com/
[mysql]: https://img.shields.io/badge/MySQL-v9.6.x-00758f
[mysql-url]: https://www.mysql.com/
[license]: https://img.shields.io/badge/License-MIT-blue.svg
[license-url]: LICENSE