<?php

function send_mail($email , $key){

$to = $email;
// Sender 
$from = 'arjun.201607@ncit.edu.np'; 
$fromName = 'Email verification'; 
 
// Email subject 
$subject = 'Email verification';  
 
// Email body content 
$htmlContent = '<h1>Verify your email</h1> <br> <a href="localhost/project/account.php?key='.$key.'">Click here</a> to verify your email'; 
 
// Header for sender info 
$headers = "From: $fromName"." <".$from.">". "\r\n". "Content-type:text/html;charset=UTF-8" . "\r\n"."MIME-Version: 1.0" . "\r\n"; 


$mail = @mail($to, $subject, $htmlContent, $headers);

return $mail?true:false; 

}
?>
