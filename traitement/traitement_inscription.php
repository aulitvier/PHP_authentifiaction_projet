<?php

require "../class/InscriptionBaseDeDonnees.php";
// ci-dessus j'importe dans le fichier ma classe BaseDeDonnées

$utilisateur_inscription = new InscriptionBaseDeDonnees();
$utilisateur_inscription->connecter();
$autorisation = $utilisateur_inscription->toutChampInscriptionRemplie();
$mot_de_passe_valide = $utilisateur_inscription->verifierMDP($autorisation, $_POST["MDP"], $_POST["confirmation_MDP"]);
$droit_admin = $utilisateur_inscription->droitAdmin($_POST["droit"]);
$mot_de_passe_hash = $utilisateur_inscription->hashMDP($autorisation, $mot_de_passe_valide, $_POST["MDP"]);
$utilisateur_inscription->enregistrerDonnees($autorisation, $_POST["nom"], $_POST["prenom"], $_POST["pseudo"], $_POST["age"], 
$_POST["mail"], $mot_de_passe_hash, $droit_admin, $mot_de_passe_valide);
$utilisateur_inscription->rediriger();   
