<?php include('authorize.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/download.css">
    <script src="js/jquery.js"></script>
    <script src="js/help.js"></script>
    <title>Загрузчик</title>
</head>
<body>


<div class="page">
    <?php include('php/links.php'); ?>
    
<form enctype="multipart/form-data" action="download_file.php" method="POST">
<table>
    <tr>
        <td>Выбери файл<input type="hidden" name="MAX_FILE_SIZE" value="1000000000" /></td>
        <td><input type="file" name="f" accept="video/*"></td>
    </tr>
    <tr>
        <td>Описание</td>
        <td><textarea name="description" cols="40" rows="3"></textarea></td>
    </tr>
    <tr>
        <td>Тренер</td>
        <td><input type="text" name="coach"></td>
    </tr>
    <tr>
        <td>Продолжительность</td>
        <td><input type="text" name="duration"></td>
    </tr>
    <tr>
        <td>Теги<br/>(через пробел)</td>
        <td><textarea name="tags" cols="40" rows="3"></textarea></td>
    </tr>
</table>

    <input type="submit" value="Отправить"></p>
</form> 

</div>


</body>
</html>