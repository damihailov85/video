var tag_array = JSON.parse(tag_str);
var tag_select = [];

function createTagList(){
    for (i=0;i<tag_array.length;i++){
        document.getElementById('tags-del').innerHTML += '<div class="tag" id="tag' + i + '" style="background-color: #ccc; color: #333;" onclick="tagDel('+i+');">' + tag_array[i] + '</div>';
        tag_select[i] = 0;
        j = 0;
        document.getElementById('tags-edit').innerHTML += '<div class="tag" id="tag-edit' + (i+j) + '" style="background-color: #ccc; color: #333;"><span onclick="tagEdit('+(i+j)+');">' + tag_array[i+j] + '</span></div>';
    }
}

function tagDel(i){
    if (tag_select[i] == 0) {
        document.getElementById('tag'+i).style.backgroundColor='#f00';
        document.getElementById('tag'+i).style.color='#fff';
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
    document.getElementById('b1').href = button_del + '?tag_str=' + tag_str;
}

function tagEdit(i) {
    document.getElementById('tag-edit'+i).innerHTML = '<input type="text" id="tag-edit-input'+i+'" autofocus name="tag" value="' + tag_array[i] + '">';
    document.getElementById('tag-edit'+i).innerHTML += '<img src="icon/OK.png" width=20 class="ok-button" onClick="tagEditSend('+i+', \''+tag_array[i]+'\');"></div>';
}

function tagEditSend(i, old_str) {
    var new_str = document.getElementById('tag-edit-input'+i).value;

    if (new_str!=old_str) {
        var url = 'php/tag_edit.php'
        $.post( url , { old_str: old_str, new_str: new_str }).done(function() {

        });
    }

    document.getElementById('tag-edit'+i).innerHTML = ' ';
    document.getElementById('tag-edit'+i).innerHTML = '<b>' + new_str + '</b>';
} 

    createTagList(); 
    var button_del = document.getElementById('b1').href; 


