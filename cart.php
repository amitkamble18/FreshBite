```php

<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if(isset($_POST['add_to_cart'])){

$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];

$item = [
    "name" => $name,
    "price" => $price,
    "image" => $image,
    "qty" => 1
];

$_SESSION['cart'][] = $item;

}

/* REMOVE ITEM FROM CART */

if(isset($_GET['remove'])){

$key = $_GET['remove'];

if(isset($_SESSION['cart'][$key])){

unset($_SESSION['cart'][$key]);

$_SESSION['cart'] = array_values($_SESSION['cart']);

}

}

?>

<section class="cart-section">

<h2>Your Cart 🛒</h2>

<div class="cart-container">

<?php

$total = 0;

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){

foreach($_SESSION['cart'] as $key => $item){

$subtotal = $item['price'] * $item['qty'];
$total += $subtotal;
?>

<div class="cart-item">

<img src="images/<?php echo $item['image']; ?>" class="cart-img">

<div class="cart-info">

<h3><?php echo $item['name']; ?></h3>

<p>Price: ₹<?php echo $item['price']; ?></p>

<p>Quantity: <?php echo $item['qty']; ?></p>

<p>Subtotal: ₹<?php echo $subtotal; ?></p>

<a href="cart.php?remove=<?php echo $key; ?>" class="remove-btn">Remove</a>

</div>

</div>

<?php
}
?>

<h3 class="cart-total">Total: ₹<?php echo $total; ?></h3>

<a href="checkout.php" class="btn">Proceed to Checkout</a>

<?php
}else{

echo "<p>Your cart is empty</p>";

}
?>

</div>

</section>

<?php include 'includes/footer.php'; ?>
```
