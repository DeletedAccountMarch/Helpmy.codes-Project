<?php

     
// $server = "127.0.0.1:3308:3308";
// $username = "arjun";
// $password = "DLUpload1!";
// $database="helpmycode";


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