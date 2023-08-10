<?php
                //authentication
                // Server, database name, sqluserid, and sqlpassword
                // Change to your own server, database, id and password

                $server = "localhost";
                $sqlUsername = "root";
                $sqlPassword = "";
                $databaseName = "project_cs450";

                $conn = new mysqli($server, $sqlUsername, $sqlPassword, $databaseName);


                //function to authenticate user, and return TRUE or FALSE
                function authenticateUser($connection,$loginUserId,$loginPassword )
                {
                // User table which stores userid and password
                // Change to your own table name
                $userTable = "CUSTOMER";

                // Test the username and password parameters
                if (!isset($loginUserId) || !isset($loginPassword))
                    return false;

                $pa = md5($loginPassword);
                //Formulate the SQL statment to find the user
                $sql = "SELECT *
                    FROM $userTable
                    WHERE EmailID = '$loginUserId' AND Password = '$pa'";
                //echo $sql;

                // Execute the query
                    $query_result = $connection->query($sql);
                    if (!$query_result) {
                        echo "Sorry, query is wrong";
                }

                //exactly one row? then we have found the user
                    $nrows = $query_result->num_rows;
                if ( $nrows != 1)
                    return false;
                else
                    return true;
                }
?>

