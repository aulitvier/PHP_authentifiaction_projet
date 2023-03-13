<?php

try {
    $myDB = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
    } catch (PDOException $e) {
        die ("Error!: ".$e->getMessage()."<br/>");
    }
$my_request = $myDB->prepare("SELECT * FROM page WHERE page_administrateur = ? OR page_utilisateur = ? OR page_invite = ?");
$my_request->execute(array(1, 1, 1));
return $my_request;
?>