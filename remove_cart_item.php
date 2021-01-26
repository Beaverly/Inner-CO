<?php
include('php/session.php');
$cart_item_id = $_GET['cart_item_id'];	

$sql = "DELETE FROM `cart_item` WHERE `cart_item_id` = '$cart_item_id'";
$link->query($sql);
header("location: /Mycart.php");
?>