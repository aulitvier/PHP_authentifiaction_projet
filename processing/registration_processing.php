<?php

require "../class/DataBaseregistration.php";
// ci-dessus j'importe dans le fichier ma classe BaseDeDonnées

$registration_user = new DataBaseRegistration();
$registration_user->connect();
$authorization = $registration_user->allFieldRegistrationFilled();
$valid_password = $registration_user->checkPassword($authorization, $_POST["MDP"], $_POST["confirmation_MDP"]);
$authorization_admin = $registration_user->authorization($_POST["authorization"]);
$password_hash = $registration_user->hashPassword($authorization, $valid_password, $_POST["MDP"]);
$registration_user->dataRegister($authorization, $_POST["nom"], $_POST["prenom"],
$_POST["pseudo"], $_POST["age"], $_POST["mail"], $password_hash,
$authorization_admin, $valid_password);
$registration_user->redirect();