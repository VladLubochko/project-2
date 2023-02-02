<?php
function reDirect($newPage)
{
    $projectFolder = $_SERVER['HTTP_HOST'];
    $dir = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$projectFolder$dir/$newPage");
    exit;
}

if (!defined("CALL_INDEX") && empty($_GET['path'])) {
    reDirect('index.php?id=error');
}
