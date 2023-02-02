<?php
require_once './header.php';

$path = $_GET['path'];
if (empty($_GET['path'])) {
    die("Вызов файла add_dir.php без рараметра path запрещён.");
} elseif (!empty($_GET['path']) && !empty($_GET['newDir'])) {
    addDir($_GET['path'], $_GET['newDir']);
}

function addDir($path, $newDir)
{
    $newDir = $path . '/' . $newDir;

    if (file_exists($newDir)) {
        echo "Папка уже существует";
    } else {
        mkdir($newDir, 0755);
        header("Location: ./explorer.php?path=$path");
        exit;
    }
}
?>

<div class="form">
    <form enctype="multipart/form-data" action="./add_dir.php" method="get">
        <fieldset>
            <legend>Создание новой папки</legend>
        <div class="form_field">
            <label>Путь <input class="input_path" type="text" name="path" value="<?php echo $path ?>" readonly></label>
            <input class="input_newdir" type="text" name="newDir" placeholder="Имя новой папки">
            <button>Создать</button>
        </div>
        </fieldset>
    </form>
</div>

<?php
require_once './footer.php';
