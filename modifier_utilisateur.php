<?php

require "class/DemanderReconnexion.php";
$utilisateur_accueil_admin = new DemanderReconnexion();
$utilisateur_accueil_admin->delaiDepasse();
// $utilisateur_accueil_admin->rafraichisementPage();

require "class/ModifierUtilisateurBaseDeDonnees.php";
$utilisateur_afficher = new ModifierUtilisateurBaseDeDonnes();
$utilisateur_afficher->connecter();
$ma_requete = $utilisateur_afficher->afficherUtilisateur($_GET["id"]);
?>
<h1>Personne</h1>
<?php
$utiliser_fetch = $utilisateur_afficher->utiliserFetch($ma_requete);
$droit_accorder = $utilisateur_afficher->savoirDroit($utiliser_fetch);
$utilisateur_afficher->affichageUtilisateur($droit_accorder, $utiliser_fetch);
?>


