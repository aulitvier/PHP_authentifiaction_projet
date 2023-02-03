<?php

class CreatePage {


    public $myDataBase;
    public function authorization() {
        if (isset($_POST["name_page"]) && !empty($_POST["name_page"]) && isset($_POST["title_page"]) 
        && !empty($_POST["title_page"]) && isset($_POST["paragraph"]) && !empty($_POST["paragraph"])
        && isset($_POST["authorization"]) && !empty($_POST["authorization"])) {
            return true;
        } else {
            return false;
        }
    }
    public function connect() {
        try {
            $this->myDataBase = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
            } catch (PDOException $e) {
                die ("Error!: ".$e->getMessage()."<br/>");
            }
    }
    public function checkAuthorization($authorization) {
        if ($authorization == "administrateur") {
            $a = true;
            $b = false;
            $c = false;
            return array($a, $b, $c);
        }
        else if ($authorization == "utilisateur") {
            $a = false;
            $b = true;
            $c = false;
            return array($a, $b, $c);
        }
        else {
            $a = false;
            $b = false;
            $c = true;
            return array($a, $b, $c);
        }
    }
    public function createPage($authorization, $page_name, $administrator, $user, $guest, $title, $paragraph) {
        if ($authorization) {
            $request = $this->myDataBase->prepare("INSERT INTO page(nom, page_administrateur, page_utilisateur, page_invite, titre, paragraphe) VALUES (?, ?, ?, ?, ?, ?)");
            $request->execute(array($page_name, $administrator, $user, $guest, $title, $paragraph));
            header("Location: http://localhost/PHP_authentification/home_page/admin_home.php");
        }
    }
    public function modifyPage($authorization, $page_name, $administrator, $user, $guest, $title, $paragraph, $id) {
        if ($authorization) {
            $request = $this->myDataBase->prepare("UPDATE page SET nom = ?, page_administrateur = ?, page_utilisateur = ?, page_invite = ?, titre = ?, paragraphe = ? WHERE id = ?");
            $request->execute(array($page_name, $administrator, $user, $guest, $title, $paragraph, $id));
            header("Location: http://localhost/PHP_authentification/connection.html");
        }
    }
    public function deletePage($id) {
        $request = $this->myDataBase->prepare("DELETE FROM page WHERE id = ?");
        $request->execute(array($id));
        header("Location: http://localhost/PHP_authentification/connection.html");
    }
    
    public function selectGuestPage($authorization) {
        $request = $this->myDataBase->prepare("SELECT * FROM page WHERE page_invite = ?");
        $request->execute(array($authorization));
    }

}   