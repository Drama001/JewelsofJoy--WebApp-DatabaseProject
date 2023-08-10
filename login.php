<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login</title>
</head>
<body 
    style="background-color:white;
            background-image: url(images/hero-bg.png);">
    <?php

        //include database information and user information
        require 'authentication.php';

        //never forget to start the session
        session_start();
        $errorMessage = '';
        //echo "<script>console.log('Debug Objects: " . $_SERVER["REQUEST_METHOD"] . "' );</script>";
        
        //are user ID and Password provided?
        if (isset($_POST['EmailID']) && isset($_POST['Password'])) {

            //get userID and Password
            $loginUserId = $_POST['EmailID'];
            $loginPassword = $_POST['Password'];
        
            //connect to the database
        $connection = new mysqli($server, $sqlUsername, $sqlPassword, $databaseName);
    
            // Authenticate the user
            if (authenticateUser($connection, $loginUserId, $loginPassword))
            {
            
                //the user id and password match,
                // set the session
                $_SESSION['db_is_logged_in'] = true;
                $_SESSION['EmailID'] = $loginUserId;

                $sql= "SELECT CustomerID FROM CUSTOMER WHERE EmailID='$loginUserId'";
                        
                        // Execute the query
                                $customer_id = mysqli_query($conn,$sql)
                            or die( "SQL Query ERROR.Could not find the customer.");
                            
                            $row = mysqli_fetch_array($customer_id);
                            $_SESSION['CustomerID'] = $row['CustomerID'];
                
                            //$result = mysqli_query($conn, "SELECT * FROM `data` WHERE `username` = '$username' AND `password` = '$password'") or die("No result".mysqli_error());

                            
                    //var_dump($row);
                    //echo  $_SESSION['CustomerID'];
            
                header('Location: main.php');
                exit;

            } else {
                $errorMessage = 'Sorry, wrong username / password';
            }
        }
    ?>
     <a class="navbar-brand textdark m-2" href="index.php">
            <img src="images/logo.png" alt="">
            <span class="text-dark">
              Jewels of Joy
            </span>
    </a>
			
    <div class="card bg-white" style=" margin: 5rem 5rem 5rem 12rem; width:60rem;">
       <h2 class="card-title mx-2 mt-2 text-center">Login Here!</h2>
        <div class="card-body " >
                <form method="post" action="" ame="formLogin" id="formLogin" class="text-center">
                        
                        <div class="form-group">
                            <h6 class="label" for="email">Email</h6>
                            <input type="email" class="form-control input" id="EmailID" placeholder="abc@example.com" name="EmailID">
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control input"id="Password" name="Password">
                            <div class="my-2"><button type="submit" class="btn btn-warning">Login</button></div>
                          </div>
                    <a class="card-link btn btn-warning"  href="index.php">Go back to Main Page</a> 
                    <a class="card-link btn btn-warning" href="signup.php">Signup</a>
                    </form>
        </div>
    </div>



  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <!-- <script src="js/script.js"></script> -->
</body>
</html>
