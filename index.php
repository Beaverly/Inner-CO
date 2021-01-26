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
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- =======================================================
  * Template Name: Maxim - v2.3.0
  * Template URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .search-input input{
      height: 55px;
      width: 100%;
      outline: none;
      border: none;
      border-radius: 5px;
      padding: 0 60px 0 20px;
      font-size: 18px;
      box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
    }

    .search-input.active input{
      border-radius: 5px 5px 0 0;
    }

    .search-input .autocom-box{
      padding: 0;
      opacity: 0;
      pointer-events: none;
      max-height: 280px;
      overflow-y: auto;
    }

    .search-input.active .autocom-box{
      padding: 10px 8px;
      opacity: 1;
      pointer-events: auto;
      background: #fff;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;
    }

    .autocom-box li{
      list-style: none;
      padding: 8px 12px;
      display: block;
      width: 100%;
      cursor: default;
      border-radius: 3px;
    }

    .search-input.active .autocom-box li{
      display: block;
    }
    .autocom-box li:hover{
      background: #efefef;
    }

    .search-input .icon{
      position: absolute;
      right: 25px;
      top: 60px;
      height: 55px;
      width: 55px;
      text-align: center;
      line-height: 55px;
      font-size: 20px;
      color: #ffc107;
      cursor: pointer;
    }
  </style>
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
          <li class="active"><a href="index.php"><i class="icofont-home"></i>Home</a></li>
          <li><a href="Product.php"><i class="icofont-shopping-cart"></i>Product</a></li>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Welcome to Inner-Co</h1>
      <h2>This is our business portal for branded skincare products.</h2>
      <a href="Product.php" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!--=====Search section=====-->
    <section id="Search">
    
    <div class="bg-basic">
      <div class="container">
        <div class="row mt-4">
          <div class="col-md-10 mx-auto bg-warning rounded p-4">
            <h5 class="text-center font-weight-bold">Product's Keyword Search</h5>
            <hr class="my-1">
            <div class="search-input" id="search"> <!--active-->
              <a href="" target="_blank" hidden></a>
              <input type="text" id="search-box" onkeyup="showMe(this)" placeholder="Type to search.." autocomplete="off">
              <div class="autocom-box" id="show-list">
                <!-- <li><a href="#">test</a></li> -->
                <!-- here list are inserted from javascript -->
              </div>
              <div class="icon"><i class="fas fa-search"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  
  </section>

  <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>To access to our services, feel free to slide into "Contact Us" and we will get back to you on working hours (6a.m.-6p.m.) every weekdays.</p>
          <p> Note: Appointment is based on First Come, First Serve basis.</p>
        </div>

        <div class="row justify-content-md-center">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 " data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Skincare Consultant</a></h4>
              <p class="description">We provide skincare consultant services through online or users can also visit our headquarters at Kota Samarahan, Kuching, Sarawak.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Product Recommendation</a></h4>
              <p class="description">Currently, we have 3 branded skincare products consist of Innistfree, Simple and Hadalabo.  Users can shop for this products or make appointment with our beauty consultant and they will recommend suitable products based on user's need.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Help &amp; Inquiries</a></h4>
              <p class="description">Any help inquiries regarding products, payment or services can contact us on working hours. </p>
              <h5>Business hours:</h5>
              <ul>
                  <li>Monday to Friday</li>
                  <li>6.00 a.m.-6.00p.m.</li>
                  <li>Not available on public holidays</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Testimonials</h2>
          <p>This are some feedbacks from our beloved customer. We will update it from time to time!</p>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="fade-up">


          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              "This is website is what users need nowadays, simple yet informative with responsive function. Definitely gonna suggest it to my older workmates. By the way, the product is awesome!"
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Web Designer &amp; Customer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              "I have tried the consultant services before purchasing my products.  What I can say is, U will never regret it because they are so professional and talented.""
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Customer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              "Man also need skincare and since it is not our expertise in shopping products, somehow being here is more privateand I can all my sweet time in shopping. Plus, the brand is authentic."
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Customer</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              "I like how this website is so user friendly and shopping my skincare has become a habit."
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->


  </main><!-- End #main -->

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

  <script>
    function showMe(e) {
      var element = document.getElementById("search");
      let searchText = e.value;
      if (searchText != "") {
        $.ajax({
          url: "search.php",
          method: "post",
          data: {
            query: searchText,
          },
          success: function (response) {
            element.classList.add("active");
            $("#show-list").php(response);
          },
        });
      }
      else{
        element.classList.remove("active");
        $("#show-list").php("");
      }
    }
  </script>

</body>

</html>