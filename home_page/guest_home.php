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
        <h1>Bienvenue invite(e)</h1>
        <a href="../afficher_liste_page_invite.php">voir la liste des page invite</a>
    </body>
</html>