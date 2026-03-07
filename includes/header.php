<?php
if(session_status() == PHP_SESSION_NONE){
session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FreshBite</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header class="navbar">

<div class="logo">
FreshBite 🍕
</div>

<nav>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="menu.php">Menu</a></li>
<li><a href="about.php">About</a></li>
<li><a href="contact.php">Contact</a></li>
<li>
<a href="cart.php">
Cart 🛒 (
<?php
$count = 0;

if(isset($_SESSION['cart'])){
foreach($_SESSION['cart'] as $item){
$count += $item['qty'];
}
}

echo $count;
?>
)
</a>
</li>

<?php if(isset($_SESSION['user_name'])){ ?>

<li class="user-greet">👤 Hello <?php echo $_SESSION['user_name']; ?></li>
<li><a href="logout.php">Logout</a></li>

<?php } else { ?>

<li><a href="login.php">Login</a></li>

<?php } ?>

</ul>
</nav>

</header>