<?php

require_once "php/config.php";
session_start();

if(isset($_SESSION['user'])){
  $email = $_SESSION['user'];
  $sql = "SELECT * FROM users WHERE user_email = '$email'";
  $result = mysqli_query($link, $sql);
  $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $user_rank = $data['user_rank'];
}

$err = "";

if (!empty($_SESSION ['user'])){
	header("location: /index.php");
}

if (isset($_GET['form']) && $_GET['form'] == "register"){
  $style_login = 'style="display:none;"';
  $style_register = 'style="display:block;"';
}
else{
  $style_login = 'style="display:block;"';
  $style_register = 'style="display:none;"';
}

if (isset($_GET['err'])){
  $error = $_GET['err'];
  if($error == 1){
    $regerr = '<div class="alert alert-warning" role="alert">Field cannot be empty</div>';
  }
  if($error == 2){
    $regerr = '<div class="alert alert-warning" role="alert">Re-type Password Wrong</div>';
  }
  if($error == 3){
    $regerr = '<div class="alert alert-warning" role="alert">Account Already Exist! Please Sign In.</div>';
  }
}
else{
  $regerr = '';
}
if (isset($_GET['logout'])){
  session_destroy();
  header("Location: /Myaccount.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if($_POST['submit'] == 'register') {
    $name = $_POST['reg_name'];
    $email = $_POST['reg_email'];
    $pass = $_POST['reg_pass'];
    $pass2 = $_POST['reg_pass2'];
    
    if($name == ""){
      $error = '1';
      header("Location: /Myaccount.php?form=register&err=".$error);
    }
    if($email == ""){
      $error = '1';
      header("Location: /Myaccount.php?form=register&err=".$error);
    }
    if($pass == ""){
      $error = '1';
      header("Location: /Myaccount.php?form=register&err=".$error);
    }
    if($pass2 == ""){
      $error = '1';
      header("Location: /Myaccount.php?form=register&err=".$error);
    }
    if($pass != $pass2){
      $error = '2';
      header("Location: /Myaccount.php?form=register&err=".$error);
    }
    if(empty($error)){
      $sql_user = "SELECT * FROM users WHERE user_email = '$email'";
      $query_users = mysqli_query($link, $sql_user);
      $count = mysqli_num_rows($query_users);
      if ($count == 0){
        $sql = "INSERT INTO `users`(`user_name`, `user_password`, `user_email`) VALUES ('$name','$pass','$email')";
        $link->query($sql);
        $_SESSION['user'] = $email;

        $sql_users = "SELECT * FROM users WHERE user_email = '$email'";
        $query_users = mysqli_query($link, $sql_users);
        $data_users = mysqli_fetch_assoc($query_users);
        $user_id = $data_users['user_id'];
      
        $sql = "INSERT INTO `cart`( `user_id`) VALUES ('$user_id')";
        $link->query($sql);
        header("Location: /index.php");
      }
      else{
        $error = '3';
        header("Location: /Myaccount.php?form=register&err=".$error);
      }
    }
  }
  else
  {
    $email = $_POST['login_email'];
    $pass = $_POST['login_pass'];
    if($email == ""){
      $err = '<div class="alert alert-warning" role="alert">Field cannot be empty</div>';
    }
    if($pass == ""){
      $err = '<div class="alert alert-warning" role="alert">Field cannot be empty</div>';
    }
    if(empty($err)){
      $sql_user = "SELECT * FROM users WHERE user_email = '$email'";
      $query_users = mysqli_query($link, $sql_user);
      $count = mysqli_num_rows($query_users);
      $data_users = mysqli_fetch_assoc($query_users);
      if ($count != 0){
        $data_pass = $data_users['user_password'];
        if ($pass == $data_pass){
          $_SESSION['user'] = $email;
          
          $sql_users = "SELECT * FROM users WHERE user_email = '$email'";
          $query_users = mysqli_query($link, $sql_users);
          $data_users = mysqli_fetch_assoc($query_users);
          $user_id = $data_users['user_id'];
        
          $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
          $result = mysqli_query($link, $sql);
          $count = mysqli_num_rows($result);
          if ($count != 1){
            $sql = "INSERT INTO `cart`( `user_id`) VALUES ('$user_id')";
            $link->query($sql);
            header("Location: /index.php");
          }
          else{
            header("Location: /index.php");
          }
        }
        else{
          $err = "err";
        }
      }
      else {
        $err = '<div class="alert alert-warning" role="alert">Wrong email or Password</div>';
      }
    }
  }
}
?>
<!doctype html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>My Account</title>
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
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="myAccount.css">

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
          <li><a href="Mycart.php"><i class="icofont-wallet"></i></i>My cart</a></li>
          <li class="active drop-down"><a href="Myaccount.php"><i class="icofont-user-alt-4"></i>My account</a>
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

  <section class="box">
  <h1>My Account</h1>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="login" id="login" method="post" <?php echo $style_login;?>>
        <?php echo $err;?> 
        <span>Email Address</span>
        <br>
        <input type="email" name="login_email" required="required">
        <br>
        <span>Password</span>
        <br>
        <input type="password" name="login_pass" required="required">
        <br>
        <input type="submit" class="button" value="Sign In">
        <br>
        <p><a href="#" onclick="toggle()"> Create An Account?</a></p>
      </form>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="reg" id="register" method="post" <?php echo $style_register;?>>
        <?php echo $regerr;?> 
        <span>Full Name</span>
        <br>
        <input type="text" id="" name="reg_name" required="required">
        <br>
        <span>Email Address</span>
        <br>
        <input type="email" id="" name="reg_email" required="required">
        <br>
        <span>Password</span>
        <br>
        <input type="password" name="reg_pass" required="required">
        <br>
        <span>Re-type Password</span>
        <br>
        <input type="password"  name="reg_pass2" required="required">
        <br>
        <button name="submit" type="submit" value="register" class="button">Register</button>
        <br>
        <p><a href="#" onclick="toggle()"> Already Registered?</a></p>
     </form>
  </section>

   <!-- ======= Footer ======= -->
 <!-- ======= Footer ======= -->
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

	<script  type="text/javascript">
    function toggle() {
      var x = document.getElementById("login");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
      var y = document.getElementById("register");
      if (y.style.display === "none") {
        y.style.display = "block";
      } else {
        y.style.display = "none";
      }
    }
    </script>

</body>

</html>