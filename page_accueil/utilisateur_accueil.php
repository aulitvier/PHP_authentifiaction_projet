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
        <h1>Bienvenue utilisateur / utilisatrice</h1>
        <a href="../gerer_page_utilisateur.php">Gerer page</a>
    </body>
</html>