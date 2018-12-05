<?php include('config.php'); 
header("Content-Type: text/html; charset=utf-8");

if($_FILES['f']['error'] == 0){

    $ins = $mysqli->query("INSERT INTO `workout` (`name`) VALUES ('00000.mp3')"); // такого имени точно нет

    $sel = $mysqli->query("SELECT * FROM `workout` WHERE name='00000.mp3'");
    $sel->data_seek(0);
    $res = $sel->fetch_assoc();


    $temp = $_FILES['f']['tmp_name'];

    echo $temp."<br/>";

    $type = explode(".", $_FILES['f']['name']);

    echo $type[1]."<br/>";

    $name_file = ($res['id']+1000).'.'.$type[1];
    move_uploaded_file($temp, "video/".$name_file);


    echo $_POST['description']."/".$_POST['coach']."/".$_POST['duration']."<br/>";


    $description = (isset($_POST['description'])) ? $_POST['description'] : 0;
    $coach = (isset($_POST['coach'])) ? $_POST['coach'] : 'Не указан';
    $duration = (isset($_POST['duration'])) ? $_POST['duration'] : 0;

    $query_upd = "UPDATE `workout` SET `name`='".$name_file."', 
    `description`='".$description."',
    `coach`='".$coach."',
    `duration`=".$duration.
    " WHERE `id`=".$res['id'];

    $upd = $mysqli->query($query_upd);

    echo $query_upd."<br/>";
  
    if (isset($_POST['tags'])) {

        $tag = explode(" ", $_POST['tags']);
        for ($i=0; $i < count($tag); $i++){
            $ins = $mysqli->query("INSERT INTO `tag`(`name`, `workout_id`) VALUES ( '".$tag[$i]."', ".$res['id']." )");
        }
    }
    echo "<script type='text/javascript'>location.replace('workout.php?name=".$name_file."');</script> ";
}

else {
    echo "<script type='text/javascript'>alert('Что-то пошло не так...');</script> ";
  //  echo "<script type='text/javascript'>location.replace('download.php');</script> ";

}

?>