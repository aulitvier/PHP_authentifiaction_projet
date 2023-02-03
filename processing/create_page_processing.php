<?php
require "../class/CreatePage.php";
$created_page = new CreatePage();
$authorization = $created_page->authorization();
$created_page->connect();
$authorization_checked = $created_page->checkAuthorization($_POST["authorization"]);
print_r($_POST);
$created_page->createPage($authorization, $_POST["name_page"], $authorization_checked[0],
$authorization_checked[1],$authorization_checked[2], $_POST["title_page"], $_POST["paragraphe"]);