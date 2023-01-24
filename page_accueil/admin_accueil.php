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
        <h1>Bienvenue administrateur / administratrice</h1>
        <a href="../gerer_utilisateur.php">Gerer utilisateur</a>
        <br/>
        <a href="../creer_utilisateur.html">Creer un nouvel utilisateur</a>
        <br/>
        <a href="../gerer_page.php">Gerer page</a>
        <br/>
        <a href="../creer_page.html">Creer une nouvelle page</a>
    </body>
</html>