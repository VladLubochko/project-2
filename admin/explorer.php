<?php

require_once './redirect_explorer.php';

require_once './header.php';

echo '<div class="container_options">';

echo '<div class="options"><a class="link_options" href="./add_dir.php?path=' . $_GET['path'] . '"><p>Add DIR</p></a></div>';
echo '<div class="options"><a class="link_options" href="./del_dir.php?path=' . $_GET['path'] . '"><p>Del DIR</p></a></div>';
echo '<div class="options"><a class="link_options" href="#"><p>Rename DIR</p></a></div>';
echo '<div class="options"><a class="link_options" href="./add_file.php?path=' . $_GET['path'] . '"><p>Add File</p></a></div>';
echo '<div class="options"><a class="link_options" href="./del_file.php?path=' . $_GET['path'] . '"><p>Del File</p></a></div>';
echo '<div class="options"><a class="link_options" href="./rename_file.php?path=' . $_GET['path'] . '"><p>Rename File</p></a></div>';
echo '<div class="options"><a class="link_options" href="#"><p>Edit File</p></a></div>';
echo '<div class="options"><a class="link_options" href="./upload.php"><p>Upload File</p></a></div>';


echo '</div>';

echo '<div class="container_panel">';

echo '<div class="left_container">';
require_once './scan_folder.php';
echo '</div>';




echo '</div>';

require_once './footer.php';

