<?php

require "class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->refreshPage();

require "class/ModifyUserDataBase.php";
$dislpay_user = new ModifyUserDataBase();
$dislpay_user->connect();
$my_request = $dislpay_user->toDisplayUser($_GET["id"]);
?>
<h1>Personne</h1>
<?php
$use_fetch = $dislpay_user->useFetch($my_request);
$authorization_agree = $dislpay_user->knowAuthorization($use_fetch);
$dislpay_user->displayUser($authorization_agree, $use_fetch);
