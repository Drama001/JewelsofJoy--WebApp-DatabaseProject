<?php

	//include database information and user information
	require 'authentication.php';

	//never forget to start the session

	session_start();
	$id= $_SESSION['CustomerID'];
  $select_user = mysqli_query($conn, "SELECT * FROM CUSTOMER WHERE CustomerID = $id");
  $fetch_user = mysqli_fetch_assoc($select_user);

  $select_rows = mysqli_query($conn, "SELECT * FROM CART WHERE CustomerID = $id") or die('query failed');
  $row_count = mysqli_num_rows($select_rows);
?>


<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Jewels of Joy</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="main.php">
            <img src="images/logo.png" alt="">
            <span>
            Jewels of Joy
            </span>
          </a>
          <?php  echo'<div class="text-uppercase text-dark font-weight-bold" style="margin-left: 18rem;">Hello '.$fetch_user['FirstName'].'...!!</div>'; ?>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">

                <li class="nav-item active">
                  <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="jewellery.php">Jewellery </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="profile.php">View Profile </a>
                </li>
                
                <?php

             
               
                  if (isset($_SESSION['EmailID'])){
                  // User is already logged in, display a logout button
                  echo ' <li class="nav-item">
                  <a class="nav-link" href="logout.php" >Logout</a>
                  </li>';
                } else {
                  // User is not logged in, display a login button
                  echo '<li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                  </li>';
                }
                ?>
                
              </ul>

            </div>
            <div class="quote_btn-container ">
              <a href="cart.php">
                <img src="images/cart.png" alt="">
                <div class="cart_number">
                -
                </div>
              </a>
             
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="design-box">
        <img src="images/design-1.png" alt="">
      </div>
      <!-- <div class="slider_number-container d-none d-md-block">
        <div class="number-box">
          <span>
            01
          </span>
          <hr>
          <span class="jwel">
            J <br>
            e <br>
            w <br>
            e <br>
            l <br>
            l <br>
            e <br>
            r <br>
            y
          </span>
          <hr>
          <span>
            02
          </span>
        </div>
      </div> -->
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
          </ol> -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail_box">
                    <h2>
                      <span> New Collection</span>
                      <hr>
                    </h2>
                    <h1>
                      Jewellery
                    </h1>
                    <p>
                    Jewelry is decorative items made of precious metals and gemstones, often worn as accessories to enhance one's appearance or express personal style. They can come in various styles and designs, from simple and classic to elaborate and unique.
                    </p>
                    <div>
                      <a href="jewellery.php">Shop Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="slider image">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail_box">
                    <h2>
                      <span> New Collection</span>
                      <hr>
                    </h2>
                    <h1>
                      Jewellery
                    </h1>
                    <p>
                    Jewelry is decorative items made of precious metals and gemstones, often worn as accessories to enhance one's appearance or express personal style. They can come in various styles and designs, from simple and classic to elaborate and unique.
                    </p>
                    <div>
                      <a href="jewellery.php">Shop Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail_box">
                    <h2>
                      <span> New Collection</span>
                      <hr>
                    </h2>
                    <h1>
                      Jewellery
                    </h1>
                    <p>
                    Jewelry is decorative items made of precious metals and gemstones, often worn as accessories to enhance one's appearance or express personal style. They can come in various styles and designs, from simple and classic to elaborate and unique.
                    </p>
                    <div>
                      <a href="jewellery.php">Shop Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  

  <!-- price section -->

  <section class="price_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Jewellery Price
        </h2>
      </div>
      <div class="price_container">
        <div class="box">
          <div class="name">
            <h6>
              Diamond Ring
            </h6>
          </div>
          <div class="img-box">
            <img src="images/p-1.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              $<span>1000.00</span>
            </h5>
            <a href="jewellery.php">
              Buy Now
            </a>
          </div>
        </div>
        <div class="box">
          <div class="name">
            <h6>
              Diamond Ring
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-2.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              $<span>1000.00</span>
            </h5>
            <a href="jewellery.php">
              Buy Now
            </a>
          </div>
        </div>
        <div class="box">
          <div class="name">
            <h6>
              Diamond Ring
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-3.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              $<span>1000.00</span>
            </h5>
            <a href="jewellery.php">
              Buy Now
            </a>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <a href="jewellery.php" class="price_btn">
          See More
        </a>
      </div>
    </div>
  </section>

  <!-- end price section -->

  <!-- ring section -->

  <section class="ring_section layout_padding">
    <div class="design-box">
      <img src="images/design-1.png" alt="">
    </div>
    <div class="container">
      <div class="ring_container layout_padding2">
        <div class="row">
          <div class="col-md-5">
            <div class="detail-box">
              <h4>
                special
              </h4>
              <h2>
                Wedding Ring
              </h2>
              <a href="">
                Buy Now
              </a>
            </div>
          </div>
          <div class="col-md-7">
            <div class="img-box">
              <img src="images/ring-img.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end ring section -->

 

  <!-- contact section -->

  <!-- <section class="contact_section layout_padding">
    <div class="design-box">
      <img src="images/design-2.png" alt="">
    </div>
    <div class="container ">
      <div class="">
        <h2 class="">
          Contact Us
        </h2>
      </div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="">
            <div>
              <input type="text" placeholder="Name" />
            </div>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" placeholder="Phone" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="info_container">
        <div class="row">
          <div class="col-md-3">
            <div class="info_logo">
              <a href="">
                <img src="images/logo.png" alt="">
                <span>
                Jewels of Joy
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/location.png" alt="">
                <span>
                  Address
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/phone.png" alt="">
                <span>
                  +01 1234567890
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/mail.png" alt="">
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="info_form">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Newsletter
            </h5>
          </div>
          <form action="">
            <div class="email_box">
              <label for="email2">Enter Your Email</label>
              <input type="text" id="email2">
            </div>
            <div>
              <button>
                subscribe
              </button>
            </div>
          </form>
        </div>
        <div class="info_social">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Follow Us
            </h5>
          </div>
          <div class="social_box">
            <a href="">
              <img src="images/fb.png" alt="">
            </a>
            <a href="">
              <img src="images/twitter.png" alt="">
            </a>
            <a href="">
              <img src="images/linkedin.png" alt="">
            </a>
            <a href="">
              <img src="images/insta.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>