<?php 
include('config.php'); 

header("Content-Type: text/html; charset=utf-8");

if ($_GET['action']=='exit') 
{
    setcookie("user_login", $_COOKIE['user_login'], time()-3600, '/', 'video.mda85.ru');
    echo "<script>  location.replace('login.php'); </script> ";
}
   
if ($_POST['login']&&$_POST['password'])
{
    // нет, защита здесь и сейчас не нужна, просто ограничитель.
    if (($_POST['password']=='1234')&&$_POST['login']=='test') {
        setcookie('user_login', 'User', time()+36000000, '/', 'video.mda85.ru'); 
        header('Location: http://video.mda85.ru');        
    }
    else {
        echo "<script> alert('Неверный логин/пароль'); location.replace('login.php'); </script> ";
    }
}

else
{

?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Авторизация</title>
</head>
<body>

<div class="page">
     
    <form class="form" method="post" action="login.php">
        <div class="input">
            <input type="text" name="login">
            <input type="password" name="password">
            <input type="submit" class="button" value="Войти">
        </div>
    </form>
</div>

<?
}
?>     
   


</body>
</html>