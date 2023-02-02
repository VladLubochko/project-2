<?php

if (empty($_GET['path'])) {
    $path = $_SERVER['DOCUMENT_ROOT'];
    echo '<div class="path">' . $path . "</div>";
    scanToArray($path);
} else {
    $path = $_GET['path'];
    if (is_dir($path)) {
        echo '<div class="path">' . $path . "</div>";
        scanToArray($path);
    } else if (file_exists($path)) {
        require_once './read_file.php';
        viewFile($path);
    } else
        echo 'Ошибка параметра path.';
}

function scanToArray($dir)
{
    $listDir = [];
    $listFiles = [];

    foreach (scandir($dir) as $fileName) {
        if ($fileName === '..') {
            $fileName = '..';
            $filePath = dirname($dir);
            if (strlen($filePath) == 3) {
                $filePath = substr($filePath, 0, 2);
            }
            $listDir['dirName'][] = $fileName;
            $listDir['dirPath'][] = $filePath;
        }
    }

    foreach (scandir($dir) as $fileName) {
        if ($fileName === '.' || $fileName === '..') {
            continue;
        } else {
            $filePath = $dir . '/' . $fileName;
        }

        if (is_dir($filePath)) {
            $listDir['dirName'][] = $fileName;
            $listDir['dirPath'][] = $filePath;
        } else {
            $listFiles['fileName'][] = $fileName;
            $listFiles['filePath'][] = $filePath;
        }
    }

    listingDir($listDir);
    listingFiles($listFiles);

    return 1;

}

function listingDir($arr)
{
    if ($arr['dirName'] !== null) {
        for ($i = 0; $i < count($arr['dirName']); $i++) { ?>
            <div class="dir"><a class="link_dir"
                   href="./explorer.php?path=<?php echo $arr['dirPath'][$i] ?>"><?php echo $arr['dirName'][$i] ?></a>
            </div>
            <?php
        }
    }
}

function listingFiles($arr)
{
    if ($arr['fileName'] !== null) {
        for ($i = 0; $i < count($arr['fileName']); $i++) { ?>
            <div class="file"><a class="link_file"
                   href="./explorer.php?path=<?php echo $arr['filePath'][$i] ?>"><?php echo $arr['fileName'][$i] ?></a>
            </div>
            <?php
        }
    }
}
