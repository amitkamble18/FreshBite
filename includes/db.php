<?php

$conn = mysqli_connect("localhost","root","");

if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS freshbite");

mysqli_select_db($conn,"freshbite");

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS users(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
password VARCHAR(255)
)");

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS pizzas(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
price DECIMAL(10,2),
image VARCHAR(255)
)");

/* ---------- ADD THIS PART HERE ---------- */

$check = mysqli_query($conn,"SELECT * FROM pizzas");

if(mysqli_num_rows($check) == 0){

mysqli_query($conn,"INSERT INTO pizzas (name,price,image) VALUES
('Margherita',199,'margherita.jpg'),
('Farmhouse',299,'farmhouse.jpg'),
('Peppy Paneer',249,'paneer.jpg'),
('Veggie Delight',279,'pizza-bg.jpg'),
('Cheese Burst',329,'margherita.jpg'),
('Mexican Green Wave',309,'farmhouse.jpg'),
('Paneer Tikka',289,'paneer.jpg'),
('Veg Extravaganza',349,'pizza-bg.jpg'),
('Classic Corn',219,'margherita.jpg'),
('Italian Special',339,'farmhouse.jpg'),
('Spicy Veg',259,'paneer.jpg'),
('Loaded Cheese',369,'pizza-bg.jpg')
");

}

/* ---------- END HERE ---------- */

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS orders(
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
total DECIMAL(10,2),
status VARCHAR(50),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS order_items(
id INT AUTO_INCREMENT PRIMARY KEY,
order_id INT,
pizza_id INT,
quantity INT
)");

?>