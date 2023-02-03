<?php
require "class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->refreshPage();

require "class/ModifyUserDataBase.php";
$select_user = new ModifyUserDataBase();
$select_user->connect();
$my_request = $select_user->selectUser();
?>

<h1>Personnes</h1>
<?php
$select_user->displayUsers($my_request);
?>