<?php

try {
    $myDB = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
    } catch (PDOException $e) {
        die ("Error!: ".$e->getMessage()."<br/>");
    }
    $my_request = $myDB->prepare("SELECT * FROM page WHERE id = ?");
    $my_request->execute(array($_GET["id"]));
    $a = $my_request->fetch();
    if ($a["page_administrateur"] == true) {
        $authorization_agree = "administrateur";
    }
    else if ($a["page_utilisateur"] == true) {
        $authorization_agree = "utilisateur";
    }
    else {
        $authorization_agree = "invite";
    }