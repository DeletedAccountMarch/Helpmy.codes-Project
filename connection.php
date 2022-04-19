<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database="myuser";

    $conn = mysqli_connect($server,$username,$password,$database);

    if(!$conn){
        die("connection failed");
    }
?>