<?php

    require 'authentication.php';

    session_start();

    $id= $_SESSION['CustomerID'];
    $select_cart = mysqli_query($conn, "SELECT * FROM CART WHERE CustomerID = $id");
    $grand_total = 0;
    $fetch_cart = mysqli_fetch_assoc($select_cart);
    $count = mysqli_num_rows($select_cart);

    if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM CART WHERE ProductID = $remove_id");
        header('location:cart.php');
     };

     if(isset($_POST['update_update_btn'])){
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($conn, "UPDATE CART SET Quantity = '$update_value' WHERE ProductID = '$update_id'");
        if($update_quantity_query){
           header('location:cart.php');
        };
     };

     if(isset($_GET['delete_all'])){
        mysqli_query($conn, "DELETE FROM `CART`");
        header('location:cart.php');
     }
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>
<a class="navbar-brand textdark m-2" href="main.php">
            <img src="images/logo.png" alt="">
            <span class="text-dark">
              Jewels of Joy
            </span>
          </a>
<body style="background-color: white;
            background-image: url(images/hero-bg.png);">
    <section class="h-100 h-custom" >
  <div class="container pb-5 pt-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">
              <div class="col">
                <h5 class="mb-3"><a href="jewellery.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left mx-2"></i>Continue shopping</a></h5>
                <hr>

               
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <h5 class="mb-1">SHOPPING CART</h5>
                    <p class="mb-0">You have <?php echo $count ?> items in your cart</p>
                  </div>
                </div>

                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div class="ms-3">
                          <h5>Item Name</h5>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 120px;" class="mx-2">
                          <h5 class="fw-normal mb-0">Quantity</h5>
                        </div>
                        <div style="width: 120px;">
                          <h5 class="mb-0">Item Price</h5>
                        </div>
                        <div style="width: 120px;">
                          <h5 class="mb-0">Total Price</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div>
                            <!-- <img
                                src="#product_image"
                                class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;"> -->
                            </div>
                            <div class="ms-3">
                            <h5><?php echo $fetch_cart['ProductName']; ?></h5>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center"> 
                            <form action="" method="post">
                            <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['ProductID']; ?>" >
                            <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['Quantity']; ?>" >
                            <input type="submit" value="update" class="btn btn-warning" name="update_update_btn">
                            </form> 
                            <div style="width: 60px;" class="mx-5">
                            <h5 class="mb-0">$<?php echo $fetch_cart['ProductPrice']; ?></h5>
                            </div>
                            <div style="width: 80px; font-size:large;" class="font-weight-bold" >$<?php echo $sub_total_copy = number_format($fetch_cart['ProductPrice'] * $fetch_cart['Quantity'])?></div>
                            <div><a href="cart.php?remove= <?php echo $fetch_cart['ProductID'];?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash-alt" style="color:red;"></i></a></div>
                        </div>
                        </div>
                    </div>
                    </div>

                <?php
                if(mysqli_num_rows($select_cart) > 0)
                {
                   while($fetch_cart = mysqli_fetch_assoc($select_cart))
                   {
                    $quantity = $fetch_cart['Quantity'];                
                ?>
                    <!-- cart item -->
                    <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div>
                            <!-- <img
                                src="#product_image"
                                class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;"> -->
                            </div>
                            <div class="ms-3">
                            <h5><?php echo $fetch_cart['ProductName']; ?></h5>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            
                            <form action="" method="post">
                            <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['ProductID']; ?>" >
                            <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['Quantity']; ?>" >
                            <input type="submit" value="update" class="btn btn-warning" name="update_update_btn">
                            </form> 
                            <div style="width: 60px;" class="mx-5">
                            <h5 class="mb-0 font-wght: ">$<?php echo $fetch_cart['ProductPrice']; ?></h5>
                            </div>
                            <div style="width: 80px; font-size:large;" class="font-weight-bold">$<?php echo $sub_total = number_format($fetch_cart['ProductPrice'] * $fetch_cart['Quantity'])?></div>
                            <div><a href="cart.php?remove= <?php echo $fetch_cart['ProductID'];?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash-alt" style="color:red;"></i></a></div>
                        </div>
                        </div>
                    </div>
                    </div>

                <?php
                 $grand_total += $sub_total;  
                    };
                    echo '<h5 class="text-center">
                    Total Amount=$'. number_format($grand_total+$sub_total_copy).'
                    </h5>';
                };
                ?>

                <div  data-toggle="modal" data-target="#sign-up">
                <button  class="btn btn-danger btn-lg" style="left: 0px;">checkout</button>   
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
    $cardnumber = $_POST["cardNumber"];
    $name = $_POST["nameOnCard"];
    $cust_id = $_SESSION['CustomerID'];

    //connect to the database
    $conn = new mysqli($server, $sqlUsername, $sqlPassword, $databaseName) or die("Connect failed: %s\n". $conn -> error);
 
    // Formulate the SQL statment to find the user
    $insert_card = mysqli_query($conn, "INSERT INTO PAYMENT (PaymentID, CustomerID, CardNumber, NameOnCard) VALUES(NULL, $cust_id, $cardnumber, '$name')");

    }  
?>

     <!-- Sign ups -->
     <div class="modal fade" id="sign-up">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Complete Your Order</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                <!-- Modal body -->
                <div class="modal-body">
                <h4>Card Details</h4>
                <form method="post" action="" name="frmlogin" id="frmLogin">
                    <div class="row">
                        <div class="col-8">
                            <label for="Phone">Card Number</label>  <i class="fa fa-credit-card"></i>
                            <input type="number" class="form-control" id="cardNumner" maxlength=12 placeholder="Enter Card Details" name="cardNumber" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col-4">
                            <label for="Street">Security code</label>
                            <input type="password" class="form-control" id="pin" placeholder="Enter pin" name="pin" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="name">
                            <label for="lastname">Name on the Card</label>
                            <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="nameOnCard" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                    </div>       
                    <div class="form-group form-check mx-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" required> I agree on Terms and Conditions.
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                    </div>
                    <!-- <input type="hidden" value=name="randcheck" /> -->
                    <!-- <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button> -->
                    <!-- <a href="order.php"><button type="submit" name="payNorder" class="btn btn-danger m-2" onclick="">Pay and Order</button></a> -->
                    
                   <!-- <button type="submit"  name="submit" class="btn btn-block btn-danger m-2" onclick="window.location.href='order.php'"><a>Pay and Order</button> -->

                </form>
                <button type="submit" name="submit" class="btn btn-block btn-danger my-2" onclick="window.location.href='order.php'">Pay and Order</button>

            </div>
        
        </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>


</body>
</html>

