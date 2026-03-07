<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}

$result = mysqli_query($conn,"SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>
<title>Orders</title>
<link rel="stylesheet" href="admin.css">
</head>

<body>

<div class="admin-container">

<!-- Sidebar -->
<div class="sidebar">

<h2>FreshBite Admin</h2>

<a href="dashboard.php">Dashboard</a>
<a href="orders.php">Orders</a>
<a href="pizzas.php">Pizzas</a>
<a href="view_order.php?id=<?php echo $row['id']; ?>">View</a>
<a href="logout.php">Logout</a>

</div>


<!-- Main Content -->
<div class="main-content">

<h1>Orders</h1>

<table>

<tr>
<th>Order ID</th>
<th>Total</th>
<th>Status</th>
<th>Date</th>
<th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td>#<?php echo $row['id']; ?></td>

<td>₹<?php echo $row['total']; ?></td>

<td><?php echo $row['status']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="view_order.php?id=<?php echo $row['id']; ?>">View</a>

<a href="update_order.php?id=<?php echo $row['id']; ?>&status=Preparing">Preparing</a>

<a href="update_order.php?id=<?php echo $row['id']; ?>&status=Delivered">Delivered</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>