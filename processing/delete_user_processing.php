<?php

require "../class/ModifyUserDataBase.php";
$user_deledeted = new ModifyUserDataBase();
$user_deledeted->connect();
$user_deledeted->deleteUser($_GET["id"]);
$user_deledeted->redirect();