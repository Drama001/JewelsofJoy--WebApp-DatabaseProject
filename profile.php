<?php

    require 'authentication.php';
    session_start();
      $id= $_SESSION['CustomerID'];
      $select_user = mysqli_query($conn, "SELECT * FROM CUSTOMER WHERE CustomerID = $id");
      $fetch_user = mysqli_fetch_assoc($select_user);


      if(isset($_POST['update'])){
        $update_p_id = $id;
        $update_first_name = $_POST['update_FirstName'];
        $update_last_name = $_POST['update_LastName'];
        $update_Phone = $_POST['update_Phone'];
        $update_street = $_POST['update_Street'];
        $update_apt = $_POST['update_Apartment'];
        $update_city = $_POST['update_City'];
        $update_state = $_POST['update_State'];
        $update_zip = $_POST['update_Zipcode'];
        $update_email = $_POST['update_EmailID'];
       
     
        $update_query = mysqli_query($conn, "UPDATE `CUSTOMER` SET FirstName = '$update_first_name', LastName ='$update_last_name',   Phone = '$update_Phone', Street = '$update_street', Apartment = '$update_apt', City = '$update_city', Zipcode = '$update_zip', EmailID = '$update_email' WHERE CustomerID = '$id'");
     
        if($update_query){
           $message[] = 'product updated succesfully';
           header('location:profile.php');
        }else{
           $message[] = 'product could not be updated';
           header('location:profile.php');
     
        }
       
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Jewels of Joy</title>
</head>
<body style="background-color: white;
            background-image: url(images/hero-bg.png);">
    <a class="navbar-brand textdark m-2" href="main.php">
    <img src="images/logo.png" alt="">
    <span class="text-dark">
        Jewels of Joy
    </span>
    </a>
<div class="col card" style="background-color: white; width:80rem; margin: 2rem 5rem 5rem 5rem;">
        <h2 class="card-title mx-2 mt-2">Update Your Profile!</h2>
        <div class="cadr-body ml-5 mb-5 mr-5">
            <form method="post" action="" name="frmLogin" id="frmLogin">
                
                <div class="row">
                    <div class="col">
                        
                        <label for="firstname">First name:</label>
                        <input type="text" class="form-control" id="FirstName" placeholder=<?php echo $fetch_user['FirstName']?> name="update_FirstName" >
                        
                    </div>
                    <div class="col">
                        <label for="lastname">Last name:</label>
                        <input type="text" class="form-control" id="LastName" placeholder=<?php echo $fetch_user['LastName']?> name="update_LastName">
                       
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="Phone">Phone:</label>
                        <input type="number" class="form-control" id="Phone" placeholder=<?php echo $fetch_user['Phone']?> name="update_Phone" >
                        
                    </div>
                    <div class="col">
                        <label for="Street">Street:</label>
                        <input type="text" class="form-control" id="Street" placeholder=<?php echo $fetch_user['Street']?> name="update_Street" >
               
                    </div>
                    <div class="col">
                        <label for="Apartment">Apartment:</label>
                        <input type="text" class="form-control" id="Apartment" placeholder=<?php echo $fetch_user['Apartment']?> name="update_Apartment" >
                       
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="City">City:</label>
                        <input type="text" class="form-control" id="City" placeholder=<?php echo $fetch_user['City']?> name="update_City" >
                        
                    </div>
                        <div class="col">
                        <label for="State">State:</label>
                        <input type="text" class="form-control" id="State" placeholder=<?php echo $fetch_user['State']?> name="update_State" >
                        
                        </div>
                    <div class="col">
                        <label for="Zipcode">Zipcode:</label>
                        <input type="number" class="form-control" id="Zipcode" placeholder=<?php echo $fetch_user['Zipcode']?> name="update_Zipcode" >
                        
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="EmailID" placeholder=<?php echo $fetch_user['EmailID']?> name="update_EmailID" >
                       
                    </div>
                </div>
        
                <div class="form-group form-check my-1">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" > I agree on Terms and Conditions.
                      
                    </label>
                </div>
                <!-- <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" /> -->
                <!-- <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button> -->
                <input type="submit" class="btn btn-danger btn-lg" value="Update" name="update">
            </form>
        </div>
    </div> 
</body>
</html>