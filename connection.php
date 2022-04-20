<?php

    //For Local
    $server = "localhost";
    $username = "root";
    $password = "";
    $database="helpmycode";

    $conn = mysqli_connect($server,$username,$password,$database);

    if(!$conn){
        die("connection failed");
    }
?>