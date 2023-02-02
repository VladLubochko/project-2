<?php
require_once './header.php';

$path = $_GET['path'];
if (empty($_GET['path'])) {
    die("Вызов файла add_dir.php без рараметра path запрещён.");
} elseif (!empty($_GET['path']) && !empty($_GET['oldNameFile']) && !empty($_GET['newNameFile'])) {
    renameFile($_GET['path'], $_GET['oldNameFile'], $_GET['newNameFile']);
}

function renameFile($path, $oldNameFile, $newNameFile)
{
    $oldNameFile = $path . '/' . $oldNameFile;
    $newNameFile = $path . '/' . $newNameFile;

    if (!file_exists($oldNameFile)) {
        echo "Файл с таким именем не существует.";
    } elseif (file_exists($newNameFile)) {
        echo "Файл с новым именем уже существует.";
    }else{
        rename($oldNameFile, $newNameFile);
        header("Location: ./explorer.php?path=$path");
        exit;
    }
}
?>

    <div class="form">
        <form enctype="multipart/form-data" action="./rename_file.php" method="get">
            <fieldset>
                <legend>Переименование файла</legend>
                <div class="form_field">
                    <label>Путь <input class="input_path" type="text" name="path" value="<?php echo $path ?>" readonly></label>
                    <input class="input_old_name_file" type="text" name="oldNameFile" placeholder="Текущее имя файла">
                    <input class="input_new_name_file" type="text" name="newNameFile" placeholder="Новое имя файла">
                    <button>Переименовать</button>
                </div>
            </fieldset>
        </form>
    </div>

<?php
require_once './footer.php';
