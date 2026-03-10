<?php include 'includes/header.php'; ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<!-- HERO SECTION -->
<section class="hero">

<div class="hero-content">
<h1>FreshBite 🍕</h1>

<p>
Welcome to FreshBite – your go-to place for ordering delicious pizzas online.
Browse a wide variety of mouth-watering pizzas, choose your favorites,
and place your order in just a few clicks.
</p>

<a href="menu.php" class="btn">Order Now</a>

</div>

</section>


<!-- POPULAR PIZZAS -->
<section class="popular">

<h2>Popular Pizzas 🍕</h2>

<div class="pizza-container">

<!-- PIZZA 1 -->
<div class="pizza-card">

<form action="cart.php" method="POST">

<img src="images/margherita.jpg">

<h3>Margherita</h3>
<p>Classic delight with cheese and tomato</p>

<span>₹199</span>

<input type="hidden" name="name" value="Margherita">
<input type="hidden" name="price" value="199">
<input type="hidden" name="image" value="margherita.jpg">

<button type="submit" name="add_to_cart">Add to Cart</button>

</form>

</div>


<!-- PIZZA 2 -->
<div class="pizza-card">

<form action="cart.php" method="POST">

<img src="images/mexican.jpg">

<h3>Peppy Paneer</h3>
<p>Topped with zesty enchilada sauce</p>

<span>₹249</span>

<input type="hidden" name="name" value="Peppy Paneer">
<input type="hidden" name="price" value="249">
<input type="hidden" name="image" value="mexican.jpg">

<button type="submit" name="add_to_cart">Add to Cart</button>

</form>

</div>


<!-- PIZZA 3 -->
<div class="pizza-card">

<form action="cart.php" method="POST">

<img src="images/farmhouse.jpg">

<h3>Farmhouse</h3>
<p>Veggies loaded pizza</p>

<span>₹299</span>

<input type="hidden" name="name" value="Farmhouse">
<input type="hidden" name="price" value="299">
<input type="hidden" name="image" value="farmhouse.jpg">

<button type="submit" name="add_to_cart">Add to Cart</button>

</form>

</div>

</div>

</section>


<!-- WHY CHOOSE FRESHBITE -->
<section class="features">

<h2>Why Choose FreshBite?</h2>

<div class="features-container">

<div class="feature">
<h3>🔥 Fresh Ingredients</h3>
<p>We use only fresh vegetables and premium cheese.</p>
</div>

<div class="feature">
<h3>⚡ Fast Delivery</h3>
<p>Your pizza delivered hot and fresh in minutes.</p>
</div>

<div class="feature">
<h3>🍕 Wide Variety</h3>
<p>Choose from veg, non-veg and special pizzas.</p>
</div>

</div>

</section>


<!-- SPECIAL OFFER -->
<section class="offer">

<h2>🔥 Today's Special Offer</h2>
<p>Get 20% OFF on all large pizzas!</p>

<a href="menu.php" class="btn">Order Now</a>

</section>


<!-- CUSTOMER REVIEWS -->
<section class="reviews">

<h2>What Our Customers Say</h2>

<div class="review-container">

<div class="review">
<p>"Best pizza I have ever ordered online!"</p>
<h4>- Virat</h4>
</div>

<div class="review">
<p>"Fast delivery and amazing taste."</p>
<h4>- Yogita</h4>
</div>

<div class="review">
<p>"My go-to place for pizza!"</p>
<h4>- Amit</h4>
</div>

</div>

</section>

<?php include 'includes/footer.php'; ?>