<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}

$order_id = $_GET['id'];

/* order info */
$order = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM orders WHERE id='$order_id'"
));

/* ordered pizzas */
$result = mysqli_query($conn,
"SELECT pizzas.name, pizzas.price, pizzas.image, order_items.quantity
FROM order_items
JOIN pizzas ON pizzas.id = order_items.pizza_id
WHERE order_items.order_id='$order_id'"
);
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

<h1>Order #<?php echo $order['id']; ?></h1>

<p>Total: ₹<?php echo $order['total']; ?></p>
<p>Status: <?php echo $order['status']; ?></p>

<h2>Pizzas Ordered</h2>

<table>

<tr>
<th>Image</th>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td>
<img src="../images/<?php echo $row['image']; ?>" width="80">
</td>

<td><?php echo $row['name']; ?></td>

<td>₹<?php echo $row['price']; ?></td>

<td><?php echo $row['quantity']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>