<?php
session_start(); // starting the session
//this is used for preventing direct accessing the page 
if(!isset($_SESSION['Email']))
{
 header("LOCATION:http://localhost/signin.php"); // jump on signin page if not login
}
$con=mysqli_connect('localhost','root','') or die(mysqli_error()); //stablishing the connection

//This function used for databaseCreation if it is not exist
function databaseCreation($con)
{
if(!mysqli_select_db($con,'userUpload'))
{
$query="Create Database userUpload";
 mysqli_query($con,$query);
}
}
//selecting database
mysqli_select_db($con,'userUpload');

//This function used for Table Creation if it is not exist
function table_creation($con)
{

//Mysql query for creating table	
$que=" CREATE TABLE userupload( ID INT(11) PRIMARY KEY AUTO_INCREMENT, 
 Email varchar(100) NOT NULL ,Name varchar(50),Description varchar(20),imageName varchar(150) ,imagePath varchar(500) ) ";

  if (mysqli_query($con,'select 1 from `userUpload` LIMIT 1')==FALSE) //checking whether table exist or not
  {
	  mysqli_query($con,$que); 
  }
}


databaseCreation($con);//creating database
table_creation($con);//creating the table




// assigning user uploaded information like file name type description etc to variable
$temp_name=isset($_POST['name'])?$_POST['name']:"";
$desc=isset($_POST['desc'])?$_POST['desc']:"";
$image = addslashes($_FILES['uploadFile']['tmp_name']);
$imagename = addslashes($_FILES['uploadFile']['name']);
$imagePath="files/".$_FILES['uploadFile']['name'];
//$image=file_get_contents($image);

//Mysql query for Inserting data into database
$que="Insert into userupload(Email,Name,Description,imageName,imagePath) Values('".$_SESSION['Email']."','".$temp_name."','".$desc."',
'".$imagename."','".$imagePath."')";
	
	//geting destination location
    $target="files/".basename($_FILES['uploadFile']['name']);
	$check=1;
	if(file_exists($target)) // checking whether file already exist or not
	{
		$check=0;
		echo"<script> alert('File Already Exsits') </script>";
	}
	else
	{
	if(move_uploaded_file($_FILES['uploadFile']['tmp_name'],$target)) // moving file from temp location to specific location
		mysqli_query($con,$que) or die("Query Error"); // run the query 
	else{
		$_SESSION['error']=1;// if error occur
	}
	    
	} 
	$_SESSION['submit']=1;
	if($check)
	header("LOCATION:http://localhost/userUpload.php");	 // jump to userUpload` page for again uploading file 



?>