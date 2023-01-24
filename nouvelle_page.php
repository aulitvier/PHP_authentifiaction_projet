<?php

require "class/DemanderReconnexion.php";
$utilisateur_accueil_admin = new DemanderReconnexion();
$utilisateur_accueil_admin->delaiDepasse();
// $utilisateur_accueil_admin->rafraichisementPage();

$ma_requete = $maBDD->prepare("SELECT * FROM page WHERE id = ?");
$ma_requete->execute(array($_GET["id"]));
$ma_requete;
$a = $ma_requete->fetch();
"<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <title>$a[nom_page]</title>
        </head>
        <body>
            <h1>$a[titre_page]</h1><br/>
            <h2>Cette page est disponible pour $a[droit]</h2>
            <P>$a[paragraphe]</p>
        </body>
        </html>";