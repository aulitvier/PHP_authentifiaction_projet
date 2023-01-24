<?php
require "../class/CreerPage.php";
$page_supprimer = new CreerPage();
$page_supprimer->connecter();
$page_supprimer->supprimerPage($_GET["id"]);