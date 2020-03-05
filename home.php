<?php
include_once 'includes/SplAutoloadRegister.php';

if (!isset($_SESSION['user_name'])) {
    echo "<script>location.replace('/')</script>";
    exit;
}
?>

<h1>Home Page</h1>

<h3>Hello <?php echo $_SESSION['user_name']; ?>. Welcome on bord.</h3>

<p><a href="/logout">Getout</a></p>