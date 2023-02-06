<?php

require "class/AskReconnection.php";
require "class/CreatePage.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->rafreshPage();
$user_display_guest_page = new CreatePage();
$user_display_guest_page->connect();
$authorization = true;
$my_request = $user_display_guest_page->selectGuestPage($authorization);

echo "<h1>Pages</h1>";

while ($a = $my_request->fetch()) {
    $authorization_guest = "invite";
    echo "<tr>
            <td>$a[nom]</td>
            <td>$authorization_guest</td>
            <td><a href='display_page.php?id=$a[id]'>Lire</a></td><br/>
        </tr>
        <br/>";
}
