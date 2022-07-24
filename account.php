<?php
include 'connection.php';
$value= $_GET['key'];

$res_acc = mysqli_query($conn,"select * from account where v_token= '$value'");
$res_count = mysqli_num_rows($res_acc);
$row = mysqli_fetch_assoc($res_acc);

if($res_count==1){
    if($row['v_status'] == 1 ){
        $msg1 = 1;
        header("location:login.php?msg=$msg1");
    }
    else{
        $verified = mysqli_query($conn,"update account set v_status = 1 where v_token = '$value' ");
        if($verified){
            $msg1 = 2;
        header("location:login.php?msg=$msg1");
        }else{
            $msg1 = 3;
        header("location:login.php?msg=$msg1");
        }
    }
}
else{

    echo "Invalid request";
}

?>