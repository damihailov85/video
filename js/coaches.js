var coach_array = JSON.parse(coach_str);
var coach_select = [];

function createCoachList(){
    for (i=0;i<coach_array.length;i++){
        if (coach_array[i]=='null'||(coach_array[i]+0)==0) {
            coach_array[i]='Не указан';
        }

        if (coach_array[i]!='no_result'){
            document.getElementById('coaches').innerHTML += '<div class="coach" id="coach' + i + '" style="background-color: #ccc; color: #333;" onclick="coachSel('+i+');">' + coach_array[i] + '</div>';
            tag_select[i] = 0;
        }
    }
    if (coach_array.length==1&&coach_array[0]=='no_result') {
        document.getElementById('coaches').innerHTML = 'Пока что ни в одном видео не указан тренер. Выбирать не из чего..';
    }
}

function coachSel(i) {
    for (j=0;j<coach_array.length;j++){
        document.getElementById('coach'+j).style.backgroundColor='#ccc';
        document.getElementById('coach'+j).style.color='#333';
    }

    if (coach != coach_array[i]) {
        document.getElementById('coach'+i).style.backgroundColor='#333';
        document.getElementById('coach'+i).style.color='#ccc';
        coach = coach_array[i];
    }
    else {
        coach = 'any';
    }
    
    changeLinks();
}