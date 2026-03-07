<?php
session_start();
include '../includes/db.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM pizzas WHERE id='$id'");

header("Location: pizzas.php");