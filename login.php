<?php
include_once 'includes/SplAutoloadRegister.php';

use Users\User;

$User = new User;
echo $User->userLogin('satyanarayana', '12345678');
?>

<p><a href="/">Back</a></p>