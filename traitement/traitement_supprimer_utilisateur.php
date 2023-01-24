<?php

require "../class/ModifierUtilisateurBaseDeDonnees.php";
$utilisateur_supprimer = new ModifierUtilisateurBaseDeDonnes();
$utilisateur_supprimer->connecter();
$utilisateur_supprimer->supprimerUtilisateur($_GET["id"]);
$utilisateur_supprimer->rediriger();