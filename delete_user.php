<?php
require "class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->refreshPage();
require "class/ModifyUserDataBase.php";
$user_delete = new ModifyUserDataBase();
$user_delete->connect();
$my_request = $user_delete->toDisplayUser($_GET["id"]);
$use_fetch = $user_delete->useFetch($my_request);
$authorization_agree = $user_delete->knowAuthorization($use_fetch);
$user_delete->diplayDeleteUser($authorization_agree, $use_fetch);