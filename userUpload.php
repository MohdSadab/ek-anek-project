<?php
session_start();
//this is used for preventing direct accessing the page
if(!isset($_SESSION['Email']))
	header("LOCATION:http://localhost/signin.php");
//this is used for showing alert message on submit the data
if($_SESSION['submit'])
echo "<script> alert('Your File Has been Successfully Uploaded') </script>";
//this shows alert message when some error occur on uploading
if($_SESSION['error'])
echo "<script> alert('ERROR IN UPLOAD') </script>";
$_SESSION['error']=0;
$_SESSION['submit']=0;
?>



?>
<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8">    <!-- Use For Security Purpose Avoid From Cross Scripting -->
<meta content=""initial-scale=1,minimum-scale=1,width=device-width" name="viewport"> 
<meta content="HTML,CSS" name="keywords">
<meta content="Online Complaint" name="Complaints">
<meta content="author" name="Mohd Sadab">
<style type="text/css">

#comment{
	
  border-radius:5px;
	border-radius:10px;
	background-color:#E5FFCC;
}
#comment:focus{
	background-color:#CCFF99;
}
#name{
	height:30px;
	border-radius:5px;
  
}
#desc{
	height:30px;
	border-radius:5px;
  
}
#name[type="text"]:focus
{
	width:300px;
	background-color:#CCFF99;
}
#desc[type="text"]:focus
{
	width:300px;
	background-color:#CCFF99;
}

#select{
	height:10px;
	padding:10px;
    margin:0px;
	border-radius:5px;
	background-color:#E5FFCC;
	//padding:10px;
}
#select:focus{
	background-color:#CCFF99;
	width:300px;
}
form
{
width:50%;
  height:300px;
  padding:30px;
  margin:auto;
  position:absolute;
  top:220px;
  //background-image:url("swachh.jpg");
  left:0;
  right:0;
  bottom:0;
}
/*
h3{
	list-style-type:none;
	margin:0px;
	padding:10px;
	position:fixed;
	overflow:hidden;
	height:50px;
	background-color:KHAKI;
	top:0px;
	text-align:center;
	color:GREEN;
	width:100%;
	border-radius:5px;
	z-index:999;
}*/
h2
{
	height:350px;
	width:400px;
    padding:30px;
 
  margin:auto;
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
}
h4{
	color:WHITE;
}
body{
	margin:0;
}
ul
{
	list-style-type:none;
	margin:0px;
	padding:0px;
	position:fixed;
	overflow:hidden;
	background-color:BLUE;
	
	top:85px;
	width:100%;
	border-radius:4px;
	z-index:999;
}

li {
  float:left;	
}
li a{
	display:block;
	color:white;
	text-decoration:none;
	padding:14px 16px;
	text-align:center;
	
}

.active
{
	background-color:GREEN;
}

li a:hover:not(.active)
{
	background-color:#111;
}

h2{
	color:WHITE;
	//position:fixed;
}
button{
	margin:8px;
	top:0px;
	padding-bottom:1px;
	background-color:CLAY;
	border-radius:4px;
	height:30px;
}
button:hover{
	opacity:0.8;
}
#image{
	position:fixed;
	height:100px;
	top:0px;
	width:20%;
	border-radius:5px;
	z-index:999;
}

.header{
	
	position:fixed;
	height:150px;
	top:-30px;
	
	//text-align:center;
	color:white;
	background-color:#00cc66;
	width:100%;
	z-index:999;
}
body{
	background-color:#444;
}
#head{
	text-align:center;
	color:PURPLE;
	z-index:999;
	position:fixed;
}
</style>
<script>
 function temp()
 {
	 
	alert("You Have Successfull logout");
	
 }
</script>
</head>
<body>
<div class="header">

</div>
 

<ul>
<li><a href="http://localhost/userUpload.php" class="active">HOME</a></li>
<li><a href="http://localhost/viewFile.php">VIEW FILES</a> </li>
<li onclick="return temp()"> <a href="user_logout.php">LOGOUT </a></li>
</ul>
<div  style="padding:20px;margin-top:30px;background-color:#444;height:1500px;">

</div>
<form method="POST" action="http://localhost/Upload.php" enctype="multipart/form-data">

<table>
<tr>
<td>
<input type="text"  id="name" placeholder=" Enter File Name" name="name" required />
</td>
</tr>
<tr><td>
<input type="text"  id="desc" placeholder=" Description " name="desc" />
</td>
</tr>

<tr><td>
<input type="file" name="uploadFile" id="uploadFile"/>
<button type="Submit"  class="submit" >SUBMIT</button>
</tr></td>
</table>
</form>

</body>
</html>
