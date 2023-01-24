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
$ma_requete = $maBDD->prepare("SELECT * FROM page WHERE page_utilisateur = ? OR page_invite = ?");
$ma_requete->execute(array(1, 1));
?>
    <h1>Pages</h1>
    <?php
while ($a = $ma_requete->fetch()) {
    if ($a["droit_administrateur" == 1]) {
        $droit = "administrateur";
    } else if ($a["droit_utilisateur"] == 1) {
        $droit = "utilisateur";
    } else {
        $droit = "invite";
    }
    echo "<tr>
            <td>$a[nom]</td>
            <td>$droit</td>
            <td><a href='afficher_page.php?id=$a[id]'>Lire</a></td><br/>
            <td><a href='modifier_page.php?id=$a[id]'>Modifier</a></td><br/>
        </tr>
        <br/>";
};
?>