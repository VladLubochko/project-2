<?php

function viewFile($path){
    $df = fopen($path, 'r');
    if ($df === false) exit;
    $fz = round((filesize($path) / 1024 / 1024), 1);
    echo 'Размер файла ' . $fz . ' МБ<br>';
    echo '<hr>';
    if ($fz > 10 || is_executable($path)) {
        echo 'Я не читаю исполняемые файлы, а также любые файлы больше 10МБ.<br>';
        exit;
    }
    while (!feof($df)) {
        $content = fgets($df, 4096);
        echo $content . '<br>';
    }
    fclose($df);

    return 1;
}
