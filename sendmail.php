<?php

function send_mail($email , $key){

$to = $email;
// Sender 
$from = 'arjun.201607@ncit.edu.np'; 
$fromName = 'Email verification'; 
 
// Email subject 
$subject = 'Email verification for HelpMy.Codes';  
 
// Email body content 
$htmlContent = '<h1>Verify your email</h1> <br> <a href="https://helpmy.codes/account.php?key='.$key.'">Click here</a> to verify your email'; 
 
// Header for sender info 
$headers = "From: $fromName"." <".$from.">". "\r\n". "Content-type:text/html;charset=UTF-8" . "\r\n"."MIME-Version: 1.0" . "\r\n"; 

$mail = mail($to, $subject, $htmlContent, $headers);

if($mail == true){
 return true;
}
else {
    $a = "error is " . error_get_last();
    echo "error is " . $a;
    return false;
}

}

function send_resetmail($email , $key){

    $to = $email;
    // Sender 
    $from = 'arjun.201607@ncit.edu.np'; 
    $fromName = 'Reset Your Password'; 
     
    // Email subject 
    $subject = 'Email verification for HelpMy.Codes';  
     
    // Email body content 
    $htmlContent = '<h1>Reset your password</h1> <br> <a href="https://helpmy.codes/forgot.php?vtoken='.$key.'">Click here</a> to reset your email'; 
     
    // Header for sender info 
    $headers = "From: $fromName"." <".$from.">". "\r\n". "Content-type:text/html;charset=UTF-8" . "\r\n"."MIME-Version: 1.0" . "\r\n"; 
    
    $mail = mail($to, $subject, $htmlContent, $headers);
    
    if($mail == true){
     return true;
    }
    else {
        return false;
    }
    
    }
?>
