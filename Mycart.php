<?php

include('php/session.php');
$email = $_SESSION['user'];
$total = 0.00;
$sql_sort = "";

$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$user_id = $data['user_id'];
$user_rank = $data['user_rank'];

$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
$cart_id = $data['cart_id'];

if(isset($_GET['sort']) && !empty($_GET['sort'])){
  $link_sort = "sort=".$_GET['sort'];
  if($_GET['sort']=="qasc"){
    $sql_sort = " ORDER BY `cart_item`.`cart_item_quantity` ASC";
  }
  if($_GET['sort']=="qdesc"){
    $sql_sort = " ORDER BY `cart_item`.`cart_item_quantity` DESC";
  }
}

$sql_cart_item = "SELECT * FROM cart_item WHERE cart_id = '$cart_id'".$sql_sort;
$query_cart_item = mysqli_query($link, $sql_cart_item);
$count = mysqli_num_rows($query_cart_item);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="Mycart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Inner-Co Official Website</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Maxim - v2.3.0
  * Template URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

   <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php">Inner-CO.</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.jpg" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php"><i class="icofont-home"></i>Home</a></li>
          <li><a href="Product.php"><i class="icofont-shopping-cart"></i>Product</a></li>
          <li><a href="FAQ.php"><i class="icofont-support-faq"></i>FAQ</a></li>
          <li><a href="Aboutus.php"><i class="icofont-company"></i>About Us</a></li>
          <li><a href="Contactus.php"><i class="icofont-ui-contact-list"></i>Contact us</a></li>
          <li class="active"><a href="Mycart.php"><i class="icofont-wallet"></i></i>My cart</a></li>
          <li class="drop-down"><a href="Myaccount.php"><i class="icofont-user-alt-4"></i>My account</a>
             <ul>
                <?php if (isset($_SESSION['user'])){?>
                  <li><a href="Myaccount.php?logout">Sign Out</a></li>
                  <?php if($user_rank > 1){?>
                  <li><a href="sales.php">Sales Report</a></li>
                  <?php
                    }
                  }
                  else{?>
                  <li><a href="Myaccount.php?form=register">Create Account</a></li>
                  <li><a href="Myaccount.php">Sign In</a></li>
                  <?php }?>
              </ul>
          </li>
        </ul>

      </nav><!-- .nav-menu -->

    </div><br><br>
  </header><!-- End Header -->

  <!--Table for Shopping Cart-->
<section id="Purchase">
  <h3>Shopping Cart</h3>
<section class="mt-5">

<div class="text-right" style="margin-right: 9vw; margin-bottom:10px">
    <div class="dropdown">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
        Sort By
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="Mycart.php">Default</a>
        <a class="dropdown-item" href="Mycart.php?sort=qasc">Quantity: Ascending</a>
        <a class="dropdown-item" href="Mycart.php?sort=qdesc">Quantity: Descending</a>
      </div>
    </div>
</div>

<div class="container" text-align="center">
    <div class="table-responsive">
      <table class="table">
          <thead class="thead-dark">
             <tr>
                <th scope="col"class="text-white">Product</th>
                <th scope="col"class="text-white">Name</th>
                <th scope="col"class="text-white">Price</th>
                <th scope="col"class="text-white">Quantity</th>
                <th scope="col"class="text-white">Subtotal</th>
                <th scope="col"class="text-white"></th>
              </tr>
          </thead>
          <tbody>
            <?php if($count>0){
              while($data_cart_item = mysqli_fetch_assoc($query_cart_item)){
              $cart_item_id = $data_cart_item['cart_item_id'];
              $product_id = $data_cart_item['product_id'];
              $quantity = $data_cart_item['cart_item_quantity'];
              $price = $data_cart_item['cart_item_price'];
              $total = $total + $price;

              $sql_product = "SELECT * FROM product WHERE product_id = '$product_id'";
              $query_product = mysqli_query($link,$sql_product);
              $data_product = mysqli_fetch_assoc($query_product);
              $product_name = $data_product['product_name'];
              $product_price = $data_product['product_price'];
              $product_image = $data_product['product_image'];
              $product_description = $data_product['product_description'];
              ?>
            <tr>
                <td class= "product-remove">
                  <a href=""></a>
                    <div class="main">   <!--Add to cart Product-->
                      <div class="d-flex">
                         <img src="<?php echo $product_image;?>" width="200px" alt="claymask">
                      </div>
                    </div>
                </td>
                <td>
                  <h6><?php echo $product_name;?></h6>
                </td>
                <td>
                  <h6><?php echo $product_price;?></h6>
                </td>
                <td>
                  <div class="counter">
                    <input class="input-number" type="number" value="<?php echo $quantity;?>" min="1" max="100" onchange="update_item(<?php echo $cart_item_id; ?>,this.value)">
                  </div>
                </td>
                <td>
                  <h6 id="<?php echo $cart_item_id;?>"><?php echo $price;?></h6>
                </td>
                <td>
                  <div class="mbr-section-btn">
                    <a href="/remove_cart_item.php?cart_item_id=<?php echo $cart_item_id;?>" class="btn btn-danger display-4">Remove</a>
                  </div>
                </td>
            </tr>
            <?php }}
            else{?>
            <tr>
              <td><h6>Your Cart is Empty</h6></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
    </div>
</div>
</section>
</section>

<section id="Checkout">
<div class="col-lg-4 offset-lg-4">
  <div class="total">
    <ul>
      <li class="cart_totals">Total: <span id="total">RM<?php echo number_format((float)$total, 2, '.', '');?></span></li>
    </ul>
    <a href="/checkout.php"class="proceed-btn">Proceed to Checkout</a>
  </div>
</div>

</section>
  <!--End of Shopping Cart-->

  <!--Start Footer-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-5">
            <div class="footer-info">
              <h3><Inner-CO></h3>
              <p>
                Faculty of Cognitive Science and Human Development. <br>
                Universiti Malaysia Sarawak (UNIMAS) <br>
                94300 Kota Samarahan. Sarawak, Malaysia.<br>
                <strong>Phone:</strong> +60 128837192<br>
                <strong>Email:</strong> 65536@siswa.unimas.my<br>
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="Product.php">Product</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="FAQ.php">FAQ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="Aboutus.php">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="ContactUs.php">Contact Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="Mycart.php">My Cart</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="Myaccount.php">My Account</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="ContactUs.php">Skincare Consultant</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="ContactUs.php">Product recomendation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="FAQ.php">Help and Inquires</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4><i class="icofont-web"></i></i>Link to individual website</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://beaverly.github.io/">Beaverly(65536)</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="Aboutus.php">Ezzaty(65933)</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://hidayahzain.github.io/">Hidayah(66119)</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://nurnadhirah67186.github.io/nadhirah.github.io/">Nadhirah(67186)</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="Aboutus.php">Amir(68440)</a></li>

            </ul>
          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Inner-CO</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">Inner-CO Team</a>
      </div>
    </div>
  </footer>
  <!--End Footer-->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
  function update_item(id,qty){
			$.ajax({
				url: "update_item.php",
				type: "POST",
				data: {
					"cart_item_id":id,
					"qty":qty
					},
				success: function (data) {
					new_price = JSON.parse(data);
					html = new_price[0].toFixed(2);
          html2 = new_price[1].toFixed(2);
          cur = 'RM';
					$("#"+id).php(html);
          $("#total").php(cur+html2);
        }
			});
		};
  </script>

</body>

</html>

