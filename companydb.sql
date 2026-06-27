CREATE DATABASE companydb;
USE companydb;
CREATE TABLE employees(id INT AUTO_INCREMENT PRIMARY KEY,employee_name VARCHAR(100),department VARCHAR(50),designation VARCHAR(50),email VARCHAR(100));
INSERT INTO employees(employee_name,department,designation,email) VALUES
('Rahul Sharma','IT','System Engineer','rahul@example.com'),
('Priya Das','HR','HR Executive','priya@example.com');