<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "web-tech";
 
    $conn = mysqli_connect($server, $user, $pass, $database);

    if(!$conn){
        die("<script>alert('Unable to Connect.')</script>");
    }
?>