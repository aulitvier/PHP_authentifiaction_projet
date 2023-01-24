<?php
require "../class/CreerPage.php";
$page_modifier = new CreerPage();
$page_modifier->connecter();
$autorisation = $page_modifier->autorisation();
$valider_droit = $page_modifier->verifierDroit($_POST["droit"]);
$page_modifier->modifierPage($autorisation, $_POST["nom_page"], $valider_droit[0], $valider_droit[1], $valider_droit[2], $_POST["titre"], $_POST["paragraphe"], $_GET["id"]);

    

    
 