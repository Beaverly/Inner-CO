<?php
require_once "php/config.php";
session_start();
##initial value;
$sql_sort = $link_sort = "";
$sql_page = " Limit 5";
$current_page = "1";
$prev_page_link = "page=1";
$next_page_link = "page=2";

if(isset($_SESSION['user'])){
  $email = $_SESSION['user'];
  $sql = "SELECT * FROM users WHERE user_email = '$email'";
  $result = mysqli_query($link, $sql);
  $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $user_rank = $data['user_rank'];
}

if(isset($_GET['sort']) && !empty($_GET['sort'])){
  $link_sort = "sort=".$_GET['sort'];
  if($_GET['sort']=="aasc"){
    $sql_sort = " ORDER BY `product`.`product_name` ASC";
  }
  if($_GET['sort']=="pasc"){
    $sql_sort = " ORDER BY `product`.`product_price` ASC";
  }
  if($_GET['sort']=="pdesc"){
    $sql_sort = " ORDER BY `product`.`product_price` DESC";
  }
  if($_GET['sort']=="adesc"){
    $sql_sort = " ORDER BY `product`.`product_name` DESC";
  }
}
if(isset($_GET['page']) && !empty($_GET['page'])){
  $current_page = $_GET['page'];
  if($current_page != 1){
    $prev_page = $current_page - 1;
  }
  else{
    $prev_page = $current_page;
  }
  if($current_page != 4){
    $next_page = $current_page + 1;
  }
  else{
    $next_page = $current_page;
  }
  $prev_page_link = "page=".$prev_page;
  $next_page_link = "page=".$next_page;
  $offset = ($current_page - 1) * 5;
  $sql_page = " Limit 5 OFFSET ".$offset;
}
$sql_product = "SELECT * FROM product".$sql_sort.$sql_page;
$query_product = mysqli_query($link,$sql_product);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
  <style>
    .box{
      width: 80%;
      margin: 10vh auto;
    }
    .card{
      height: 100%;
    }
  </style>
</head>

<body onload="activepage()">

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
          <li class="active"><a href="Product.php"><i class="icofont-shopping-cart"></i>Product</a></li>
          <li><a href="FAQ.php"><i class="icofont-support-faq"></i>FAQ</a></li>
          <li><a href="Aboutus.php"><i class="icofont-company"></i>About Us</a></li>
          <li><a href="Contactus.php"><i class="icofont-ui-contact-list"></i>Contact us</a></li>
          <li><a href="Mycart.php"><i class="icofont-wallet"></i></i>My cart</a></li>
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

    </div>
  </header><!-- End Header -->


  <!--Product Grid-->
  <section class="box" id="Product Grid">
    <div class="text-right">
      <div class="dropdown dropleft">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          Sort By
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/product.php">Default</a>
          <a class="dropdown-item" href="/product.php?sort=aasc">Alphabetic: Ascending</a>
          <a class="dropdown-item" href="/product.php?sort=adesc">Alphabetic: Descending</a>
          <a class="dropdown-item" href="/product.php?sort=pasc">Price: Ascending</a>
          <a class="dropdown-item" href="/product.php?sort=pdesc">pricedesc: Descending</a>
        </div>
      </div>
      <?php if (isset($_SESSION['user'])&&$user_rank > 2){?>
      <br>
      <a href="/add_product.php" class="btn btn-primary">Add Product</a>
      <?php }?>
    </div>
    <br>
    <div class="row row-cols-md-5">
      <?php 
      while($data_product = mysqli_fetch_assoc($query_product)){
        $product_id = $data_product['product_id'];
        $product_name = $data_product['product_name'];
        $product_price = $data_product['product_price'];
        $product_image = $data_product['product_image'];
        ?>
      
        <div class="col mb-4" >
          <div class="card">
            <a href="Product_Detail.php?product_id=<?php echo $product_id;?>">
            <img class="card-img-top" src="<?php echo $product_image;?>" alt="Simple cleanser">
            </a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $product_name;?></h5>
              <p class="card-text"><?php echo $product_price;?></p>
              <?php if (isset($_SESSION['user'])&&$user_rank > 2){?>
              <br>
              <a href="/remove_product.php?product_id=<?php echo $product_id;?>" class="btn btn-danger">Remove Product</a>
              <?php }?>
            </div>
          </div>
        </div>
      
      <?php } ?>
    </div>
    <ul class="pagination justify-content-center">
    <li class="page-item" id="btn_back"><a class="page-link" href="/product.php?<?php echo $link_sort; if($link_sort != ""){echo "&";} echo $prev_page_link;?>">Previous</a></li>
    <li class="page-item" id="btn_page"><a class="page-link" href="/product.php?<?php echo $link_sort; if($link_sort != ""){echo "&";}?>page=1">1</a></li>
    <li class="page-item" id="btn_page"><a class="page-link" href="/product.php?<?php echo $link_sort; if($link_sort != ""){echo "&";}?>page=2">2</a></li>
    <li class="page-item" id="btn_page"><a class="page-link" href="/product.php?<?php echo $link_sort; if($link_sort != ""){echo "&";}?>page=3">3</a></li>
    <li class="page-item" id="btn_page"><a class="page-link" href="/product.php?<?php echo $link_sort; if($link_sort != ""){echo "&";}?>page=4">4</a></li>
    <li class="page-item" id="btn_next"><a class="page-link" href="/product.php?<?php echo $link_sort; if($link_sort != ""){echo "&";} echo $next_page_link;?>">Next</a></li>
    </ul>
  </section>

   <!-- ======= Footer ======= -->
   <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-8 offset-md-2">
            <div class="footer-info">
              <h3><Inner-CO></h3>
              <p>
                Faculty of Cognitive Science and Human Development. <br>
                Universiti Malaysia Sarawak (UNIMAS) <br>
                94300 Kota Samarahan. Sarawak, Malaysia.<br>
                <strong>Phone:</strong> +60 128837192<br>
                <strong>Email:</strong> 65536@siswa.unimas.my<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">FAQ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">My Cart</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">My Account</a></li>
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
  </footer><!-- End Footer -->

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
  function sort(){
    if(document.getElementById("sort").value == "alphabeticdesc"){
      window.location.replace("/product.php?sort=adesc");
    }
    if(document.getElementById("sort").value == "pricedesc"){
      window.location.replace("/product.php?sort=pdesc");
    }
    if(document.getElementById("sort").value == "priceasc"){
      window.location.replace("/product.php?sort=pasc");
    }
    if(document.getElementById("sort").value == "alphabeticasc"){
      window.location.replace("/product.php?sort=aasc");
    }

  }

  function activepage(){
    document.getElementsByClassName("page-item")[<?php echo $current_page;?>].classList.add("active");
    if (<?php echo $current_page;?> == 1){
      document.getElementsByClassName("page-item")[0].classList.add("disabled");
    }
    else{
      document.getElementsByClassName("page-item")[0].classList.remove("disabled");
    }
    
    if (<?php echo $current_page;?> == 4){
      document.getElementsByClassName("page-item")[5].classList.add("disabled");
    }
    else{
      document.getElementsByClassName("page-item")[5].classList.remove("disabled");
    }
  }

  </script>
</body>

</html>