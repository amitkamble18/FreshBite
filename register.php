<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

$message = "";

if(isset($_POST['register'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

/* HASH PASSWORD */

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

/* CHECK IF EMAIL ALREADY EXISTS */

$check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($check) > 0){

$message = "Email already registered!";

}else{

mysqli_query($conn,"INSERT INTO users(name,email,password)
VALUES('$name','$email','$hashed_password')");

$message = "Registration successful! Please login.";

}

}
?>

<section class="login-section">

<h2>Register</h2>

<div class="login-box">

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="register">Register</button>

</form>

<p class="error"><?php echo $message; ?></p>

<p class="register-link">
Already have an account? <a href="login.php">Login</a>
</p>

</div>

</section>

<?php include 'includes/footer.php'; ?>