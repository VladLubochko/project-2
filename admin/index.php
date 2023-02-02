<?php

define("CALL_INDEX", true);

if ($_GET['id'] === 'error') {
    die("Даже не пытайтесь запустить файл explorer.php напрямую из адресной строки. <br><a href='./index.php'>Перейти на index.php</a>");
}

if ($_GET['id'] === 'upl') {
    $path = $_SERVER['DOCUMENT_ROOT'];
    header("Location: ./explorer.php?path=$path/uploads");
    exit;
}

if (empty($_GET['path'])) {
    $path = $_SERVER['DOCUMENT_ROOT'];
    header("Location: ./explorer.php?path=$path");
    exit;
}