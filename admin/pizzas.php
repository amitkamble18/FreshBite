<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['admin'])){
header("Location: login.php");
exit();
}

/* ADD PIZZA */

if(isset($_POST['add'])){

$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];

mysqli_query($conn,"INSERT INTO pizzas(name,price,image)
VALUES('$name','$price','$image')");

}

/* FETCH PIZZAS */

$result = mysqli_query($conn,"SELECT * FROM pizzas");
?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Pizzas</title>

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
<a href="logout.php">Logout</a>

</div>


<!-- Main Content -->
<div class="main-content">

<h1>Manage Pizzas</h1>

<form method="POST">

<input type="text" name="name" placeholder="Pizza Name" required>

<input type="number" name="price" placeholder="Price" required>

<input type="text" name="image" placeholder="Image name (pizza.jpg)" required>

<button name="add">Add Pizza</button>

</form>


<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Image</th>
<th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>₹<?php echo $row['price']; ?></td>

<td>
<img src="../images/<?php echo $row['image']; ?>" width="60">
</td>

<td>

<a href="edit_pizza.php?id=<?php echo $row['id']; ?>">Edit</a>

<a href="delete_pizza.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>