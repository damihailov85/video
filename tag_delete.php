<?php 
include('authorize.php'); 
include('config.php');

if (isset($_GET['tag_str'])){
    $tags = json_decode($_GET['tag_str']);
    for ($i=0; $i<count($tags); $i++){
        $del = $mysqli->query("DELETE FROM `tag` WHERE `name`='".$tags[$i]."'");
    }

    echo "<script type='text/javascript'>location.replace('tag_editor.php');</script>";
}

else {
    echo "<script type='text/javascript'>alert('Чтобы что-то удалить надо что-то выбрать...'); location.replace('tag_editor.php');</script>";
}






?>