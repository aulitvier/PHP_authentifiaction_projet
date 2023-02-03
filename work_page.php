<?php
require "class/AskReconnection.php";
$user_home_admin = new AskReconnection();
$user_home_admin->delayExceeded();
// $user_home_admin->refreshPage();




try {
    $myDB = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
    } catch (PDOException $e) {
        die ("Error!: ".$e->getMessage()."<br/>");
    }
$my_request = $myDB->prepare("SELECT * FROM page WHERE page_administrateur = ? OR page_utilisateur = ? OR page_invite = ?");
$my_request->execute(array(1, 1, 1));
?>
    <h1>Pages</h1>
    <?php
while ($a = $my_request->fetch()) {
    if ($a["droit_administrateur" == 1]) {
        $authorization = "administrateur";
    } else if ($a["droit_utilisateur"] == 1) {
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
?>