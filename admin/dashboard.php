<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

/* Analytics queries */

$order_query = mysqli_query($conn,"SELECT COUNT(*) AS total FROM orders");
$order_data = mysqli_fetch_assoc($order_query);
$orders = $order_data['total'];

$revenue_query = mysqli_query($conn,"SELECT SUM(total) AS revenue FROM orders");
$revenue_data = mysqli_fetch_assoc($revenue_query);
$revenue = $revenue_data['revenue'];

$user_query = mysqli_query($conn,"SELECT COUNT(*) AS total FROM users");
$user_data = mysqli_fetch_assoc($user_query);
$users = $user_data['total'];

$pizza_query = mysqli_query($conn,"SELECT COUNT(*) AS total FROM pizzas");
$pizza_data = mysqli_fetch_assoc($pizza_query);
$pizzas = $pizza_data['total'];
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="admin.css">

</head>

<body>

<div class="admin-container">

<div class="sidebar">

<h2>FreshBite Admin</h2>

<a href="dashboard.php">Dashboard</a>
<a href="orders.php">Orders</a>
<a href="pizzas.php">Pizzas</a>
<a href="logout.php">Logout</a>

</div>


<div class="main-content">

<h1>Dashboard</h1>

<div class="cards">

<div class="card">
<h3>Total Orders</h3>
<p><?php echo $orders; ?></p>
</div>

<div class="card">
<h3>Total Revenue</h3>
<p>₹<?php echo $revenue ? $revenue : 0; ?></p>
</div>

<div class="card">
<h3>Total Users</h3>
<p><?php echo $users; ?></p>
</div>

<div class="card">
<h3>Total Pizzas</h3>
<p><?php echo $pizzas; ?></p>
</div>

</div>

</div>

</div>

</body>
</html>