<?php
  require_once "php/config.php";

  if (isset($_POST['query'])) {
    $word = '%'.$_POST['query'].'%';
    $sql = "SELECT * FROM product WHERE product_name LIKE '$word'";
    $query = mysqli_query($link, $sql);
    $count = mysqli_num_rows($query);

    if ($count>0) {
        while($data = mysqli_fetch_assoc($query)){
        echo '<li><a href="Product_Detail.php?product_id='. $data['product_id'] .'" style="color:#000">' . $data['product_name'] . '</a></li>';
      }
    } else {
      echo '<li>No Record</li>';
    }
  }
?>