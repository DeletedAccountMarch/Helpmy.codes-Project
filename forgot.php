<?php 

$login = false;
$showError =false;

include 'connection.php' ;

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $token = $_GET["vtoken"];

    $sql = "Select * from account where v_token='$token'";
    $result=mysqli_query($conn,$sql);

    $num = mysqli_num_rows($result);

    if($num==1){

       $shownew=1;
       
    }


}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["resetpw"])){
    $email = $_POST["email"];
    
    $sql = "Select * from account where email='$email'";
    $result=mysqli_query($conn,$sql);

    $num = mysqli_num_rows($result);

       if($num==1){

            while($row = mysqli_fetch_assoc($result)){
                
                
                        include 'sendmail.php';
                        $mail_stat = send_resetmail($email,$row['v_token']);
                        if($mail_stat){
                            $showError = "Please check your email. We have send you reset link to your email address";
                        }
                        else{
                            $showError = "Some error occur while sending verification email";
                        }
                  
            }
            
        }
        else{
            $showError = "Email doesn't exist";
        }
  
    

}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["changepw"])){
    $token = $_POST["token_id"];
    $password = $_POST['confirmpw'];
    $confirmpw = $_POST['newpw'];

    if($password == $confirmpw){
        $sql = "Select * from account where v_token='$token'";
        $result_query=mysqli_query($conn,$sql);

    
        while($myresult = mysqli_fetch_assoc($result_query)){
            $myemail = $myresult["email"];
        }  
        $phash = password_hash($password, PASSWORD_DEFAULT);
        $nsql = "update account set passwords='$phash' where email = '$myemail'";
        $result_query=mysqli_query($conn,$nsql);
        
        if($result_query){
             header("location:login.php?isres=1");
         }
        else{
             header("location:login.php?isres=2");
         }
    }else{
        $showError ="Password didn't match";
    }
    
    // header("location:login.php?isres=1");

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Your Password | Help my codes</title>
    
    <link rel="icon" href="images/fav.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>

<body>

    <?php require 'components/_nav.php' ?>

    <div class="content">
        <div class="login-container">
            <form action="forgot.php" method="POST" id="logform">
                <div class="login-data">
                    <h2>Reset Your Password</h2><hr>
                    <?php 
                    if($showError){

                        echo $showError;
                    } ?>
                    <?php 
                    if($shownew==0){
                        include "components/_reset.php";
                    }
                    else{
                        echo "<input type='text' name='token_id' value='$token' hidden>";
                        include "components/_confirmReset.php";
                    }
                     ?>

                    <button type="button" class="btn color-white" onclick="location.href='login.php';">Go back to login</button>
                </div>
            </form>
            
        </div>
    </div>
    
    <?php require 'components/_footer.php' ?>

</body>

</html>