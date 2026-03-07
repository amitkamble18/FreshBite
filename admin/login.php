<?php
session_start();

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

if($username == "admin" && $password == "admin123"){

$_SESSION['admin'] = true;

header("Location: dashboard.php");
exit();

}else{
$error = "Invalid login";
}

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="admin.css">

</head>

<body>

<div class="admin-login-container">

    <div class="admin-login-box">

        <h2>Admin Login</h2>

        <form method="POST" class="admin-login-form">

            <input type="text" name="username" placeholder="Username" required>

            <input type="password" name="password" placeholder="Password" required>

            <button name="login">Login</button>

        </form>

    </div>

</div>

</body>
</html>