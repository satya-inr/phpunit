<?php include_once 'includes/SplAutoloadRegister.php';


if (isset($_SESSION['user_name'])) {
    session_destroy();
    echo "<script>location.replace('/')</script>";
    exit;
}
