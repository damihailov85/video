<?php 
include('authorize.php'); 
include('config.php');
$width = '90%';
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/workout.css">
    <link rel="stylesheet" href="css/warmup.css">
    <script src="js/jquery.js"></script>
    <script src="js/help.js"></script>
    <script src="js/workout.js"></script>
    <title>Тренировка</title>
</head>
<body>



<div class="page">

<?php include('php/links.php'); ?>
    
    <div class="content">
        <a href="workout.php?name=<?php echo $_GET['back_to']; ?>">Назад</a>
        <div class="row">
            <div class="col">
                <?php 
                    $name = '011.mp4';
                    require('php/video.php'); 
                ?>
            </div> 
            <div class="col">
                <?php 
                    $name = '012.mp4';
                    require('php/video.php'); 
                ?>
            </div> 
        </div>
    </div>
</div>
</body>
</html>