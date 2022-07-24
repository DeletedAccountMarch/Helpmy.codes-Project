
    <?php require 'components/_nav.php';  ?>
 <?php include 'connection.php';
    if(!$_SESSION['name']){
        header("location:login.php?noauth=1");
    }
 ?>
<head>
<title>Welcome to your account</title>
    
    
    <link rel="icon" href="images/fav.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body style="text-align:center;">
<div>
    <br>
<h1>Welcome - <?php echo $_SESSION['name'] ?></h1>

<h3>Your account was registered on = <?php echo $_SESSION['date'] ?></h3>
<h3>Your Email = <?php echo $_SESSION['email'] ?></h3>
<br>
<h3><a href="compile.php" class="link auth-btn2">Compile C++ Code </a></h3><br><br><br>

<h1>Your Compiling History  </h1>
<?php 
$user_id = $_SESSION['user_id'];
$select_all = "Select * from codes where user_id = '$user_id'";

if($run = mysqli_query($conn,$select_all)){
    $totalcode = mysqli_num_rows($run);
    if($totalcode==0){
        echo "You haven't compiled any codes!";
    }
    else{
        $a =1;
        while($datarow = mysqli_fetch_assoc($run)){
            $fetchid= $datarow['codes_id'];
            $fetchcodes =  $datarow['codes'];
            echo "<br><h4> Code $a - <br>  $fetchcodes </h4> <br><a class='link'  style='cursor:pointer; color:black; font-size:15px; background-color:pink;' href='deletecode.php?id=$fetchid'>Delete this history </a> <br><br> <hr>";
            $a++;
        }
    }
}


?>
<br>
<br>
<h3>Total Codes You have compilled = <?php echo $totalcode ?></h3>

</div>
    
</body>
