<?php 

if (!$_COOKIE['user_login'])
           echo "<script type='text/javascript'> location.replace('login.php'); </script> ";
else echo "<div id='user'>Hi,".$_COOKIE['user_login']."! <a href='login.php?action=exit'>Выйти</a></div>";


?>



