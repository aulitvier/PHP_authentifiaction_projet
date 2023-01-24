<?php

class CreerPage {


    public $maBDD;
    public function autorisation() {
        if (isset($_POST["nom_page"]) && !empty($_POST["nom_page"]) && isset($_POST["titre_page"]) 
        && !empty($_POST["titre_page"]) && isset($_POST["paragraphe"]) && !empty($_POST["paragraphe"])
        && isset($_POST["droit"]) && !empty($_POST["droit"])) {
            return true;
        } else {
            return false;
        }
    }
    public function connecter() {
        try {
            $this->maBDD = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
            } catch (PDOException $e) {
                die ("Error!: ".$e->getMessage()."<br/>");
            }
    }
    public function verifierDroit($droit) {
        if ($droit == "administrateur") {
            $a = true;
            $b = false;
            $c = false;
            return array($a, $b, $c);
        }
        else if ($droit == "utilisateur") {
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
    public function creerPage($autorisation, $nom_page, $administrateur, $utilisateur, $invite, $titre, $paragraphe) {
        if ($autorisation) {
            $ma_requete = $this->maBDD->prepare("INSERT INTO page(nom, page_administrateur, page_utilisateur, page_invite, titre, paragraphe) VALUES (?, ?, ?, ?, ?, ?)");
            $ma_requete->execute(array($nom_page, $administrateur, $utilisateur, $invite, $titre, $paragraphe));
            header("Location: http://localhost/PHP_authentification/page_accueil/admin_accueil.php");
        }
    }
    public function modifierPage($autorisation, $nom_page, $administrateur, $utilisateur, $invite, $titre, $paragraphe, $id) {
        if ($autorisation) {
            $ma_requete = $this->maBDD->prepare("UPDATE page SET nom = ?, page_administrateur = ?, page_utilisateur = ?, page_invite = ?, titre = ?, paragraphe = ? WHERE id = ?");
            $ma_requete->execute(array($nom_page, $administrateur, $utilisateur, $invite, $titre, $paragraphe, $id));
            header("Location: http://localhost/PHP_authentification/connexion.html");
        }
    }
    public function supprimerPage($id) {
        $ma_requete = $this->maBDD->prepare("DELETE FROM page WHERE id = ?");
        $ma_requete->execute(array($id));
        header("Location: http://localhost/PHP_authentification/connexion.html");
    }
    
    public function selectionnerPageInvite($droit) {
        $ma_requete = $this->maBDD->prepare("SELECT * FROM page WHERE page_invite = ?");
        $ma_requete->execute(array($droit));
    }

}
    