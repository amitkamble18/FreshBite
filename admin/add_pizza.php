<?php
include '../includes/db.php';

if(isset($_POST['add'])){

$name=$_POST['name'];
$price=$_POST['price'];

mysqli_query($conn,"INSERT INTO pizzas(name,price) VALUES('$name','$price')");
}
?>

<form method="POST">

<input type="text" name="name" placeholder="Pizza Name">

<input type="text" name="price" placeholder="Price">

<button name="add">Add Pizza</button>

</form>