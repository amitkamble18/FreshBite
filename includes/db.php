<?php

$conn = mysqli_connect("localhost","root","");

if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

/* Create database */
mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS freshbite");

/* Select database */
mysqli_select_db($conn,"freshbite");

/* Users table */
mysqli_query($conn,"CREATE TABLE IF NOT EXISTS users(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
password VARCHAR(255)
)");

/* Pizzas table */
mysqli_query($conn,"CREATE TABLE IF NOT EXISTS pizzas(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
price DECIMAL(10,2),
image VARCHAR(255)
)");

/* Check if pizzas table already has data */
$check = mysqli_query($conn,"SELECT * FROM pizzas");

if($check && mysqli_num_rows($check) == 0){

mysqli_query($conn,"INSERT INTO pizzas (name,price,image) VALUES
('Margherita',199,'margherita.jpg'),
('Farmhouse',299,'farmhouse.jpg'),
('Peppy Paneer',249,'paneer.jpg'),
('Veggie Delight',279,'Veggie-Delight.jpg'),
('Cheese Burst',329,'cheese-burst.jpg'),
('Mexican Green Wave',309,'mexican.jpg'),
('Paneer Tikka',289,'paneer-tikka.jpg'),
('Veg Extravaganza',349,'Veg-Extravaganza.jpg'),
('Classic Corn',219,'classic-corn.jpg'),
('Italian Special',339,'italian-special.jpg'),
('Spicy Veg',259,'spicy-veg.jpg'),
('Loaded Cheese',369,'loaded-cheese.jpg')
");

}

/* Orders table */
mysqli_query($conn,"CREATE TABLE IF NOT EXISTS orders(
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
total DECIMAL(10,2),
status VARCHAR(50),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

/* Order items table */
mysqli_query($conn,"CREATE TABLE IF NOT EXISTS order_items(
id INT AUTO_INCREMENT PRIMARY KEY,
order_id INT,
pizza_id INT,
quantity INT
)");

?>