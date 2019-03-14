<?php
session_start(); // starting the session of user

//this is used for preventing direct accessing the page
if(!isset($_SESSION['Email']))
header("LOCATION:http://localhost/signin.php");

$con=mysqli_connect('localhost','root','','userupload') or die(mysqli_error()); //stablishing the connection from database

//Mysql Query for selcting tuples which is uploaded by current user
$que="Select * from userupload where Email='".$_SESSION['Email']."'";

//Hit the query
$result=mysqli_query($con,$que) or die("query error");

//finding no of rows
$num=mysqli_num_rows($result);


for($i=0;$i<$num;$i++)
{
	//fetching one tuple(row) at a time
	$val=mysqli_fetch_array($result);
	echo  "<div id='floating-box'>".$val['Name'].'<br>'.$val['imageName'].'<br>'.$val['imagePath'].'<br>'.'<br>' ."</div>";
}

?>