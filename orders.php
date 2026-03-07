<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,"SELECT * FROM orders WHERE user_id='$user_id' ORDER BY id DESC");
?>

<section class="orders-section">

<h2>My Orders 📦</h2>

<div class="orders-container">

<?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){
?>

<div class="order-card">

<h3>Order #<?php echo $row['id']; ?></h3>

<a href="order_details.php?id=<?php echo $row['id']; ?>" class="view-btn">
View Details
</a>

<p>Total: ₹<?php echo $row['total']; ?></p>

<p>Status:
<span class="status-<?php echo strtolower($row['status']); ?>">
<?php echo $row['status']; ?>
</span>
</p>

<p>Date: <?php echo $row['created_at']; ?></p>

</div>

<?php
}

}else{

echo "<p>No orders yet.</p>";

}
?>

</div>

</section>

<?php include 'includes/footer.php'; ?>