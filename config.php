<?php

$mysqli = new mysqli("localhost:3306", "user", "password", "db");

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

if (!$mysqli->set_charset("utf8")) { 
    printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error); 
    exit(); 
}


?>