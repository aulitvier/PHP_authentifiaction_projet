<?php

require "class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->rafreshPage();

$my_request = $myDB->prepare("SELECT * FROM page WHERE id = ?");
$my_request->execute(array($_GET["id"]));
$my_request;
$a = $my_request->fetch();
"<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <title>$a[name_page]</title>
        </head>
        <body>
            <h1>$a[title_page]</h1><br/>
            <h2>Cette page est disponible pour $a[authorization]</h2>
            <P>$a[paragraphe]</p>
        </body>
        </html>";