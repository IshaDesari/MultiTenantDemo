# MultiTenantDemo – Laravel Multi-Tenant SaaS Demo

MultiTenantDemo is a customized **multi-tenant SaaS demo application** built with **Laravel 10**.  
It demonstrates how a single application can securely serve multiple tenants while keeping their data completely isolated.

This project is intended for **learning, practice, and portfolio demonstration purposes only** – it is **not production-ready**.

---

## About This Project

This project is **based on an open-source Laravel multi-tenant starter** and has been **customized and extended by me** for learning and portfolio purposes.

### Customizations & Improvements
- Custom project structure and naming
- Updated and simplified setup instructions
- Improved environment & configuration handling
- Ready-to-extend base for tenant-based SaaS applications  
- Clean separation between central and tenant logic
- Integrated role & permission handling

> **Original Base Project Credit:**  
> https://github.com/tarikulwebx/Laravel-Multi-Tenant  
> Full credit to the original author for the initial project foundation.

---

## What is Multi-Tenant SaaS?

Multi-tenant SaaS (Software as a Service) is an architecture where:

- A **single application instance** serves multiple customers (tenants)
- All tenants share the **same codebase and infrastructure**
- Each tenant’s **data is fully isolated**
- Cost, maintenance, and scaling become more efficient

This architecture is widely used in modern SaaS platforms such as **CRMs, ERPs, and subscription-based systems**.

---

## Tech Stack

- Laravel 10
- PHP 8+
- Tenancy for Laravel
- Spatie Laravel Permission
- Blade Templates
- Tailwind CSS
- Vite
- MySQL

---

## Features

- Central & tenant application separation
- Tenant creation and management
- Tenant-based authentication system
- Role & permission-based access control
- Secure tenant data isolation
- Modern UI using Tailwind & Vite
- Scalable SaaS-ready architecture

---

## Installation & Setup

```bash
git clone https://github.com/IshaDesari/MultiTenantDemo.git
cd MultiTenantDemo
composer install
npm install
cp .env.example .env
php artisan key:generate
