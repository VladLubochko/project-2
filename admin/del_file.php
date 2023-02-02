<?php
require_once './header.php';

$path = $_GET['path'];
if (empty($_GET['path'])) {
    die("Вызов файла add_dir.php без рараметра path запрещён.");
} elseif (!empty($_GET['path']) && !empty($_GET['delFile'])) {
    delFile($_GET['path'], $_GET['delFile']);
}

function delFile($path, $delFile)
{
    $delFile = $path . '/' . $delFile;

    if (!file_exists($delFile)) {
        echo "Файл с таким именем не существует.";
    } else {
        unlink($delFile);
        header("Location: ./explorer.php?path=$path");
        exit;
    }
}
?>

    <div class="form">
        <form enctype="multipart/form-data" action="./del_file.php" method="get">
            <fieldset>
                <legend>Удаление файла</legend>
                <div class="form_field">
                    <label>Путь <input class="input_path" type="text" name="path" value="<?php echo $path ?>" readonly></label>
                    <input class="input_delfile" type="text" name="delFile" placeholder="Имя удаляемого файла">
                    <button>Удалить</button>
                </div>
            </fieldset>
        </form>
    </div>

<?php
require_once './footer.php';
