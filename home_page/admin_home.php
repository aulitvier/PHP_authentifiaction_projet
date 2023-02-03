<?php
require "../class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->rafreshPage();
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Bienvenue administrateur / administratrice</h1>
        <a href="../work_user.php">Gerer utilisateur</a>
        <br/>
        <a href="../create_user.php">Creer un nouvel utilisateur</a>
        <br/>
        <a href="../work_page.php">Gerer page</a>
        <br/>
        <a href="../create_page.html">Creer une nouvelle page</a>
    </body>
</html>