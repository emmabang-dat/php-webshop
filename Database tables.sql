-- Create database
CREATE DATABASE phpwebshopdb;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(100) NOT NULL, 
    phone VARCHAR(20) NOT NULL, 
    address VARCHAR(100) NOT NULL, 
    password VARCHAR(255) NOT NULL, 
    email VARCHAR(100) NOT NULL, 
    role VARCHAR(50), created_at 
    DATETIME NOT NULL DEFAULT CURRENT_TIME
);

-- Add data to users table
INSERT INTO
    users (
        name, phone, address, password, email, role
    )
VALUES (
    -- Normal user
        'Karoline - User', '12345678', 'TestVej 2', '123456', 'user@mail.com', 'user'
    ),
    -- Admin user
    (
        'Karsten - Admin', '87654321', 'TestVej 3', '123456', 'admin@mail.com', 'admin'
    );

-- Create products table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL
);

-- Create subcategories table
CREATE TABLE subcategories (
    id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL, category_id INT, FOREIGN KEY (category_id) REFERENCES categories (id)
);

-- Create products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, price DECIMAL(10, 2) NOT NULL, subcategory_id INT, FOREIGN KEY (subcategory_id) REFERENCES subcategories (id)
);

-- Join tables
SELECT
    c.name as category,
    s.name as subcategory,
    p.name as product
FROM
    products p
    JOIN subcategories s ON p.subcategory_id = s.id
    JOIN categories c ON s.category_id = c.id;

-- Inserting categories
INSERT INTO categories (name) VALUES ('Dogs'), ('Cats');

-- Inserting subcategories
INSERT INTO
    subcategories (name, category_id)
VALUES ('Toys', 1),
    ('Food', 1),
    ('Toys', 2),
    ('Food', 2);

-- Inserting products
INSERT INTO
    products (
        name, description, image, price, subcategory_id
    )
VALUES (
        'Companion rock banana', 'Introducing the Companion Rock Banana Teddy Bear - The Soft And Faithful Friend Your Dog Will Love!', 'uploads/Bananatoy.jpeg', 29, 1
    ),
    (
        'Companion happy avocado', 'Introducing the Companion happy avacado Teddy Bear - The Soft And Faithful Friend Your Dog Will Love!', 'uploads/Avocadotoy.jpeg', 39, 1
    ),
    (
        'Reindeer', 'Reindeer - Complete grain-free and potato-free dog food for all breeds.', 'uploads/Reindeerfood.jpeg', 129, 2
    ),
    (
        'Essential Eternal Living', 'Essential Eternal Living is the must important thin for your dog', 'uploads/EssentialLivingFood.jpeg', 769, 2
    ),
    (
        'Cat toy Mouse', 'Cat toy Mouse Family on spring 30 cm', 'uploads/CatToyMouse.jpg', 99, 3
    ),
    (
        'Trixie Scratch', 'Trixie Scratch Tunnel Cat', 'uploads/CatTunnel.jpeg', 85, 3
    ),
    (
        'Carnilove Crunchy Treats', 'Carnilove Crunchy Treats for Cats - Salmon & Mint', 'uploads/SalmonCatFood.jpeg', 15, 4
    ),
    (
        'ESSENTIAL the LITTLE LION,', 'ESSENTIAL the LITTLE LION, a complete meal, is our tribute to these incredible and forever fascinating creatures: Kittens.', 'uploads/EssentialLivingFood.Catjpeg.png', 1090, 4
    );