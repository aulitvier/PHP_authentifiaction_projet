<?php
require "../class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->refreshPage();
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Bienvenue utilisateur / utilisatrice</h1>
        <a href="../work_user_page.php">Gerer page</a>
    </body>
</html>