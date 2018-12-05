<?php

$sel = $mysqli->query("SELECT DISTINCT `coach` FROM `workout` ORDER BY `coach`");
$coach_arr = [];
if ($sel->num_rows>0) {
    for($i=0;$i<$sel->num_rows; $i++){
        $sel->data_seek($i);
        $res = $sel->fetch_assoc();
        $coach_arr[$i] = $res['coach'];

    }
}
else {
    $coach_arr[0] = 'no_result';
}

$coach_str = json_encode($coach_arr);

?>