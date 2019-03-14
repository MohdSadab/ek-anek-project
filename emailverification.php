<?php
session_start();

$con=mysqli_connect('localhost','root',''); //stablishing connection with server
if(!$con)
	echo "CONNECTION NOT STABLISHED\n".mysqli_error();
//assigning the user informations to variables
$Fname=$_SESSION['Fname'];
$Lname=$_SESSION['Lname'];
$checkTable=true;
$Mob=$_SESSION['Mob'];
$pass=$_SESSION['pass'];
$email=$_SESSION['Email'];
//make array of variable for comfort
$arr=array($Fname,$Lname,$email,$Mob,$pass);

//This function used for databaseCreation if it is not exist
function databaseCreation($con)
{
if(!mysqli_select_db($con,'profile'))
{
$query="Create Database profile";
 mysqli_query($con,$query);
}
}

//This function used for table_creation if it is not exist
function table_creation($con)
{
	
$que=" CREATE TABLE profile( FNAME varchar(20) NOT NULL, LNAME varchar(30) NOT NULL,
 Email varchar(100) NOT NULL PRIMARY KEY, Mobile varchar(14),pass varchar(200) NOT NULL  ) ";
// $result=mysqli_query($con,"SELECT count(*) FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'profile') AND (TABLE_NAME = 'Profile')");
// $arry=mysqli_fetch_array($result);

  if (mysqli_query($con,'select 1 from `profile` LIMIT 1')==FALSE) //it checks whether table exist or not if not exist this condition become true
  {
	  mysqli_query($con,$que); // create the table
  }
}
 
 // this function used for data insertion in table
 function Insertion($con,$arr)
 {
   {
    $que="INSERT INTO profile(FNAME,LNAME,Email,Mobile,pass) value('".$arr[0]."','".$arr[1]."','".$arr[2]."','".$arr[3]."','".$arr[4]."')";
	mysqli_query($con,$que);
} 
 }
 // this function checks whether given information already exist or not if it exist return false
 function profileExist($con,$arr)
 {
	 $que="SELECT * from profile where Email='".$arr[2]."'";
	 $result=mysqli_query($con,$que);
	 $num=mysqli_num_rows($result); // this contain no of tuples if it is >0 than it means email is already exist
	 if(mysqli_num_rows($result)>0)
	 {
		 echo "<script> alert('Email is already used') </script> ";
		  return(false);
	 }
	  
	  return(true);
 }
 
 databaseCreation($con); // creating database
 table_creation($con);// creating table
 if(profileExist($con,$arr)) // checking profile if it is not exist Insert the user information 
 Insertion($con,$arr);
session_destroy(); // destroy the session of the user;
 header("Location:http://localhost/signin.php"); // jump to sign in page

?>



