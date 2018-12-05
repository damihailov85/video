function setHelpRequest() {
    document.getElementById('request-back').style.display = 'block';
}

function closeHelpRequest() {
    document.getElementById('request-back').style.display = 'none';
}

function sendHelpRequest() {

    var url = 'http://damihailov85.website/my_bot/wh.php'

    if (document.getElementById('request-text').value) {
        var message = document.getElementById('request-text').value;
    }
    else message="!!!";
    $.post( url , { message: message }).done(function(data) {
        if (data==1) alert('Отправлено.Ожидай результат!');
        else alert('Что-то пошло не так! Позвони 89261764068 или воспользуйся другим известным способом связи!');
    });

    closeHelpRequest();
}