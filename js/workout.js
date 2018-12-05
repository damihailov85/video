

function videoList() {

    start = document.getElementById('start').value;
    end = document.getElementById('end').value;

    end++; end--;
    start++;start--;

    if (end>=video_array.length&&end!=9) {
        end = video_array.length;
        document.getElementById('button-add').innerHTML = '';
    }

    for (i=start; i<end; i++){
        if (video_array[i][3]==0) {
            var duration = '<span style="color:#f00; text-decoration: underline;" onclick="setDuration(\''+video_array[i][0]+'\');"> Не указано </span> ';
        }
        else {
            var duration = video_array[i][3];
        }
        
     //   getTags(video_array[i][4]);
        
        $bgc = j>0 ? '#ddd' : '#fff' ;
        document.getElementById('video-list').innerHTML += '<div class="row-video" style="background-color:' + $bgc + '">' + 
                                                                '<div id="col1">' + 
                                                                    '<video width="250" height="150" controls="controls"><source src="video/' + video_array[i][0] + '"></video>' + 
                                                                '</div>' + 
                                                                '<div id="col2">' + video_array[i][1] + '<br/>' + 
                                                                    'Куратор:' + video_array[i][2] + '<br/>' +
                                                                    'Продолжительность:' + duration + 'мин.<br/>' + 
                                                                    '<a href="workout.php?name=' + video_array[i][0] + '">Поехали!</a>' + 
                                                                '</div>' + 
                                                            '</div>';
        j *= -1;
    }

    if (end<video_array.length) {
        document.getElementById('start').value = end + 1;
        document.getElementById('end').value = end + 10;
    }
}

function deleteVideo(name) {
    var del = confirm("Удалить это видео?");

    if (del) {
        location.replace('delete_video.php?name=' + name);
    }
}

function getTags(id) {


    var url = 'php/get_tags.php'

    $.post( url , { id: id }).done(function(data) {
        data = JSON.parse(data);

    });

}


