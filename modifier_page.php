<?php
require "class/DemanderReconnexion.php";
$utilisateur_accueil_admin = new DemanderReconnexion();
$utilisateur_accueil_admin->delaiDepasse();
// $utilisateur_accueil_admin->rafraichisementPage();



try {
    $maBDD = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
    } catch (PDOException $e) {
        die ("Error!: ".$e->getMessage()."<br/>");
    }
    $ma_requete = $maBDD->prepare("SELECT * FROM page WHERE id = ?");
    $ma_requete->execute(array($_GET["id"]));
    $a = $ma_requete->fetch();
    if ($a["page_administrateur"] == true) {
        $droit_accorder = "administrateur";
    }
    else if ($a["page_utilisateur"] == true) {
        $droit_accorder = "utilisateur";
    }
    else {
        $droit_accorder = "invite";
    }
    echo    "<form action='traitement/traitement_modifier_page.php?id=$a[id]' method='post'>
            <div>
                <label for='nom_page'>Nom de la page :</label>
                <input type='text' name='nom_page' value='$a[nom]' required>
            </div>
            <div>
                <label for='titre_page'>Titre de la page :</label>
                <input type='text' name='titre_page' value='$a[titre]' required>
            </div>
            <div>
                <label for='paragraphe'>Paragraphe :</label>
                <textarea name='paragraphe' required>$a[paragraphe]</textarea>
            </div>
            <div>
                <p>Cette page a des droits d'$droit_accorder</p>
            </div>
            <div>
            <input type='radio' name='droit' value='administrateur'
                   checked>
            <label for='administrateur'>Administrateur</label>
          </div>
          <div>
            <input type='radio' name='droit' value='utilisateur'>
            <label for='utilisateur'>Utilisateur</label>
          </div>
          <div>
            <input type='radio' name='droit' value='invite'>
            <label for='invite'>Invite</label>
          </div>
            <div>
                <button type='submit'>Enregistrer</button>
            </div>
            </form>
            <a href='gerer_page.php'>
            <button>Retour</button>
            </a> ";