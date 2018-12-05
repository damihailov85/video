<?php 
header("Content-Type: text/html; charset=utf-8");
include('authorize.php'); 
include('config.php');
include('php/tag_list.php');
include('php/coach_list.php');

$query = "SELECT * FROM `workout` WHERE `duration`>0";
$sel = $mysqli->query($query);
$q1 = $sel->num_rows;
$query = "SELECT * FROM `workout`";
$sel = $mysqli->query($query);
$q2 = $sel->num_rows;

$ratio = round(100*$q1/$q2);

?>

<script> 
    var tag_str = '<?php echo $tag_str; ?>';
    var coach_str = '<?php echo $coach_str; ?>';

    var coach = 'any';
</script>

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
    <script src="js/coaches.js"></script>
    <script src="js/tags.js"></script>
    <script src="js/duration.js"></script>
    <title>Тренировки</title>
</head>
<body>

<div class="page">
    <?php include('php/links.php'); ?>
    
    <div class="content">
        
        <div class="block coach-list">
            <div class="title">-Куратор-</div>
            <div id="coaches"></div>
        </div>

        <div class="block tag-list">
            <div class="title">-Теги-</div>
            <div id="tags"></div>
        </div>
        
        <div class="block duration-list">
            <div class="title">-Продолжительность- <br/><span>(на данный момент продолжительность указана для <?php echo $ratio; ?> % тренировок)</span></div>
            <div id="duration">
                <div class="time-list" id="duration-from">
                    От:
                </div>
                <div class="time-list" id="duration-to">
                    До:
                </div>
            </div>
        </div>
        
        <div class="block">
            <div class="buttons">
                <div class="button"><a id="b1" href="workout_list.php?type=rnd">Запустить случайную</a></div>
                <div class="button"><a id="b2" href="workout_list.php?type=list">Показать список</a></div>
            </div>
        </div>
    </div>
</div>


<script> 
    createCoachList();
    createTagList(); 
    createDurationList(); 
    var button_rnd = document.getElementById('b1').href; 
    var button_list = document.getElementById('b2').href; 
</script>
</body>
</html>