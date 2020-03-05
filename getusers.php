<?php
include_once 'includes/SplAutoloadRegister.php';

use Users\User;

$User = new User;
$result = $User->getAllUsers();


var_dump($result);