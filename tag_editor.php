<?php 
header("Content-Type: text/html; charset=utf-8");
include('config.php'); 
include('authorize.php'); 
include('php/tag_list.php');
echo "<script> var tag_str='$tag_str' ; var tag_del = []; </script>";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/editor.css">
    <script src="js/jquery.js"></script>
    <script src="js/help.js"></script>

    <title>Редактор тегов</title>
</head>
<body>

<div class="page">
    <?php include('php/links.php');   ?>


<span class="title">Удаление:</span>
<div id="tags-del"></div>
<div class="button"><a id="b1" href="tag_delete.php">Удалить все упоминания выделенных тегов</a></div>

<span class="title">Редактирование:</span>
<div id="tags-edit"></div>


</div>




    <script src="js/tag_editor.js"></script>
</body>
</html>