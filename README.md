# Shelfly

Shelfly is a web application designed to help users manage their food inventory. It aims to provide secure authentication, product management, barcode scanning, and stock tracking through a modern Laravel application.

## Table of contents

- [Purpose](#purpose)
- [Features](#features)
- [Dev Environment](#dev-environment)
- [Status](#status)
- [Installation](#installation)
- [Documentation](docs/index.md)

## Purpose

The goal of this project is to build a complete inventory management application while applying Laravel best practices, exploring modern web development practices, and strengthening software architecture skills through hands-on experience.

## Features

### Authentication

- ✅ Login
- ✅ Remember me
- ✅ Forgot / Reset password
- ✅ Register
- ✅ Email verification
- ✅ Logout

### Account

- ✅ Information
- ✅ Security

### Overview

- 🚧 Dashboard (user)
- 🚧 Dashboard (admin)
- 🚧 Product management (admin)
- 🚧 Inventory management (user)
- 🚧 Barcode scanner (user)

## Dev Environment

| Technology   | Version   |
| ------------ | --------- |
| Herd         | 1.30.x    |
| Laravel      | 13.33.x   |
| PHP          | 8.4.x     |
| MySQL        | 9.7.x     |
| Mailpit      | 1.31.x    |
| Cloudflared  | 2026.10.x |
| Blade        |           |
| Tailwind CSS |           |
| Vite         |           |

## Status

[![herd][herd]][herd-url]
[![laravel][laravel]][laravel-url]
[![php][php]][php-url]
[![mysql][mysql]][mysql-url]
[![mailpit][mailpit]][mailpit-url]
[![cloudflared][cloudflared]][cloudflared-url]
[![license][license]][license-url]

## Installation

### Install Laravel Herd

Herd provides a PHP and Laravel development environment, including PHP, Composer, and the Laravel CLI. It also supports managing PHP and Node.js versions.

After installation, verify that the required tools are available in your terminal:

```bash
herd --version
php --version
laravel --version
composer --version
node --version
npm --version
```

Make sure the required PHP and Node.js versions are selected and available.

### Install MySQL 9.7 LTS

```bash
brew install mysql@9.7
brew services start mysql@9.7
```

Make sure the MySQL service is running before proceeding with the database migrations:

```bash
brew services list
```

### Install Mailpit

Mailpit is used to test outgoing emails in the local development environment.

```bash
brew install mailpit
```

Start Mailpit in a separate terminal:

```bash
mailpit
```

The Mailpit web interface is available at `http://localhost:8025`.

Configure your mail settings in `.env` to route outgoing emails to Mailpit.

### Install Cloudflared

Shelfly uses Cloudflare Quick Tunnels to expose the local application for testing on other devices.

```bash
brew install cloudflared
```

### Clone the repository

```bash
cd ~/Herd
git clone https://github.com/fsa-ara/shelfly.git
cd shelfly
```

### Install dependencies

```bash
composer install
npm ci
```

### Configure the environment

```bash
cp .env.example .env
```

Configure your environment variables in `.env`, including your database connection settings.

Generate the application key:

```bash
php artisan key:generate
```

Run the migrations:

```bash
php artisan migrate
```

If the configured database does not exist, Laravel will prompt you to create it.

### Start the application

Start Shelfly and its development tunnel:

```bash
npm run start:server
```

Use the URL displayed in the terminal to access the application from another device.

Note: The Cloudflare Quick Tunnel URL changes when the tunnel restarts.

---

[herd]: https://img.shields.io/badge/Herd-v1.30.x-f9332b
[herd-url]: https://herd.laravel.com/
[laravel]: https://img.shields.io/badge/Laravel-v13.33.x-f55247
[laravel-url]: https://laravel.com/
[php]: https://img.shields.io/badge/PHP-v8.4.x-8892be
[php-url]: https://www.php.net/
[mysql]: https://img.shields.io/badge/MySQL-v9.7.x-00758f
[mysql-url]: https://www.mysql.com/
[mailpit]: https://img.shields.io/badge/Mailpit-v1.31.x-34aa8b
[mailpit-url]: https://mailpit.axllent.org/
[cloudflared]: https://img.shields.io/badge/Cloudflared-v2026.10.x-ff5e1e
[cloudflared-url]: https://developers.cloudflare.com/
[license]: https://img.shields.io/badge/License-MIT-blue.svg
[license-url]: LICENSE
