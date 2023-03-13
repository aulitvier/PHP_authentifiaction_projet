<?php

require "../class/DataBaseLogin.php";
$user_login = new DataBaseLogin();
$user_login->connect();
$authorization = $user_login->allFieldFilled();
$Find_Email_and_password = $user_login->searchEmail($authorization, $_POST["mail"]);
$user_login->checkMailAndPassword($Find_Email_and_password, $_POST["MDP"]);
$user_login->pageRedirect($Find_Email_and_password);