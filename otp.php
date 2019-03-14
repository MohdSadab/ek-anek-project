<?php
session_start();
$email=isset($_POST['Email'])?$_POST['Email']:'';
$to = $email;
$subject = "One time Password";
$txt = mt_rand(100000,999999);
$headers = "webmaster@gmail.com" . "\r\n".
"CC: somebodyelse@example.com";
//mail($to,$subject,$txt,$headers);   //it is used for mail sending uncomment it when you upload it on server

//saving the information of user in SESSION array
$_SESSION['Fname']=isset($_POST['FNAME'])?$_POST['FNAME']:'NOT NULL';
$_SESSION['Lname']=isset($_POST['LNAME'])?$_POST['LNAME']:'NOT NULL';
$_SESSION['Email']=isset($_POST['Email'])?$_POST['Email']:'';
$_SESSION['Mob']=isset($_POST['Mno'])?$_POST['Mno']:'';
$password=isset($_POST['pass'])?$_POST['pass']:'';
$_SESSION['pass']=md5($password); // saving the password in ecrypted form
$_SESSION['otp']=$txt; //it is used just for saving the otp 
header("Location:http://localhost/redirect.php"); // jump to next page which verify mail
?>