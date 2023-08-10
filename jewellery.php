<?php 

  require 'authentication.php';

  session_start();

  $sql="SELECT * FROM PRODUCT WHERE category = 'Ring'";
  $ring_products = $conn->query($sql);

  $sql2="SELECT * FROM PRODUCT WHERE category = 'Bracelet'";
  $bracelet_products = $conn->query($sql2);

  $sql3="SELECT * FROM PRODUCT WHERE category = 'Earrings'";
  $earrings_products = $conn->query($sql3);

  $sql4="SELECT * FROM PRODUCT WHERE category = 'Wrist Watches'";
  $watch_products = $conn->query($sql4);

  $sql5="SELECT * FROM PRODUCT WHERE category = 'Accessories'";
  $accesory_products = $conn->query($sql5);

  if(isset($_POST['add_to_cart'])){
  
    $cust_id       = $_SESSION['CustomerID'];
    $product_id    = $_POST['product_id'];
    $product_name  = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM CART WHERE ProductName = '$product_name' AND CustomerID=$cust_id");
   
   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product added to cart succesfully';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO CART(ProductID, CustomerID, ProductName, ProductPrice, ProductImage, Quantity) VALUES($product_id, $cust_id,'$product_name', $product_price , '$product_image', $product_quantity)");
      $message[] = 'product added to cart succesfully';
   }
}
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

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message bg-success"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};
?>

<body class="sub_page">
  <div class="bg-warning">
    <!--Header -->
    <header class="header_section">
          <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
              <a class="navbar-brand" href="main.php">
                <img src="images/logo.png" alt="">
                <span>
                Jewels of Joy
                </span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                  <ul class="navbar-nav  ">
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
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
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
        <!--Header -->
  </div>

  <!--Sidebar-->
<div class="container-fluid">
    <div class="row flex-nowrap">

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2min-vh-100 mt-5">
                <h5 class="d-flex align-items-center pb-3 mb-md-0 me-md-autotext-decoration-none">
                    <span class="fs-5 d-none d-sm-inline text-black">Choose Category</span>
                </h5>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-dark">Bracelets</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline text-dark">Rings</span></a>
                    </li>
      
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline text-dark">Earrings</span> </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline text-dark">Wrist Watches</span> </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline text-dark">Hair accessories</span> </a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
      <!--End of Sidebar-->

        <div class="col py-3">
        <div class="item_section layout_padding2">
        <div class="container">
        <div class="item_container">


<!-- Category Bracelets --->
      <?php
      $select_products = mysqli_query($conn, "SELECT * FROM PRODUCT");
      if(mysqli_num_rows($select_products) > 0){
        while($row = mysqli_fetch_assoc($bracelet_products)){
      ?>
       <form action="" method="post">
        <div class="box">
          <div class="name">
            <h6>
              <?php echo $row["ProductName"]?>
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-1.png" alt="">
          </div>
          <div style="display: flex; justify-content: space-between;">
            <h5>
            Price: <?php echo $row["ProductPrice"]?>$
            </h5>
           
              <input type="hidden" name="product_id" value="<?php echo $row['ProductID']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $row['ProductName']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['ProductPrice']; ?>">
              <input type="hidden" name="product_image" value="<?php echo $row['ProductImage']; ?>">
              
              <input type="submit" class="button" value="Add to Cart" name="add_to_cart">
            
          </div>
        </div>
        </form>
        <?php
        }
      }
      ?>


<!-- Category Ring --->
      <?php
      while($row = mysqli_fetch_assoc($ring_products)){
      ?>
        <div class="box">
          <div class="name">
            <h6>
              <?php echo $row["ProductName"]?>
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-1.png" alt="">
          </div>
          <div style="display: flex; justify-content: space-between;">
            <h5>
            Price: <?php echo $row["ProductPrice"]?>$
            </h5>
            <form action="" method="post">
              <input type="hidden" name="product_id" value="<?php echo $row['ProductID']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $row['ProductName']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['ProductPrice']; ?>">
              <input type="hidden" name="product_image" value="<?php echo $row['ProductImage']; ?>">
              
              <input type="submit" class="button" value="Add to Cart" name="add_to_cart">
            </form>
          </div>
        </div>
        <?php
      }
      ?>


      <?php
      while($row = mysqli_fetch_assoc($earrings_products)){
      ?>
        <div class="box">
          <div class="name">
            <h6>
              <?php echo $row["ProductName"]?>
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-1.png" alt="">
          </div>
          <div style="display: flex; justify-content: space-between;">
            <h5>
            Price: <?php echo $row["ProductPrice"]?>$
            </h5>
            <form action="" method="post">
              <input type="hidden" name="product_id" value="<?php echo $row['ProductID']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $row['ProductName']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['ProductPrice']; ?>">
              <input type="hidden" name="product_image" value="<?php echo $row['ProductImage']; ?>">
              
              <input type="submit" class="button" value="Add to Cart" name="add_to_cart">
            </form>
          </div>
        </div>
        <?php
      }
      ?>

<?php
      while($row = mysqli_fetch_assoc($watch_products)){
      ?>
        <div class="box">
          <div class="name">
            <h6>
              <?php echo $row["ProductName"]?>
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-1.png" alt="">
          </div>
          <div style="display: flex; justify-content: space-between;">
            <h5>
            Price: <?php echo $row["ProductPrice"]?>$
            </h5>
            <form action="" method="post">
              <input type="hidden" name="product_id" value="<?php echo $row['ProductID']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $row['ProductName']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['ProductPrice']; ?>">
              <input type="hidden" name="product_image" value="<?php echo $row['ProductImage']; ?>">
              
              <input type="submit" class="button" value="Add to Cart" name="add_to_cart">
            </form>
          </div>
        </div>
        <?php
      }
      ?>

<?php
      while($row = mysqli_fetch_assoc($accesory_products)){
      ?>
        <div class="box">
          <div class="name">
            <h6>
              <?php echo $row["ProductName"]?>
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-1.png" alt="">
          </div>
          <div style="display: flex; justify-content: space-between;">
            <h5>
            Price: <?php echo $row["ProductPrice"]?>$
            </h5>
            <form action="" method="post">
              <input type="hidden" name="product_id" value="<?php echo $row['ProductID']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $row['ProductName']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['ProductPrice']; ?>">
              <input type="hidden" name="product_image" value="<?php echo $row['ProductImage']; ?>">
              
              <input type="submit" class="button" value="Add to Cart" name="add_to_cart">
            </form>
          </div>
        </div>
        <?php
      }
      ?>
          
  <!-- end item section -->


  
        </div>
    </div>
</div>

  

  <!-- footer section -->
  
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>