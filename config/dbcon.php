<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "adminpaneld";

    // Connecting database
    $con = mysqli_connect($host, $username, $password, $database);

    // Connection error handling
    if(!$con){
        die("Connection Error: ". mysqli_connect_error());
    }
    else {
        echo"";
    }

?>