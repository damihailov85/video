<?php

include('../config.php');

if (isset($_POST['old_str'])&&isset($_POST['new_str'])) {
    $upd = $mysqli->query("UPDATE `tag` SET `name`='".$_POST['new_str']."' WHERE `name`='".$_POST['old_str']."'");
    echo 'ok';
}

?>