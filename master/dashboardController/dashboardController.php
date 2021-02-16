<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/master/alertsController/alertsController.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(empty($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;
}

?>