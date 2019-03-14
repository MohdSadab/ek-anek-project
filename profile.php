

<?php
session_start(); // maintaining the session of user

//assigning the user input to the variable
$name=isset($_POST['name'])?$_POST['name']:"NOT NULL ";
$password=isset($_POST['pass'])?$_POST['pass']:" NOT NULL";

$con=mysqli_connect('localhost','root','') or die(mysqli_error()); // used connection stablishment 

mysqli_select_db($con,'profile'); // selecting database profile
	
$db="select * from profile"; // query for selecting all the column and rows from profile
$result=mysqli_query($con,$db);

$num=mysqli_num_rows($result);// return the no of rows
//if no of rows >0
if(mysqli_num_rows($result)>0)
{$check=0;
for($i=0;$i<$num;$i++)
{
	$val=mysqli_fetch_array($result); // this will fetch one row at a time
	
	if($val['Email']==$name && $val['pass']==md5($password)) //checking whether user is vailid or not
	{
		$check=1; //it is used as flag
		$_SESSION['Email']=$name;
        $_SESSION['submit']=0;	
        $_SESSION['error']=0;			// used for tracking the user 
		 
		header('Location:http://localhost/userUpload.php'); // if vailid user than jump on userUpload 
	}
}	
	if($check==0)
	{
		header('Location:http://localhost/signin.php'); 
		$_SESSION['log']=1;
	}

}
?>