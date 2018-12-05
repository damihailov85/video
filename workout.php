<?php 
include('authorize.php'); 
include('config.php');
$name = $_GET['name'];
$width = '100%';
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/workout.css">
    <script src="js/jquery.js"></script>
    <script src="js/help.js"></script>
    <script src="js/workout.js"></script>
    <title>Тренировка</title>
</head>
<body>



<div class="page">

<?php include('php/links.php'); ?>
    
    <div class="content">
        <?php 
            require('php/video.php'); 
        ?>
    </div>
</div>
</body>
</html>