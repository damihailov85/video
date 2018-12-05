<?php

$sel = $mysqli->query("SELECT DISTINCT `name` FROM `tag` ORDER BY `name`");
$tag_arr = [];
if ($sel->num_rows>0) {
    for($i=0;$i<$sel->num_rows; $i++){
        $sel->data_seek($i);
        $res = $sel->fetch_assoc();
        $tag_arr[$i] = $res['name'];
    }
    $tag_str = json_encode($tag_arr);
}

?>