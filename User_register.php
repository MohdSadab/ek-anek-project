<!DOCTYPE HTML>
<HTML>
<HEAD>
<style>
body
{
background-color:Grey;
}
table
{
text-color:BLUE;
}
#FNAME{
padding:7px;
border-radius=4px;
margin:auto;
position:absolute;
top:180px;
left:260px;
width:150px;
}

#FNAME:focus{
width:200px;
}
#LNAME{
padding:7px;
border-radius=4px;
margin:auto;
position:absolute;
top:180px;
left:480px;
width:150px;
}

#LNAME:focus{
width:200px;
}
#CEmail{
padding:7px;
border-radius=4px;
margin:auto;
position:absolute;
top:260px;
left:260px;
width:350px;;
}
#CEmail:focus{
width:450px;
}
#Email{
padding:7px;
border-radius=4px;
margin:auto;
position:absolute;
top:220px;
left:260px;
width:350px;
}
#Email:focus{
width:450px;
}
#Mno{
padding:7px;
border-radius=4px;
margin:auto;
position:absolute;
top:300px;
left:260px;
width:350px;
}
#Mno:focus{
width:450px;
}
#pass{
padding:7px;
border-radius=4px;
margin:auto;
position:absolute;
top:340px;
left:260px;
width:350px;
}
#pass:focus{
width:450px;
}
#cpass{
padding:7px;
margin:auto;
position:absolute;
top:380px;
left:260px;
width:350px;
}
#cpass:focus{
width:450px;
}
#Submit{
padding:7px;
margin:auto;
position:absolute;
top:420px;
left:270px;
background-color:LIGHTGREY;
width:350px;
}
</style>
</HEAD>
<BODY>
<script>
//this functions for client site checking
//function nameValidation() check whether name containing only alphabets or not  
function nameValidation(){
	var x=document.getElementById('FNAME');
 var val=x.value;
 for(var i=0;i<val.length;i++)
 {
	 if(!((val[i]>='a' && val[i]<='z') || (val[i]>='A' && val[i]<='Z')))
	 {
	alert('Please enter valid name');
    x.focus;
    return false; 
   }
 }
 return(true);
}
//function lnameValidation() check whether name containing only alphabets or not  
function lNameValidation()
{
	var x=document.getElementById('LNAME');
 var val=x.value;
 for(var i=0;i<val.length;i++)
 {
	 if(!((val[i]>='a' && val[i]<='z') || (val[i]>='A' && val[i]<='Z')))
	 {
	   alert('Please enter valid name');
    x.focus;
    return false; 
	   
	 }
 }
 return(true);
}
  //function Mobile() check whether it containing only No's or not  
 function Mobile()
 { 
 var x=document.getElementById('Mno');
  var val=x.value;
 for(p=0;p<val.length;p++)
 {
 if(val[p]>='0' && val[p]<='9' )
   continue;
   else
  {
	 alert('Please enter valid no');
    x[4].focus;
    return false; 
   }
    
 }
 return(true);
 }

 //function emailValidation() check whether given format is vailid email format or not  
 function emailValidation(){
   var email = document.getElementsByClassName('Email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email[0].value)) {
    alert('Please provide a valid email address');
    email[0].focus;
    return false;
  }
  return(true);
  }
  
  //function confirmEmail() check whether it is same as above or not
  function confirmEmail()
  {
	 var x=document.getElementsByClassName('Email');
  if(x[0].value !=x[1].value)
	 {
	alert('Please enter email same as above');
    x[1].focus;
    return false; 
   }
return(true);   
  }
  //function confirmPass() check whether it is same as above or not 
  function confirmPass()
  {
	   var x=document.getElementsByClassName('pas');
   if(x[0].value!=x[1].value)
   {
	 alert('Please enter pass same as above');
    x[1].focus;
    return false; 
   }
   return(true);
}
function formValidation()
{
	return(nameValidation() && lNameValidation() &&  emailValidation() &&  confirmEmail() && Mobile() && confirmPass());
}
</script>
<!-- if formValidation() return true it will goes to next page(otp.php) -->
<form action="http://localhost/otp.php" method="post" onsubmit="return formValidation()" > 
<table>
<tr>
<td><INPUT TYPE='TEXT'  placeholder="First Name" ID='FNAME' name='FNAME'  required /></td> 
<td> <INPUT placeholder="Last Name" TYPE='TEXT' ID='LNAME' name='LNAME' required / > </td>
</tr>
<tr>
<td> <INPUT placeholder="E-mail@gmail.com" TYPE='TEXT' class='Email' name='Email'  id='Email' required /> </td>
</tr>
<tr>
<td> <INPUT placeholder="Confirm Email" TYPE='TEXT'  class='CEmail'  id='CEmail' required /> </td>
</tr>
<tr>
<td> <INPUT placeholder="Mobile-No" TYPE='TEXT' ID='Mno' name='Mno' /> </td>
</tr>
<tr>
<td> <INPUT placeholder="Password" TYPE='Password' class='pass' name='pass' id='pass' required /> </td>
</tr>
<tr>
<td> <INPUT placeholder="Confirm Password" TYPE='Password' class='pas' id='cpass' required /> </td>
</tr>
<tr>
<td> <INPUT TYPE='Submit' ID='Submit'/> </td>
</tr>
</table>
</form>
</BODY>
</HTML>
