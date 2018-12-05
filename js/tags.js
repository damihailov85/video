
// из БД
var tag_array = JSON.parse(tag_str);
var tag_select = [];



function createTagList(){

    for (i=0;i<tag_array.length;i++){
        document.getElementById('tags').innerHTML += '<div class="tag" id="tag' + i + '" style="background-color: #ccc; color: #333;" onclick="tagSel('+i+');">' + tag_array[i] + '</div>';
        tag_select[i] = 0;
    }
}

function tagSel(i) {
    if (tag_select[i] == 0) {
        document.getElementById('tag'+i).style.backgroundColor='#333';
        document.getElementById('tag'+i).style.color='#ccc';
        tag_select[i] = 1;
        changeLinks();
    }
    else {
        document.getElementById('tag'+i).style.backgroundColor='#ccc';
        document.getElementById('tag'+i).style.color='#333';
        tag_select[i] = 0;
        changeLinks();
    }
}

function changeLinks() {
    var tags = [];
    var j = 0;
    for (i=0; i<tag_select.length; i++){
        if (tag_select[i]==1) {
            tags[j] = tag_array[i];
            j++;
        }
    }
    var tag_str = JSON.stringify(tags);
    var int_str = JSON.stringify(interval);
    document.getElementById('b1').href = button_rnd + '&coach=' + coach + '&tag_str=' + tag_str + '&interval=' + int_str;
    document.getElementById('b2').href = button_list + '&coach=' + coach + '&tag_str=' + tag_str + '&interval=' + int_str;
}

