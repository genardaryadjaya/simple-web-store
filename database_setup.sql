-- Database setup untuk Shopping Website
-- Jalankan file ini di phpMyAdmin untuk membuat database dan tabel

-- Buat database (jika belum ada)
CREATE DATABASE IF NOT EXISTS shopping_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE shopping_db;

-- Tabel produk
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    discount_price DECIMAL(10,2) DEFAULT NULL,
    image VARCHAR(255) NOT NULL,
    category VARCHAR(100) DEFAULT 'Uncategorized',
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabel gambar produk (untuk multiple images)
CREATE TABLE IF NOT EXISTS product_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    image_name VARCHAR(255) NOT NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Tabel admin (untuk login admin)
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert admin default (username: admin, password: admin123)
INSERT INTO admins (username, password, email) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@example.com');

-- Insert beberapa produk contoh
INSERT INTO products (name, description, price, discount_price, image, category, stock) VALUES
('Smartphone Android', 'Smartphone Android terbaru dengan performa tinggi dan kamera berkualitas', 2500000, 2200000, 'product-01.jpg', 'Electronics', 15),
('Laptop Gaming', 'Laptop gaming dengan spesifikasi tinggi untuk gaming dan multitasking', 8500000, 8000000, 'product-02.jpg', 'Electronics', 8),
('Headphone Wireless', 'Headphone wireless dengan kualitas suara premium dan noise cancelling', 1200000, 1000000, 'product-03.jpg', 'Electronics', 25),
('Smart Watch', 'Smart watch dengan fitur kesehatan dan notifikasi smartphone', 1800000, 1500000, 'product-04.jpg', 'Electronics', 12),
('Camera DSLR', 'Kamera DSLR profesional untuk fotografi berkualitas tinggi', 5000000, 4500000, 'product-05.jpg', 'Electronics', 5),
('Tablet iPad', 'Tablet iPad dengan layar retina dan performa cepat', 3500000, 3200000, 'product-06.jpg', 'Electronics', 10);

-- Insert gambar tambahan untuk produk (contoh)
INSERT INTO product_images (product_id, image_name, sort_order) VALUES
(1, 'product-01-2.jpg', 1),
(1, 'product-01-3.jpg', 2),
(2, 'product-02-2.jpg', 1),
(3, 'product-03-2.jpg', 1); 