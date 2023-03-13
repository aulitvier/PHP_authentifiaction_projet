<?php
require "class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->refreshPage();

require("templates/modify_page_html.php");
require("src/modify_page_model.php");