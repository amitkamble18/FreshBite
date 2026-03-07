<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}

$order_id = isset($_GET['id']) ? $_GET['id'] : 0;

if($order_id == 0){
echo "Invalid Order ID";
exit();
}

/* GET ORDER */

$order = mysqli_query($conn,"SELECT * FROM orders WHERE id='$order_id'");
$order_data = mysqli_fetch_assoc($order);

/* GET ORDER ITEMS */

$items = mysqli_query($conn,"SELECT * FROM order_items WHERE order_id='$order_id'");
?>

<!DOCTYPE html>
<html>

<head>
<title>Order Details</title>
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

<h1>Order #<?php echo $order_data['id']; ?></h1>

<h3>Total: ₹<?php echo $order_data['total']; ?></h3>

<h3>Status: <?php echo $order_data['status']; ?></h3>

<h2>Pizzas Ordered</h2>

<table>

<tr>
<th>Pizza</th>
<th>Price</th>
<th>Quantity</th>
</tr>

<?php while($item = mysqli_fetch_assoc($items)){ ?>

<tr>

<td><?php echo $item['pizza_name']; ?></td>

<td>₹<?php echo $item['price']; ?></td>

<td><?php echo $item['quantity']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>