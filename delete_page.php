<?php
require "class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->rafreshPage();

try {
    $myDB = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
    } catch (PDOException $e) {
        die ("Error!: ".$e->getMessage()."<br/>");
    }
    $my_request = $myDB->prepare("SELECT * FROM page WHERE id = ?");
    $my_request->execute(array($_GET["id"]));
    $a = $my_request->fetch();


    if ($a["page_administrateur"] == true) {
        $authorization_agree = "administrateur";
    }
    else if ($a["page_utilisateur"] == true) {
        $authorization_agree = "utilisateur";
    }
    else {
        $authorization_agree = "invite";
    }
    echo " <p>id : $a[id]</p>
        <p>nom de la page : $a[nom]</p>
        <p>titre de la page : $a[titre]</p>
        <p>droit : $authorization_agree</p>
        <p>paragraphe : $a[paragraphe]</p><br/>
        <a href='processing/delete_page_processing.php?id=$a[id]'>
            <button>Supprimer</button>
        </a> ";