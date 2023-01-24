<?php
require "class/DemanderReconnexion.php";
$utilisateur_accueil_admin = new DemanderReconnexion();
$utilisateur_accueil_admin->delaiDepasse();
// $utilisateur_accueil_admin->rafraichisementPage();



require "class/ModifierUtilisateurBaseDeDonnees.php";
$utilisateur_supprimer = new ModifierUtilisateurBaseDeDonnes();
$utilisateur_supprimer->connecter();
$ma_requete = $utilisateur_supprimer->afficherUtilisateur($_GET["id"]);
$utiliser_fetch = $utilisateur_supprimer->utiliserFetch($ma_requete);
$droit_accorder = $utilisateur_supprimer->savoirDroit($utiliser_fetch);
$utilisateur_supprimer->afficherUtilisateurASupprimer($droit_accorder, $utiliser_fetch);
