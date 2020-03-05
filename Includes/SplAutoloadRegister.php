<?php

/**
 * Secuting the file from browser access
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die('Unauthrized access');
}

spl_autoload_register("splAutoloadRegister");

function splAutoloadRegister($className)
{
    $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "Classes" . DIRECTORY_SEPARATOR;
    $ext = ".php";
    require_once $path . $className . $ext;
}
session_start();
