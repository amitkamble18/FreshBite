<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}

$result = mysqli_query($conn,"SELECT * FROM contact_messages ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>
<title>Messages</title>
<link rel="stylesheet" href="admin.css">
</head>

<body>

<div class="admin-container">

<div class="sidebar">

<h2>FreshBite Admin</h2>

<a href="dashboard.php">Dashboard</a>
<a href="orders.php">Orders</a>
<a href="pizzas.php">Pizzas</a>
<a href="messages.php">Messages</a>
<a href="logout.php">Logout</a>

</div>

<div class="main-content">

<h1>Customer Messages</h1>

<table>

<tr>
<th>Name</th>
<th>Email</th>
<th>Message</th>
<th>Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['message']; ?></td>
<td><?php echo $row['created_at']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>