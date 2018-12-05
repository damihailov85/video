<?php 
include('config.php');

$query = "UPDATE `workout` SET `description`='".$_POST['description']."', `coach`='".$_POST['coach']."', `duration`=".$_POST['duration']." WHERE `id`=".$_POST['id'];
$upd = $mysqli->query($query);

if (isset($_POST['tags'])){
    $sel = $mysqli->query("SELECT * FROM `tag` WHERE `workout_id`='".$_POST['id']."'");
    $cur_tag = [];
    for($i=0;$i<$sel->num_rows; $i++){
        $sel->data_seek($i);
        $res = $sel->fetch_assoc();
        $cur_tag[$i] = $res['name'];
    }

    $new_tag = explode(" ", $_POST['tags']);

    for ($i=0; $i<count($new_tag); $i++){
        $match = 0;
        for ($j=0; $j<count($cur_tag); $j++){
            if ($new_tag[$i]==$cur_tag[$j]) {
                $match = 1;
                break;
            }
        }
        if ($match==0){
            if (isset($new_tag[$i])&&$new_tag[$i]!=''&&$new_tag[$i]!=" "){
                $query = "INSERT INTO `tag` (`name`, `workout_id`) VALUES ('".$new_tag[$i]."', ".$_POST['id'].")";
                $ins = $mysqli->query($query);
            }
        }
    }

    for ($i=0; $i<count($cur_tag); $i++){
        $match = 0;
        for ($j=0; $j<count($new_tag); $j++){
            if ($cur_tag[$i]==$new_tag[$j]) {
                $match = 1;
                break;
            }
        }
        if ($match==0){
            $query = "DELETE FROM `tag` WHERE `name`='".$cur_tag[$i]."' AND `workout_id`=".$_POST['id'];
            $del = $mysqli->query($query);
        }
    }
}
else {
    $query = "DELETE FROM `tag` WHERE `workout_id`=".$_POST['id'];
    $del = $mysqli->query($query);
}


$sel = $mysqli->query("SELECT * FROM `workout` WHERE `id`='".$_POST['id']."'");
$sel->data_seek(0);
$res = $sel->fetch_assoc();
$name = $res['name'];

echo "<script type='text/javascript'>location.replace('workout.php?name=".$name."');</script> ";



?>