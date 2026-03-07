```php

<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

/* REMOVE ITEM FROM CART */

if(isset($_GET['remove'])){

$remove_id = $_GET['remove'];

foreach($_SESSION['cart'] as $key => $item){

if($item['id'] == $remove_id){

unset($_SESSION['cart'][$key]);

}

}

/* reindex array */
$_SESSION['cart'] = array_values($_SESSION['cart']);

}

/* ADD TO CART LOGIC */
if(isset($_POST['add_to_cart'])){

$pizza_id = $_POST['pizza_id'];
$qty = $_POST['quantity'];

$result = mysqli_query($conn,"SELECT * FROM pizzas WHERE id='$pizza_id'");
$pizza = mysqli_fetch_assoc($result);

/* create cart if not exists */
if(!isset($_SESSION['cart'])){
$_SESSION['cart'] = [];
}

$found = false;

/* check if pizza already in cart */
foreach($_SESSION['cart'] as &$item){

if($item['id'] == $pizza_id){
$item['qty'] += $qty;
$found = true;
break;
}

}
unset($item);

/* if not found add new */
if(!$found){

$item = [
"id" => $pizza['id'],
"name" => $pizza['name'],
"price" => $pizza['price'],
"image" => $pizza['image'],   // ADD THIS
"qty" => $qty
];

$_SESSION['cart'][] = $item;

}

}
?>

<section class="cart-section">

<h2>Your Cart 🛒</h2>

<div class="cart-container">

<?php

$total = 0;

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){

foreach($_SESSION['cart'] as $item){

$subtotal = $item['price'] * $item['qty'];
$total += $subtotal;
?>

<div class="cart-item">

<img src="images/<?php echo isset($item['image']) ? $item['image'] : 'pizza-bg.jpg'; ?>" class="cart-img" alt="Pizza">

<div class="cart-info">

<h3><?php echo $item['name']; ?></h3>

<p>Price: ₹<?php echo $item['price']; ?></p>

<p>Quantity: <?php echo $item['qty']; ?></p>

<p>Subtotal: ₹<?php echo $subtotal; ?></p>

<a href="cart.php?remove=<?php echo $item['id']; ?>" class="remove-btn">Remove</a>

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
