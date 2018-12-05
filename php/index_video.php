<?php
require('config.php');

$text = '';

if (date("G")>7) {
    $text = 'NOT';
}

    $sel = $mysqli->query("SELECT * FROM `tag` WHERE `name` ".$text." LIKE '%утро%'");

    $num = rand(0, $sel->num_rows);
    $sel->data_seek($num);
    $res = $sel->fetch_assoc();

    $sel = $mysqli->query("SELECT * FROM `workout` WHERE `id`=".$res['workout_id']);
    $sel->data_seek(0);
    $res = $sel->fetch_assoc();
    $name = $res['name'];
    $width = '100%';
    echo '<span class="title">-Случайная тренировка-<br/><span class="subtitle">(Воспользуйся поиском в кнопке "Потренить", если хочешь что-то конкретное)</span></span><br/>';


?>