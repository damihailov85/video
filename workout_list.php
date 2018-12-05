<?php 
header("Content-Type: text/html; charset=utf-8");
include('authorize.php'); 
include('config.php');
include('php/search_result.php');
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
    <input type="hidden" name="start" id="start" value=0>
    <input type="hidden" name="end" id="end" value=0>
    <div class="content" id="ppp">
    <?php // echo "'".$res_json."'"; ?>
        <div id="video-list">
        </div>    
    </div>

</div>


<script>
    var video_str = '<?php echo $res_json; ?>' ;
    var video_array = JSON.parse(video_str);

    var j = 1;

    var start_list = 0;
    var end_list = video_array.length;

    document.getElementById('start').value = 0;
    document.getElementById('end').value = 9;

    if (end_list>10){
        end_list=10;
        document.getElementById('ppp').innerHTML += "<div id='button-add' onclick='videoList();'>Показать ещё</div>";
    }

videoList();

</script>

</body>
</html>