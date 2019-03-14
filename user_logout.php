<?php
session_start();
session_destroy(); // ending the session of user
header("Location:http://localhost/signin.php"); // jump to signin page

?>