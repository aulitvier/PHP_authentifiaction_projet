<?php
require "../class/ModifyUserDataBase.php";
$user_modify = new ModifyUserDataBase();
$user_modify->connect();
$authorization = $user_modify->allFieldRegistrationFilled();
$authorization_admin = $user_modify->authorizationAdmin($_POST["authorization"]);
$user_modify->modifyUser($authorization, $_POST["nom"], $_POST["prenom"], $_POST["pseudo"]
, $_POST["age"], $_POST["mail"], $_GET["id"], $authorization_admin);
$user_modify->redirect();