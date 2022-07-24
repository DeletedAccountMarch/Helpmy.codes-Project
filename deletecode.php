<?php include 'connection.php';
 
 if($_SERVER['REQUEST_METHOD']=='GET'){
    $id = $_GET['id'];
    echo $id;
   $delete_query = "delete from codes where codes_id = $id";
        
    $result = mysqli_query($conn,$delete_query);

    if($result){
       header("location:welcome.php");
    }

 }
 
 ?>