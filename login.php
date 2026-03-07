<?php
session_start();
include 'includes/db.php';

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");

if(mysqli_num_rows($result) == 1){

$user = mysqli_fetch_assoc($result);

$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

header("Location: index.php");
exit();

}else{
$error = "Invalid email or password";
}

}
?>

<?php include 'includes/header.php'; ?>

<section class="login-section">

<h2>Login to FreshBite 🍕</h2>

<div class="login-box">

<form method="POST">

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button type="submit" name="login">Login</button>

</form>

<?php
if(isset($error)){
echo "<p class='error'>$error</p>";
}
?>

<p class="register-link">
Don't have an account? <a href="register.php">Register</a>
</p>

</div>

</section>

<?php include 'includes/footer.php'; ?>