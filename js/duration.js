var interval = [0, 120];

function createDurationList(){
    for (i=0;i<6;i++){
            var time = (i+1)*10;
            document.getElementById('duration-from').innerHTML += '<div class="time" id="from' + time + '" style="background-color: #ccc; color: #333;" onclick="timeSel(\'from\','+time+');">' + time + '</div>';
            document.getElementById('duration-to').innerHTML += '<div class="time" id="to' + time + '" style="background-color: #ccc; color: #333;" onclick="timeSel(\'to\','+time+');">' + time + '</div>';
    }
}

function timeSel(q, time) {
    for (i=0;i<6;i++){
        var j = (i+1)*10;
        document.getElementById(q+j).style.backgroundColor='#ccc';
        document.getElementById(q+j).style.color='#333';
    }

    w = (q=='to') ? 1 : 0;
    if (interval[w] != time) {
        document.getElementById(q+time).style.backgroundColor='#333';
        document.getElementById(q+time).style.color='#ccc';
        interval[w] = time;
    }
    else {
        interval[w] = (q=='to') ? 120 : 0;
    }
    console.log(q + "/" + time + "/" + (q=='to') + "/" + interval[w]);
    
    changeLinks();

}