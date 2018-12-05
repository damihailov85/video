<?php
$sel = $mysqli->query("SELECT * FROM `workout` WHERE `name`='".$name."'");
$sel->data_seek(0);
$res = $sel->fetch_assoc();
$id = $res['id'];
$description = $res['description'];
$coach = $res['coach'];
$duration = $res['duration'];

$morning = 0;
$tags = [];
$sel = $mysqli->query("SELECT * FROM `tag` WHERE `workout_id`='".$id."'");
for($i=0;$i<$sel->num_rows; $i++){
    $sel->data_seek($i);
    $res = $sel->fetch_assoc();
    $tags[$i] = $res['name'];

    if ($res['name']=='утро'||$res['name']=='утроворк'||$res['name']=='Утро'){
        $morning = 1;
    }
}

if ($morning==1){
    echo "<a href='warmup.php?back_to=$name'>Разминка</a>";
}

echo '<video width="'.$width.'" controls="controls"><source src="video/'.$name.'"></video>';
        
echo "<div id='info'><div class='description'>Описание: $description</div>
            <div class='description'>Куратор: $coach</div>
            <div class='description'>Продолжительность: $duration</div>";

for ($i = 0; $i < count($tags); $i++){
    echo "<div class='tag'>".$tags[$i]."</div>";
}

echo "</div>";

$tag_str = json_encode($tags);

?>

<script>
      var tags = JSON.parse('<?php echo $tag_str; ?>');

      function editInfo() {

var form = '<form action="edit_info.php" method="POST"><input type="hidden" name="id" value="<?php echo $id; ?>">' +
                '<table><tr><td>Описание</td>' + 
                    '<td><textarea name="description" cols="40" rows="3"><?php echo $description;?></textarea></td>' + 
                    '</tr><tr><td>Тренер</td>' + 
                    '<td><input type="text" name="coach" value ="<?php echo $coach;?>"></td>' +
                    '</tr><tr><td>Продолжительность</td>' + 
                    '<td><input type="text" name="duration" value =<?php echo $duration;?>></td>' +
                    '</tr><tr><td>Теги<br/>(через пробел)</td>' +
                    '<td><textarea name="tags" cols="40" rows="3">';
for (i=0; i<tags.length; i++){
    form += tags[i] + " ";

}
                   
form += '</textarea></td></tr></table><input type="submit" value="Отправить"></p></form>';
document.getElementById('info').innerHTML = form;
document.getElementById('buttons').innerHTML = '';
}
</script>

        <div id="buttons">
            <div class="button-upd" onclick="editInfo();">Редактировать</div>
            <div class="button-del" onclick="deleteVideo('<?php echo $_GET['name']; ?>');">Удалить</div>
        </div>