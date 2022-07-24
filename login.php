<?php 
function protect($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['remember']) && $_POST['remember']=='1'){
    setcookie("RememberMe","1",time()+86400,"/");
}
$login = false;
$showError =false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'connection.php' ;
    $email = protect($_POST["email"]);
    $password = protect($_POST["password"]);

    $sql = protect("Select * from account where email='$email'");
    $result=mysqli_query($conn,$sql);

    $num = mysqli_num_rows($result);

    if($num==1){

        while($row = mysqli_fetch_assoc($result)){
            
            $res =password_verify($password,$row['passwords']);
            
            if($res){
                
                if($row['v_status']==1){
                    
                    $login = true;
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['user_id']=$row['user_id'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['name']=$row['username'];
                    $_SESSION['date']=$row['reg_date'];
                    header("location: welcome.php");
                }
                else{
                    include 'sendmail.php';
                    $mail_stat = send_mail($email,$row['v_token']);
                    if($mail_stat){
                        $showError = "Please confirm your email. We have send you email to your email address. Please check your spam folder also";
                    }
                    else{
                        $showError = "Some error occur while sending verification email";
                    }
                }
                
                
            }
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    }
    else{
        $showError = "Invalid Credentials";
    }

}

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $resmethod = $_GET['isres'];
    $emailmsg= $_GET['msg'];
    $unauth = $_GET['noauth'];
    if($resmethod==1){
        $showError = "Your password has been reset, You can login now!";
    }
    else if($resmethod==2){
        $showError = "Something went wrong! Please try again later";
    }


    if($emailmsg == 1){
        $showError = "Your email is already verified";
    
    }
    else if($emailmsg == 2){
        $showError = "Your email is verified you can login to your account";
        
    }
    else if($emailmsg == 3){
        $showError = "some error occured while processing your request";

    }
    else if($emailmsg == 3){
        $showError = "some error occured while processing your request";

    }

    else if($unauth == 1){
        $showError = "Sorry! You are not authorized to view without login!";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login to your account | Help my codes</title>
    
    <link rel="icon" href="images/fav.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>

<body>

    <?php require 'components/_nav.php' ?>

    <div class="content">
        <div class="login-container">
            <form action="login.php" method="POST" id="logform">
                <div class="login-data">
                    <h1>Account Login</h1><hr>
                    <?php if($login){
                       echo " <p>Login success</p>";
                    }
                    if($showError){

                        echo $showError;
                    } ?>
                    <div class="input-field" style="margin-top: 30px;">
                        <i class="fa fa-user"></i>
                        <input type="email" class="inp" name="email" placeholder="Enter your email" required>
                    </div>
                    <p style="float:right; font-size:15px;"><a href="forgot.php" style="text-decoration:none;">Forgot Password? </a></p>
                    <div class="input-field">
                        <i class="fa fa-lock"></i> 
                        <input type="password" class="inp" name="password" placeholder="Enter your password" required>
                    </div>
                    <span style="font-size: 16px; "><input id="check" type="checkbox" name="remember" value="1" <?php if(isset($_COOKIE['RememberMe']) && $_COOKIE['RememberMe']==1){ ?> checked <?php }?> id="remember"><label for="check" style="cursor: pointer;position:relative;bottom:3px;"> Remember Me</label></span>
                   <br><br><button class="btn color-brown" style="margin-bottom: 10px;" type="submit">Login</button><p align="center">OR</p>
                    <button type="button" class="btn color-white" onclick="location.href='signup.php';">Register</button>
                </div>
            </form>
            
        </div>
    </div>
    
    <?php require 'components/_footer.php' ?>

</body>

</html>