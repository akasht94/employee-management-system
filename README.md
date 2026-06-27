# Employee Management System
Link to access the dashboard migrated on Cloud : http://43.205.254.186/employee-management/index.php
## Project Overview

The Employee Management System is a web-based CRUD (Create, Read, Update, Delete) application developed using PHP, MySQL, Bootstrap, HTML, CSS, and Apache Web Server. The project demonstrates the migration of a traditional web application from a local development environment (XAMPP) to the Amazon Web Services (AWS) Cloud using an EC2 instance.

This project was developed as part of a cloud migration demonstration and showcases deployment of a PHP-MySQL application on AWS Free Tier.

---

## Technologies Used

- PHP 8.x
- MySQL
- Apache2
- HTML5
- CSS3
- Bootstrap 5
- Git
- GitHub
- AWS EC2 (Ubuntu Server)

---

## Features

- Dashboard
- View Employees
- Add Employee
- Edit Employee
- Delete Employee
- Search Employee
- Responsive Bootstrap Interface
- MySQL Database Integration
- Cloud Deployment on AWS EC2

---

## Database Structure

Table Name:

```
employees
```

Columns:

| Column | Type |
|---------|------|
| id | INT (Primary Key) |
| employee_name | VARCHAR(100) |
| department | VARCHAR(50) |
| designation | VARCHAR(50) |
| email | VARCHAR(100) |
| phone | VARCHAR(15) |
| salary | DECIMAL(10,2) |
| joining_date | DATE |

---

## Local Development Environment

- XAMPP
- Apache
- MySQL
- PHP
- phpMyAdmin

---

## Cloud Deployment Environment

Cloud Provider

- Amazon Web Services (AWS)

Service Used

- Amazon EC2

Operating System

- Ubuntu Linux

Web Server

- Apache2

Database

- MySQL

Version Control

- Git & GitHub

---

## Installation Steps

### Clone Repository

```bash
git clone https://github.com/YOUR_USERNAME/employee-management.git
```

### Move Project

```bash
sudo mv employee-management /var/www/html/
```

### Install Apache

```bash
sudo apt update
sudo apt install apache2 -y
```

### Install PHP

```bash
sudo apt install php libapache2-mod-php php-mysql -y
```

### Install MySQL

```bash
sudo apt install mysql-server -y
```

### Import Database

```bash
mysql -u projectuser -p companydb < companydb.sql
```

---

## Database Configuration

Update `db.php`

```php
$host="localhost";
$user="projectuser";
$password="Project@123";
$database="companydb";
```

---

## Application URL

Once deployed on the AWS EC2 instance, the application can be accessed using:

**http://43.205.254.186/employee-management/index.php**

---

## Project Structure

```
employee-management/
│
├── index.php
├── add.php
├── edit.php
├── delete.php
├── db.php
├── style.css
├── companydb.sql
├── README.md
```

---

## CRUD Operations

### Create

Add a new employee.

### Read

View all employee records.

### Update

Modify employee information.

### Delete

Remove employee records.

---

## AWS Deployment Steps

1. Launch EC2 Instance
2. Connect using EC2 Instance Connect
3. Install Apache
4. Install PHP
5. Install MySQL
6. Clone GitHub Repository
7. Import Database
8. Configure Database Connection
9. Restart Apache
10. Access Application

---

## Learning Outcomes

- PHP CRUD Development
- MySQL Database Management
- Git & GitHub Version Control
- Cloud Migration
- AWS EC2 Deployment
- Apache Configuration
- Linux Administration

---

## Future Enhancements

- User Login Authentication
- Role-Based Access Control
- Employee Photo Upload
- PDF Report Generation
- Excel Export
- REST API Integration
- AWS RDS Integration
- Docker Deployment

---

## Author

**Akash T**

Employee Management System

Cloud Migration Demonstration Project

2026

---

## License

This project is developed for educational purposes only.
