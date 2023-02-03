<?php
require "../class/CreatePage.php";
$page_supprimer = new CreatePage();
$page_supprimer->connect();
$page_supprimer->deletePage($_GET["id"]);