<?php
require "../class/DemanderReconnexion.php";
$utilisateur_accueil_admin = new DemanderReconnexion();
$utilisateur_accueil_admin->delaiDepasse();
// $utilisateur_accueil_admin->rafraichisementPage();
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