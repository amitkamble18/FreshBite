<?php
include 'includes/db.php';

mysqli_query($conn,"
CREATE TABLE IF NOT EXISTS contact_messages(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
message TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
");

if(isset($_POST['send'])){

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

mysqli_query($conn,"INSERT INTO contact_messages(name,email,message)
VALUES('$name','$email','$message')");

echo "<script>alert('Message sent successfully');</script>";
}
?>
<?php include 'includes/header.php'; ?>

<section class="contact-section">

<h2>Contact Us 📞</h2>

<div class="contact-container">

<div class="contact-info">

<h3>Get in Touch</h3>

<p>📍 Latur, Maharashtra</p>
<p>📞 +91 98765 43210</p>
<p>✉ freshbite@gmail.com</p>

<p>We'd love to hear from you!  
Send us a message and our team will respond as soon as possible.</p>

</div>


<div class="contact-form">

<form method="POST">

<input type="text" name="name" placeholder="Your Name" required>

<input type="email" name="email" placeholder="Your Email" required>

<textarea name="message" placeholder="Your Message" rows="5" required></textarea>

<button type="submit" name="send">Send Message</button>

</form>

</div>

</div>

</section>

<?php include 'includes/footer.php'; ?>