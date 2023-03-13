<?php
require "class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->refreshPage();

require("templates/display_page_html.php");
require("src/display_page_model.php");