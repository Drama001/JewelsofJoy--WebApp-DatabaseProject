<?php
                    require 'authentication.php';
                    $rand=rand();
                    $_SESSION['rand']=$rand;

                     
                    //$errorMessage = 'Create a user account';
                
                    
                    //if(isset($_POST['submit']) && $_POST['randcheck']==$_SESSION['rand']){
                    //echo "<script>console.log('Debug Objects: " . $_SERVER["REQUEST_METHOD"] . "' );</script>";
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
                        $firstname = $_POST["FirstName"];
                        $lastname  = $_POST["LastName"];
                        $phone     = $_POST["Phone"];
                        $street    = $_POST["Street"];
                        $apartment = $_POST["Apartment"];
                        $city      = $_POST["City"];
                        $state     = $_POST["State"];
                        $zipcode   = $_POST["Zipcode"];
                        $email     = $_POST["EmailID"];
                        $password  = $_POST["Password"];

                    
                        //connect to the database
                    
                        $conn = new mysqli($server, $sqlUsername, $sqlPassword, $databaseName) or die("Connect failed: %s\n". $conn -> error);

                        //table to store username and password
                        $userTable = "CUSTOMER";

                        $ps = md5($password);

                        // Formulate the SQL statment to find the user
                        $sql = "INSERT INTO $userTable 
                                VALUES (NULL, '$firstname','$lastname', '$phone', '$street', '$apartment', '$city', '$state', $zipcode, '$email', '$ps')";
                    
                        
                        // Execute the query
                                $query_result = $conn->query($sql)
                            or die( "SQL Query ERROR. User can not be created.");
                        
                            if($query_result){
                                $message[] = 'Registered Succesfully';
                            }else{
                                $message[] = 'Could not add the Member';
                            }
                        }
                    //}
                    
                    ?>


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
    <title>Signup</title>
</head>
<body 
    style="background-color: white;
            background-image: url(images/hero-bg.png);">
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<div class="message bg-success"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
        };    
    ?>
    <a class="navbar-brand textdark m-2" href="index.php">
            <img src="images/logo.png" alt="">
            <span class="text-dark">
              Jewels of Joy
            </span>
          </a>
    <div class="col card" style="background-color: white; width:80rem; margin: 2rem 5rem 5rem 5rem;">
        <h2 class="card-title mx-2 mt-2">Create Your Account!</h2>
        <div class="cadr-body ml-5 mb-5 mr-5">
            <form method="post" action="" name="frmLogin" id="frmLogin">
                <?php
                $rand=rand();
                $_SESSION['rand']=$rand;
                ?> 
                <div class="row">
                    <div class="col">
                        
                        <label for="firstname">First name:</label>
                        <input type="text" class="form-control" id="FirstName" placeholder="Enter name" name="FirstName" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col">
                        <label for="lastname">Last name:</label>
                        <input type="text" class="form-control" id="LastName" placeholder="Enter lastname" name="LastName" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="Phone">Phone:</label>
                        <input type="number" class="form-control" id="Phone" placeholder="Enter Phone Number" name="Phone" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col">
                        <label for="Street">Street:</label>
                        <input type="text" class="form-control" id="Street" placeholder="Enter Street" name="Street" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col">
                        <label for="Apartment">Apartment:</label>
                        <input type="text" class="form-control" id="Apartment" placeholder="Enter Apartment" name="Apartment" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="City">City:</label>
                        <input type="text" class="form-control" id="City" placeholder="Enter city" name="City" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                        <div class="col">
                        <label for="State">State:</label>
                        <input type="text" class="form-control" id="State" placeholder="Enter state" name="State" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    <div class="col">
                        <label for="Zipcode">Zipcode:</label>
                        <input type="number" class="form-control" id="Zipcode" placeholder="Enter zipcode" name="Zipcode" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="EmailID" placeholder="abc@example.com" name="EmailID" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="Password" placeholder="Enter password" name="Password" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
        
                <div class="form-group form-check my-1">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" required> I agree on Terms and Conditions.
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                </div>
                <!-- <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" /> -->
                <!-- <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button> -->
                <a href="login.php" name="submit"><button type="submit"  class="btn btn-block btn-warning my-2"><a>Sign Up!</button></a>
                <button type="submit" name="submit" class="btn btn-block btn-warning my-2" onclick="window.location.href='login.php'">Login</button>
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
