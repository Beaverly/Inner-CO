<?php
include('php/session.php');
$email = $_SESSION['user'];

$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$user_rank = $data['user_rank'];

if($user_rank<3){
    header("Location: /product.php");
}

if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $sql = "DELETE FROM `product` WHERE `product_id` = '$product_id'";
    $link->query($sql);
    header("location: /product.php");
}
else{
    header("Location: /product.php");
}

?>