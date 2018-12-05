<?php include('authorize.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/workout.css">
    <script src="js/jquery.js"></script>
    <title>Document</title>
</head>
<body>

<div class="page">
    <?php include('php/links.php'); ?>
    <div class="content">
        <?php include('incl/index_content.html'); ?>
        <?php 
            require('php/index_video.php'); 
            require('php/video.php'); 
        ?>
    </div>
</div>

</body>
</html>