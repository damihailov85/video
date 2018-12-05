<?php 
$tag_where = '';
$workout_where = '';
$tag_having = '';
if (isset($_GET['tag_str'])){
    $results = [];

    $tag_arr = json_decode($_GET['tag_str']);
    if (count($tag_arr)>0&&isset($tag_arr[0])){
        $tag_having = "HAVING COUNT(`tag`.`name`)=".count($tag_arr);
        $tag_where = "WHERE `tag`.`name`='".$tag_arr[0]."' ";
    }

    if (count($tag_arr)>1){
        for ($i=1; $i<count($tag_arr); $i++){
            $tag_where .= "OR `tag`.`name`='".$tag_arr[$i]."' ";
        }
    }

}

if (isset($_GET['interval'])||isset($_GET['coach'])){
    $workout_where = 'WHERE ';
}

if (isset($_GET['interval'])){
    $int_arr = json_decode($_GET['interval']);
    $workout_where .= "((`duration`>".$int_arr[0]." AND `duration`<".$int_arr[1].") OR `duration`=0)";
    if (isset($_GET['coach'])&&$_GET['coach']!='any'){
        $workout_where .= ' AND ';
    }
}

if (isset($_GET['coach'])){
    $coach = $_GET['coach'];
    if ($coach!='any'){
        $workout_where .= " `coach`='".$coach."'";
    }
}

if (!isset($_GET['tag_str'])||count($tag_arr)==0||!isset($tag_arr[0])){
    $query = "SELECT `name` AS `video`, `description`, `coach`, `duration` FROM `workout` ".$workout_where;
}

else {
    $query = "SELECT 
                    `tag`.*, `work`.`name` AS `video`, `work`.*, COUNT(`tag`.`name`) AS matches 
                    FROM `tag` 
                    JOIN (SELECT * FROM `workout` ".$workout_where.") AS `work` 
                    ON `tag`.`workout_id`= `work`.`id` 
                    ".$tag_where." 
                    GROUP BY `tag`.`workout_id`".$tag_having;

}

$sel = $mysqli->query($query);
if ($sel->num_rows>0) {
    for($i=0;$i<$sel->num_rows; $i++){
        $sel->data_seek($i);
        $res = $sel->fetch_assoc();

        $results[$i] = [$res['video'], $res['description'], $res['coach'], $res['duration'], $res['id']];
    }
}

$res_json = json_encode($results);

$search = ["'", "\""];
$replace = ["\'", "\\\""];
$res_json = str_replace($search, $replace, $res_json);

if ($_GET['type']=='rnd') {
    $num = rand(0, count($results)-1);
    echo "<script type='text/javascript'>location.replace('workout.php?name=".$results[$num][0]."');</script> ";
}


?>