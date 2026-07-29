-- Assignment 1: Database setup
CREATE DATABASE IF NOT EXISTS assignment1_db;
USE assignment1_db;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description VARCHAR(255)
);

INSERT INTO products (name, price, description) VALUES
('Laptop', 60000.00, 'Core i5, 8GB RAM'),
('Mouse', 500.00, 'Wireless Mouse'),
('Keyboard', 800.00, 'Mechanical Keyboard'),
('Monitor', 9500.00, '24 inch Full HD');
