<?php
require_once './header.php';

$path = $_GET['path'];
if (empty($_GET['path'])) {
    die("Вызов файла add_dir.php без рараметра path запрещён.");
} elseif (!empty($_GET['path']) && !empty($_GET['newFile'])) {
    addFile($_GET['path'], $_GET['newFile']);
}

function addFile($path, $newFile)
{
    $newFile = $path . '/' . $newFile;

    if (file_exists($newFile)) {
        echo "Файл с таким именем уже существует.";
    } else {
        fopen($newFile, 'w+');
        header("Location: ./explorer.php?path=$path");
        exit;
    }
}
?>

    <div class="form">
        <form enctype="multipart/form-data" action="./add_file.php" method="get">
            <fieldset>
                <legend>Создание нового файла</legend>
                <div class="form_field">
                    <label>Путь <input class="input_path" type="text" name="path" value="<?php echo $path ?>" readonly></label>
                    <input class="input_newfile" type="text" name="newFile" placeholder="Имя нового файла">
                    <button>Создать</button>
                </div>
            </fieldset>
        </form>
    </div>

<?php
require_once './footer.php';
