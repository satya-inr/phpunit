<?php
include_once 'includes/SplAutoloadRegister.php';

use Users\User;

$User = new User;
$result = $User->createUser('satyanarayana', '12345678');
?>

<h1>Registration</h1>
<h3>You are registered as satyanarayana. Proceed to <a href="/login.php">Login</a></h3>

<p>Register user name is predefined in code. For successful registration, change the username edit the file `register.php` in root directory.</p>
<p>If you follow the above step, You have to change your `username` and `password` in `login.php` files. Else it will login with the predefined login credentials.</p>

<p><a href="/">Back</a></p>