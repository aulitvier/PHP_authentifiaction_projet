<?php
require "class/DemanderReconnexion.php";
$utilisateur_accueil_admin = new DemanderReconnexion();
$utilisateur_accueil_admin->delaiDepasse();
// $utilisateur_accueil_admin->rafraichisementPage();

require "class/ModifierUtilisateurBaseDeDonnees.php";
$utilisateur_selectionne = new ModifierUtilisateurBaseDeDonnes();
$utilisateur_selectionne->connecter();
$ma_requete = $utilisateur_selectionne->selectionnerUtilisateur();
?>

<h1>Personnes</h1>
<?php
$utilisateur_selectionne->affichageUtilisateurs($ma_requete);
?>

