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
    echo " <p>id : $a[id]</p>
        <p>nom de la page : $a[nom]</p>
        <p>titre de la page : $a[titre]</p>
        <p>droit : $droit_accorder</p>
        <p>paragraphe : $a[paragraphe]</p><br/>
        <a href='traitement/traitement_supprimer_page.php?id=$a[id]'>
            <button>Supprimer</button>
        </a> ";