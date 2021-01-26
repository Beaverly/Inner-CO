<?php
include('php/session.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_SESSION['user'];
$product_id = $_POST['product_id'];
$qty = $_POST['quantity'];

$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$user_id = $data['user_id'];

$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$cart_id = $data['cart_id'];

$sql = "SELECT * FROM product WHERE product_id = '$product_id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$product_price = $data['product_price'];

$price = $product_price * $qty;

$sql = "INSERT INTO `cart_item`(`cart_id`, `product_id`, `cart_item_quantity`, `cart_item_price`) VALUES ('$cart_id','$product_id','$qty','$price')";
$link->query($sql);
header("location:Mycart.php");
}
?>