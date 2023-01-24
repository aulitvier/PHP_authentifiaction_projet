<?php
require "../class/CreerPage.php";
$page_creer = new CreerPage();
$autorisation = $page_creer->autorisation();
$page_creer->connecter();
$droit_verifier = $page_creer->verifierDroit($_POST["droit"]);
$page_creer->creerPage($autorisation, $_POST["nom_page"], $droit_verifier[0], $droit_verifier[1], $droit_verifier[2], $_POST["titre"], $_POST["paragraphe"]);