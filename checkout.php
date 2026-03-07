<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
echo "<h2>Your cart is empty</h2>";
exit;
}

$total = 0;
foreach($_SESSION['cart'] as $item){
$total += $item['price'] * $item['qty'];
}

/* PLACE ORDER */
if(isset($_POST['place_order'])){

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

/* insert order */
mysqli_query($conn,"INSERT INTO orders(user_id,total,status) VALUES (0,'$total','Placed')");

$order_id = mysqli_insert_id($conn);

/* insert order items */
foreach($_SESSION['cart'] as $item){

$pizza_id = $item['id'];
$qty = $item['qty'];

mysqli_query($conn,"INSERT INTO order_items(order_id,pizza_id,quantity)
VALUES('$order_id','$pizza_id','$qty')");

}

/* clear cart */
unset($_SESSION['cart']);

echo "
<section class='order-success'>
<h2>🎉 Order Placed Successfully!</h2>
<p>Your Order ID: <strong>#".$order_id."</strong></p>
<p>Your pizza will arrive in about 30 minutes 🍕</p>

<a href='index.php' class='btn'>Go to Home</a>
</section>
";

exit;

}
?>

<section class="checkout-section">

<h2>Checkout</h2>

<div class="checkout-container">

<div class="order-summary">

<h3>Order Summary</h3>

<?php
foreach($_SESSION['cart'] as $item){

$subtotal = $item['price'] * $item['qty'];

echo "<p>".$item['name']." x ".$item['qty']." = ₹".$subtotal."</p>";

}
?>

<h3 class="checkout-total">Total: ₹<?php echo $total; ?></h3>

</div>


<form method="POST" class="checkout-form">

<h3>Delivery Details</h3>

<input type="text" name="name" placeholder="Your Name" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<textarea name="address" placeholder="Delivery Address" required></textarea>

<button type="submit" name="place_order" class="btn">
Place Order
</button>

</form>

</div>

</section>

<?php include 'includes/footer.php'; ?>