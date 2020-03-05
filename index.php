<?php
include_once 'includes/SplAutoloadRegister.php';

if(isset($_SESSION['user_name'])){ 
 echo "<script>location.replace('home.php')</script>";
 exit;       
}
?>

<h1>Welcome Page</h1>

<p><a href="/login">Login</a>  |  <a href="/register">Register</a></p>


