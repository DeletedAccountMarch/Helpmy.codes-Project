<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
        header("location:login.php");
        exit;
    }
?>
    <?php require 'components/_nav.php'  ?>
 
<head>
<title>Welcome to your account</title>
    
    
    <link rel="icon" href="images/fav.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body style="text-align:center;">
<div>
    <br>
<h1>Welcome - <?php echo $_SESSION['email'] ?></h1>

<h3>Your account was registered on = <?php echo $_SESSION['date'] ?></h3>
<a href="logout.php">Click here to logout</a>
</div>
    
</body>
