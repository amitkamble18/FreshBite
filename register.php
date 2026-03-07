<?php
include 'includes/db.php';

if(isset($_POST['register'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($conn,"INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')");

header("Location: login.php");

}
?>

<?php include 'includes/header.php'; ?>

<section class="login-section">

<h2>Create Account 🍕</h2>

<div class="login-box">

<form method="POST">

<input type="text" name="name" placeholder="Your Name" required>

<input type="email" name="email" placeholder="Your Email" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="register">Register</button>

</form>

</div>

</section>

<?php include 'includes/footer.php'; ?>