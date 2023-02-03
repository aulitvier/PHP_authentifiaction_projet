<?php

require "class/AskReconnection.php";
require "class/CreatePage.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->rafreshPage();
$user_display_guest_page = new CreatePage();
$user_display_guest_page->connect();
$user_display_guest_page->selectGuestPage($_POST["authorization"]);
?>
    <h1>Pages</h1>
    <?php
while ($a = $my_request->fetch()) {
    $authorization = "invite";
    echo "<tr>
            <td>$a[nom]</td>
            <td>$authorization</td>
            <td><a href='display_page.php?id=$a[id]'>Lire</a></td><br/>
        </tr>
        <br/>";
}