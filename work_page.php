<?php
require("class/AskReconnection.php");
require("src/work_page_model.php");
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->refreshPage();

echo "<h1>Pages</h1>";

while ($a = $my_request->fetch()) {
    if ($a["page_administrateur"] == true) {
        $authorization = "administrateur";
    } else if ($a["page_utilisateur"] == true) {
        $authorization = "utilisateur";
    } else {
        $authorization = "invite";
    }
    echo "<tr>
        <td>$a[nom]</td>
        <td>$authorization</td>
        <td><a href='display_page.php?id=$a[id]'>Lire</a></td><br/>
        <td><a href='modify_page.php?id=$a[id]'>Modifier</a></td><br/>
        <td><a href='delete_page.php?id=$a[id]'>Supprimer</a>
      </tr>
        <br/>";
};
