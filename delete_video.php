<?php
include('config.php');

if (isset($_GET['name'])) {

    // удалить запись из workout, взяв id
    $sel = $mysqli->query("SELECT * FROM `workout` WHERE `name`='".$_GET['name']."'");
    $sel->data_seek(0);
    $res = $sel->fetch_assoc();
    $id = $res['id'];
    
    $del = $mysqli->query("DELETE FROM `workout` WHERE `name`='".$_GET['name']."'");

    // удалить все привязанные теги
    $del = $mysqli->query("DELETE FROM `tag` WHERE `workout_id`=".$id);

    // удалить файл
    unlink('video/'.$_GET['name']);

    header('Location: workout_search.php');


}


?>