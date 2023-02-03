<?php
require "../class/CreatePage.php";
$page_modify = new CreatePage();
$page_modify->connect();
$authorization = $page_modify->authorization();
$valid_authorization = $page_modify->checkAuthorization($_POST["authorization"]);
print_r($_POST);
$page_modify->modifyPage($authorization, $_POST["name_page"], $valid_authorization[0],
$valid_authorization[1], $valid_authorization[2], $_POST["title_page"], $_POST["paragraphe"], $_GET["id"]); 