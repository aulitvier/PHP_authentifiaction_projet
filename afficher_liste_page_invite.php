<?php

require "class/DemanderReconnexion.php";
require "class/CreerPage.php";
$utilisateur_accueil_admin = new DemanderReconnexion();
$utilisateur_accueil_admin->delaiDepasse();
// $utilisateur_accueil_admin->rafraichisementPage();
$utilisateur_afficher_page_invite = new CreerPage();
$utilisateur_afficher_page_invite->connecter();
$utilisateur_afficher_page_invite->selectionnerPageInvite($_POST["droit"]);
?>
    <h1>Pages</h1>
    <?php
while ($a = $ma_requete->fetch()) {
    $droit = "invite";
    echo "<tr>
            <td>$a[nom]</td>
            <td>$droit</td>
            <td><a href='afficher_page.php?id=$a[id]'>Lire</a></td><br/>
        </tr>
        <br/>";
}