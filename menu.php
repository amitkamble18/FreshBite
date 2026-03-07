<?php if(isset($added) && $added){ ?>
<div class="cart-success">
✅ Item added to cart
</div>
<?php } ?>
<?php
session_start();
include 'includes/db.php';
$added = false;

if(isset($_POST['add_to_cart'])){
    $added = true;
}

if(isset($_POST['add_to_cart'])){

$pizza_id = $_POST['pizza_id'];
$qty = $_POST['quantity'];

$result = mysqli_query($conn,"SELECT * FROM pizzas WHERE id='$pizza_id'");
$pizza = mysqli_fetch_assoc($result);

if(!isset($_SESSION['cart'])){
$_SESSION['cart'] = [];
}

$found = false;

foreach($_SESSION['cart'] as $key => $item){

if($_SESSION['cart'][$key]['id'] == $pizza_id){

$_SESSION['cart'][$key]['qty'] += $qty;
$found = true;
break;

}

}

if(!$found){

$item = [
"id"=>$pizza['id'],
"name"=>$pizza['name'],
"price"=>$pizza['price'],
"image"=>$pizza['image'],
"qty"=>$qty
];

$_SESSION['cart'][] = $item;

}

}
?>
<?php include 'includes/header.php'; ?>

<section class="menu-section">

<h2>Our Menu 🍕</h2>

<div class="pizza-container">

<?php
include 'includes/db.php';

$result = mysqli_query($conn,"SELECT * FROM pizzas");

while($row = mysqli_fetch_assoc($result)){
?>

<div class="pizza-card">

<img src="images/<?php echo $row['image']; ?>">

<h3><?php echo $row['name']; ?></h3>

<p class="price">₹<?php echo $row['price']; ?></p>

<form method="POST">

<input type="hidden" name="pizza_id" value="<?php echo $row['id']; ?>">

<input type="number" name="quantity" value="1" min="1">

<button type="submit" name="add_to_cart" value="<?php echo $row['id']; ?>">
Add to Cart
</button>

</form>
</div>

<?php } ?>

</div>

</section>

<?php include 'includes/footer.php'; ?>