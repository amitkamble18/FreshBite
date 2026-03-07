<?php
session_start();   // START SESSION FIRST

include 'includes/db.php';
include 'includes/header.php';

$message = "";

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($result) > 0){

$user = mysqli_fetch_assoc($result);

/* VERIFY PASSWORD */

if(password_verify($password,$user['password'])){

$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

header("Location: index.php");
exit();

}else{

$message = "Wrong Password!";

}

}else{

$message = "User not found!";

}

}
?>

<section class="login-section">

<h2>Login</h2>

<div class="login-box">

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

<p class="error"><?php echo $message; ?></p>

<p class="register-link">
Don't have an account? <a href="register.php">Register</a>
</p>

</div>

</section>

<?php include 'includes/footer.php'; ?>