<?php
require "../class/ModifierUtilisateurBaseDeDonnees.php";
$utilisateur_modifier = new ModifierUtilisateurBaseDeDonnes();
$utilisateur_modifier->connecter();
$autorisation = $utilisateur_modifier->toutChampInscriptionRemplie();
$droit_admin = $utilisateur_modifier->droitAdmin($_POST["droit"]);
$utilisateur_modifier->modifierUtilisateur($autorisation, $_POST["nom"], $_POST["prenom"], $_POST["pseudo"]
, $_POST["age"], $_POST["mail"], $_GET["id"], $droit_admin);
$utilisateur_modifier->rediriger();


        
