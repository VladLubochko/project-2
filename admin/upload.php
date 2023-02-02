<?php
require_once './header.php';
?>

    <div class="form">
        <form action="uploader.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Загрузка файлов на сервер</legend>
                <div class="form_field">
                    <input type="file" multiple name="files[]">
                    <button>Отправить</button>
                </div>
            </fieldset>
        </form>
    </div>


<?php
require_once './footer.php';
