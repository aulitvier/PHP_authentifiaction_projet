<?php
require "class/DemanderReconnexion.php";
$utilisateur_accueil_admin = new DemanderReconnexion();
$utilisateur_accueil_admin->delaiDepasse();
// $utilisateur_accueil_admin->rafraichisementPage();

try {
    $maBDD = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
    } catch (PDOException $e) {
        die ("Error!: ".$e->getMessage()."<br/>");
    }
    $ma_requete = $maBDD->prepare("SELECT * FROM page WHERE id = ?");
    $ma_requete->execute(array($_GET["id"]));
    $a = $ma_requete->fetch();
    if ($a["page_administrateur"] == true) {
        $droit_accorder = "administrateur";
    }
    else if ($a["page_utilisateur"] == true) {
        $droit_accorder = "utilisateur";
    }
    else {
        $droit_accorder = "invite";
    }
    echo "<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <title>$a[nom]</title>
        </head>
        <body>
            <h1>$a[titre]</h1><br/>
            <p>Cette page est disponible pour $droit_accorder</p><br/>
            <P>$a[paragraphe]</p>
        </body>
        </html>";