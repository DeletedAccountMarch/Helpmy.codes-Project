<?php

include_once "connection.php";
$checkme=0;
session_start();

$status = $_SESSION['loggedin'];

  
$code = $_POST['code'];
$input = $_POST['input'];
$length = strlen($code);
$input_length = strlen($input);

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	for ($i = 0; $i <= $length;$i++) {

        if (substr($code,$i, 6) == "system" || substr($code,$i, 4) == "FILE" || substr($code,$i, 4) == "file" || substr($code,$i, 4) == "File" || substr($code,$i, 5) == "fopen" || substr($code,$i, 6) == "fwrite" || substr($code,$i, 5) == "fread" || substr($code,$i, 3) == ":\\" || substr($code,$i, 8) == "cygwin64" || substr($code,$i, 3) == "bin" || substr($code,$i, 2) == "\\"  ) {
            $checkme=1;
        }

	}
	
	for ($i = 0; $i <= $input_length;$i++) {

        if (substr($input,$i, 6) == "system" || substr($input,$i, 1) == "-" || substr($input,$i, 4) == "FILE" || substr($input,$i, 4) == "file" || substr($input,$i, 4) == "File" || substr($input,$i, 5) == "fopen" || substr($input,$i, 6) == "fwrite" || substr($input,$i, 5) == "fread" || substr($input,$i, 3) == ":\\" || substr($input,$i, 8) == "cygwin64" || substr($input,$i, 3) == "bin" || substr($input,$i, 2) == "\\"  ) {
            $checkme=1;
        }

	}
	


	if($checkme==1){
		echo "Oh! You cannot do this!";
	}
	else{
		$md5hash = md5($code);

	$filename = $_SERVER['DOCUMENT_ROOT'] . "/code/" . $md5hash . ".cpp";	
	$filexe= $_SERVER['DOCUMENT_ROOT'] . "/code/" . $md5hash . ".exe";
	$inputtxt= $_SERVER['DOCUMENT_ROOT'] . "/code/" . $md5hash . ".txt";
	$dir = $_SERVER['DOCUMENT_ROOT'] . '/code';
	

	//this will make the directory if the directory is not present
	if ( !file_exists($dir) )
	{
  		mkdir ($dir, 0777);
 	}

	$myfile = fopen($filename,"w") or die("Unable to open file!");
	$inputfile = fopen($inputtxt,"w") or die("Unable to open file!");
	fwrite($myfile,$code);	//Store the user submitted code into a file
	fwrite($inputfile,$input);
	
	$codes = htmlspecialchars($code);
	if($status){
		$myid = $_SESSION['user_id'];
		$query = "Insert into codes (user_id,codes) values('$myid','$code');";
		if(mysqli_query($conn,$query));
	}

	fclose($myfile);


	if(trim($input=="")){
		$command1 = "C:\TDM-GCC-64\bin\g++ " . $filename . " -o ". $filexe;
		$output1 = shell_exec($command1 . " 2>&1");	
		$output = shell_exec($filexe . " 2>&1");
	}
	else{

		$command1 = "C:\TDM-GCC-64\bin\g++ " . $filename . " -o ". $filexe;
		$output1 = shell_exec($command1 . " 2>&1");	
		$output = shell_exec($filexe . " < ". $inputtxt . " 2>&1");

	}

	if(empty($output1)){	
		echo $output;
	}else echo $output1;


	}
	
}
?>