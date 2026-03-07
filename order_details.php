<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit();
}

if(!isset($_GET['id'])){
echo "Invalid Order";
exit();
}

$order_id = $_GET['id'];

/* get order */
$order = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM orders WHERE id='$order_id'"
));

/* get ordered pizzas */
$result = mysqli_query($conn,
"SELECT pizzas.name, pizzas.price, pizzas.image, order_items.quantity
FROM order_items
JOIN pizzas ON pizzas.id = order_items.pizza_id
WHERE order_items.order_id='$order_id'"
);
?>

<section class="orders-section">

<h2>Order #<?php echo $order['id']; ?></h2>

<div class="orders-container">

<?php
$total = 0;

while($row = mysqli_fetch_assoc($result)){

$subtotal = $row['price'] * $row['quantity'];
$total += $subtotal;
?>

<div class="order-card order-item">

<img src="images/<?php echo $row['image']; ?>" class="order-img">

<div class="order-info">

<h3><?php echo $row['name']; ?></h3>

<p>Price: ₹<?php echo $row['price']; ?></p>

<p>Quantity: <?php echo $row['quantity']; ?></p>

<p>Subtotal: ₹<?php echo $subtotal; ?></p>

</div>

</div>

<?php } ?>

<h3>Total: ₹<?php echo $total; ?></h3>

<p>Status: <?php echo $order['status']; ?></p>

</div>

</section>

<?php include 'includes/footer.php'; ?>