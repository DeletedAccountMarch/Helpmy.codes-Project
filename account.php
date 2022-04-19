<?php
include 'connection.php';
$value= $_GET['key'];

$res_acc = mysqli_query($conn,"select * from account where v_token= '$value'");
$res_count = mysqli_num_rows($res_acc);
$row = mysqli_fetch_assoc($res_acc);

if($res_count==1){
    if($row['v_status'] == 1 ){
        echo "Your email is already verified";
    }
    else{
        $verified = mysqli_query($conn,"update account set v_status = 1 where v_token = '$value' ");
        if($verified){
            echo "Your email is verified you can login to your account";
        }else{
            echo "some error occured while processing your request";
        }
    }
}
else{

    echo "Invalid request";
}

?>