<?php

$code = $_POST['code'];

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$md5hash = md5($code);

	$filename = $_SERVER['DOCUMENT_ROOT'] . "/code/" . $md5hash . ".cpp";	
	$filexe= $_SERVER['DOCUMENT_ROOT'] . "/code/" . $md5hash . ".exe";

	$dir = $_SERVER['DOCUMENT_ROOT'] . '/code';
	

	//this will make the directory if the directory is not present
	if ( !file_exists($dir) )
	{
  		mkdir ($dir, 0777);
 	}

	$myfile = fopen($filename,"w") or die("Unable to open file!");
	fwrite($myfile,$code);	//Store the user submitted code into a file
	fclose($myfile);

	$command1 = "C:\TDM-GCC-32\bin\g++ " . $filename . " -o ". $filexe;
	$output1 = shell_exec($command1 . " 2>&1");	
	$output = shell_exec($filexe . " 2>&1");	
	
	if(empty($output1)){	
		echo $output;
	}else echo $output1;
}

?>