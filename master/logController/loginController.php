<?php

// Initialize the session
session_start();
 
// Include config file
require_once $_SERVER['DOCUMENT_ROOT'] . "/conf/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM zsd_modo WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: ../../admin/dashboard.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }        
    }

    // Store loggedIn Message
    if($_SESSION["loggedin"] === true && !empty($_SESSION["username"])) {

        $type = "login";
        $message =  $_SESSION["username"] . " as logged in";
        // Prepare an insert statement
        $sql = "INSERT INTO zsd_notification (type, message) VALUES (:type, :message)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":message", $param_message, PDO::PARAM_STR);       
            $stmt->bindParam(":type", $param_type, PDO::PARAM_STR);
            // Set parameters
            $param_type = $type;
            $param_message = $message;

            // Attempt to execute the prepared statement
            if($stmt->execute()){ 
                $alert_success = "New notification";
            } else {
                $alert_err = "Something went wrong with alert message insert";
            }
            // Close statement
            unset($stmt);
        }    
    }
    
    // Close connection
    unset($pdo);
}
?>