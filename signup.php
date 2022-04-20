<?php 
$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'connection.php' ;
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $existquery = "select * from account where email ='$email'";
    $result = mysqli_query($conn,$existquery);
    $row = mysqli_num_rows($result);

    if($row > 0){
        $msg="account already exist";
        
    }
    else{
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $v_hash = md5($email);
            $status=0;
            $sql = "INSERT INTO account (email,password,v_token,v_status) VALUES ('$email','$hash','$v_hash','$status')";
            
            $result = mysqli_query($conn,$sql);
    
            if($result){
                $msg= "Account is created";
            }
        
        }
        else{
            $msg= "Username or password doesn't match";
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Register your new account | Help my codes</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="images/fav.png" type="image/x-icon">
</head>
<body>
    
    <?php require 'components/_nav.php' ?>

    <div class="content">
        <div class="login-container">
            <form action="signup.php" method="post">
                <div class="login-data">
                    <h1>Account Signup</h1><hr>
                    <?php 
                        echo $msg;
                    ?>
                    <div class="input-field" style="margin-top: 30px;">
                        <i class="fa fa-user"></i>
                        <input type="email" name="email" class="inp" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" class="inp" placeholder="Enter your password" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="cpassword" class="inp" placeholder="Confirm Password" required>
                    </div>
                    <span style="font-size: 16px; "><input type="checkbox" id="check"><label for="check" style="cursor: pointer;position:relative;bottom:3px;"> I agree terms and condition</label></span>
                   <br><br><button type="submit" class="btn color-brown" style="margin-bottom: 10px;">Register</button><p align="center">OR</p>
                    <button type="button" class="btn color-white" onclick="location.href='login.php';">Login</button>
                </div>
            </form>
            
        </div>
    </div>
    
    <?php require 'components/_footer.php' ?>

</body>

</html>