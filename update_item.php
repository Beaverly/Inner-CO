<?php
include('php/session.php');
$email = $_SESSION['user'];
$cart_item_id = $_POST['cart_item_id'];
$qty = $_POST['qty'];
$total = 0;

$sql = "SELECT * FROM `cart_item` WHERE `cart_item_id` = '$cart_item_id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$product_id = $data['product_id'];

$sql = "SELECT * FROM product WHERE product_id = '$product_id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$price = $data['product_price'] * $qty;

$sql = "UPDATE `cart_item` SET `cart_item_quantity` = '$qty', `cart_item_price` = '$price' WHERE `cart_item_id` = '$cart_item_id';";
$link->query($sql);

$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$user_id = $data['user_id'];

$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$cart_id = $data['cart_id'];

$sql = "SELECT * FROM cart_item WHERE cart_id = '$cart_id'";
$query = mysqli_query($link, $sql);
while($data = mysqli_fetch_assoc($query)){
$item_price = $data['cart_item_price'];
$total = $total + $item_price;
}

$array = array($price,$total);
echo json_encode($array);
?>