<?php

require "../class/ConnexionBaseDeDonnees.php";
$utilisateur_connexion = new ConnexionBaseDeDonnees();
$utilisateur_connexion->connecter();
$autorisation = $utilisateur_connexion->toutChampRemplie();
$trouver_mail_et_MDP = $utilisateur_connexion->chercherMail($autorisation, $_POST["mail"]);
$utilisateur_connexion->verifierMailEtMDP($trouver_mail_et_MDP, $_POST["MDP"]);
$utilisateur_connexion->redirigerPage($trouver_mail_et_MDP);


    
     



