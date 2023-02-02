<?php
require_once './header.php';

$path = $_GET['path'];
if (empty($_GET['path'])) {
    die("Вызов файла add_dir.php без рараметра path запрещён.");
} elseif (!empty($_GET['path']) && !empty($_GET['delDir'])) {
    delDir($_GET['path'], $_GET['delDir']);
}

function delDir($path, $delDir)
{
    $delDir = $path . '/' . $delDir;

    if (!file_exists($delDir)) {
        echo "Папки с таким именем не существует.";
    } else if (count(glob("$delDir/*"))) {
        echo "Папка не пустая.";
    } else {
        rmdir($delDir);
        header("Location: ./explorer.php?path=$path");
        exit;
    }
}

?>

    <div class="form">
        <form enctype="multipart/form-data" action="./del_dir.php" method="get">
            <fieldset>
                <legend>Удаление папки</legend>
                <div class="form_field">
                    <label>Путь <input class="input_path" type="text" name="path" value="<?php echo $path ?>" readonly></label>
                    <input class="input_deldir" type="text" name="delDir" placeholder="Имя удаляемой папки">
                    <button>Удалить</button>
                </div>
            </fieldset>
        </form>
    </div>

<?php
require_once './footer.php';
