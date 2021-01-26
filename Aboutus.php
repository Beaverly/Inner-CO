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
          <li class="active"><a href="Aboutus.php"><i class="icofont-company"></i>About Us</a></li>
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

 <!-- ======= Team Section ======= -->
 <section id="team" class="team">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Inner-CO team consists of the main director of our company that hold different portfolio.  </p>
      </div>

      <div class="row">

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
          <div class="member">
            <img src="assets/img/team/Beaverly's Pic.jpg" class="img-fluid" alt="Beaverly's Picture">
            <div class="member-info">
              <div class="member-info-content">
                <h4>Beaverly Sin Swee Yan</h4>
                <span>Chief Executive Officer</span>
              </div>
              <div class="social">
                <a href="https://www.facebook.com/beaverly.sin"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/beav_erly/"><i class="icofont-instagram"></i></a>
                <a href="https://www.linkedin.com/in/beaverly-sin-b0aa58127"><i class="icofont-linkedin"></i></a>
                <a href="https://beaverly.github.io/"><i class="icofont-web"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" style="height: 380px; object-fit: cover;">
          <div class="member">
            <img src="assets/img/team/Nadhirah's Pic.jpg" class="img-fluid" alt="Nadhirah's Picture">
            <div class="member-info">
              <div class="member-info-content">
                <h4>Nur Nadhirah Izzati Bt Zaharuddin</h4>
                <span>Product Manager</span>
              </div>
              <div class="social">
                <a href="https://twitter.com/_nurndhrh"><i class="icofont-twitter"></i></a>
                <a href="https://www.instagram.com/nddynddyrh_/"><i class="icofont-instagram"></i></a>
                <a href="https://nurnadhirah67186.github.io/nadhirah.github.io/"><i class="icofont-web"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="member">
            <img src="assets/img/team/Ezzaty's Pic.jpg" class="img-fluid" alt="Ezzaty's Picture">
            <div class="member-info">
              <div class="member-info-content">
                <h4>Ezzaty Nur Amirah Exanullah</h4>
                <span>CTO</span>
              </div>
              <div class="social">
                <a href="https://twitter.com/zztyxnllh"><i class="icofont-twitter"></i></a>
                <a href="https://www.facebook.com/ezzatynur.amirah/"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/ezzatyexanullah/"><i class="icofont-instagram"></i></a>
                <a href=""><i class="icofont-web"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/team/Hidayah's Pic.jpg" class="img-fluid" alt="Hidayah's Picture">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Hidayah Bt Mohd Zain</h4>
                  <span>Sales Manager</span>
                </div>
                <div class="social">
                  <a href="https://twitter.com/hidazain_"><i class="icofont-twitter"></i></a>
                  <a href="https://www.facebook.com/hidayah.zain.9"><i class="icofont-facebook"></i></a>
                  <a href="https://www.instagram.com/dyyo_/"><i class="icofont-instagram"></i></a>
                  <a href="https://hidayahzain.github.io/"><i class="icofont-web"></i></a>
                </div>
              </div>
            </div>
          </div>

        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <img src="assets/img/team/Amir's Pic.jpg" class="img-fluid" alt="Amir's Picture">
            <div class="member-info">
              <div class="member-info-content">
                <h4>Abg Amir bin Habidi</h4>
                <span>Accountant</span>
              </div>
              <div class="social">
                <a href="https://twitter.com/Amir8908"><i class="icofont-twitter"></i></a>
                <a href="https://www.facebook.com/rensuzugamori.rensuzugamori"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/ibuki99jr/"><i class="icofont-instagram"></i></a>
                <a href=""><i class="icofont-web"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Team Section -->

 <!-- ======= Features Section ======= -->
 <section id="features" class="features">
    <div class="container">

      <div class="row">
        <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-right">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-toggle="tab" href="#tab-1">
                <h4>Inner-CO's Profile</h4>
                <p>A trustworthy e-business platforn with 100% authentic products and brands</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-toggle="tab" href="#tab-2">
                <h4>Company's MOTO</h4>
                <p>Advancing Lives and the Delivery of Beauty.</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-toggle="tab" href="#tab-3">
                <h4>VISION</h4>
                <p>By ceaselessly discovering high-quality, natural, innovative skincare products that are friendly to the user and environment.  We want to to break into new markets within and beyond Malaysian's market by giving consultation and provide recommendation of most suitable skincare to all users.  We also emphasis on providing high quality services and professional beauty consultant.</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-toggle="tab" href="#tab-4">
                <h4>MISSION</h4>
                <p>As the leading Inner-CO establishment we have consistently met the desires, needs and expectations of end and professional users with high-quality skincare products and services for more than 30 years. We build and maintain partner relationships with our consumers as well as all other stakeholders based on trust and reciprocity. We strive for a pleasant working environment and do our best to contribute to the welfare or our local, as well as, the broader community.  Our company's main mission is to connect the to the world through our website and be a well-known skincare e-business platform.</p>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-7 ml-auto" data-aos="fade-left">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <figure>
                <img src="assets/img/features-1.png" alt="Company statistic" class="img-fluid">
              </figure>
            </div>
            <div class="tab-pane" id="tab-2">
              <figure>
                <img src="assets/img/features-2.png" alt="Beauty" class="img-fluid" style="width: 80%; height: auto">             
              </figure>
            </div>
            <div class="tab-pane" id="tab-3">
              <figure>
                <img src="assets/img/features-3.png" alt="" class="img-fluid" style="width: 80%; height: auto">
              </figure>
            </div>
            <div class="tab-pane" id="tab-4">
              <figure>
                <img src="assets/img/features-4.png" alt="" class="img-fluid" style="width: 80%; height: auto">
              </figure>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Features Section -->

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

</body>

</html>