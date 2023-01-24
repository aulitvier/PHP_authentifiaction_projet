<?php

class ModifierUtilisateurBaseDeDonnes {
    protected $nom, $prenom, $pseudo, $email, $age, $id;
    public $maBDD;
    /**
     * permet de se connecter à la base de données 
     */
    public function connecter() {
        try {
            $this->maBDD = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
            } catch (PDOException $e) {
                die ("Error!: ".$e->getMessage()."<br/>");
            }
        }
        /**
         * permet de savoir si les $_POST existe et ne sont pas vide
         */
    public function toutChampInscriptionRemplie() {
        if (isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["prenom"]) && !empty($_POST["prenom"])
        && isset($_POST["pseudo"]) && !empty($_POST["pseudo"]) && isset($_POST["age"]) && !empty($_POST["age"])
        && isset($_POST["mail"]) && !empty($_POST["mail"])) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * permet de modifier l'utilisateur
     * @param $autorisation bool
     * @param $nom string
     * @param $prenom string
     * @param $pseudo string
     * @param $age int
     * @param $mail string
     * @param $id int
     * @param $vrai_droit_donne int
     */
    public function modifierUtilisateur($autorisation, $nom, $prenom, $pseudo, $age, $mail, $id, $vrai_droit_donne) {
        if ($autorisation) {
            $ma_requete = $this->maBDD->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, pseudo = ?, age = ?, email = ?, droit_admin = ? WHERE id = ?");
            $ma_requete->execute(array($nom, $prenom, $pseudo, $age, $mail, $vrai_droit_donne, $id));
            echo "Les données ont bien été modifiées";
        }   
    }
    public function rediriger() {
        header("Location: http://localhost/PHP_authentification/connexion.php");
    }
    /**
     * permet de mettre dans un tableau les données de la requete
     * @param $ma_requete object
     */
    public function utiliserFetch($ma_requete) {
        $a = $ma_requete->fetch();
        return $a;
    }
    public function savoirDroit($requete_fetch) {
            if ($requete_fetch["droit_admin"] == 1) {
                return $droit_accorder = "administrateur";
            }
            else if ($requete_fetch["droit_admin"] == 2) {
                return $droit_accorder = "utilisateur";
            }
            else {
                return $droit_accorder = "invite";
            }
    }
    /**
     * selectionne les données de l'utilisateur selon l'id de l'url
     * @param $id int
     */
    public function afficherUtilisateur($id) {
        $ma_requete = $this->maBDD->prepare("SELECT * FROM utilisateur WHERE id = ?");
        $ma_requete->execute(array($id));
        return $ma_requete;
    }

    /**
     * affiche les données de l'utilisateur données avec afficherUtilisateur
     * @param $droit_accorder string
     * @param $requete_fetch object
     */
    public function affichageUtilisateur($droit_accorder, $requete_fetch) {
            echo    "<form action='traitement/traitement_modifier_utilisateur.php?id=$requete_fetch[id]' method='post'>
            <div>
                <label for='nom'>Nom :</label>
                <input type='text' name='nom' value='$requete_fetch[nom]' required>
            </div>
            <div>
                <label for='prenom'>Prenom :</label>
                <input type='text' name='prenom' value='$requete_fetch[prenom]' required>
            </div>
            <div>
                <label for='pseudo'>Pseudo :</label>
                <input type='text' name='pseudo' value='$requete_fetch[pseudo]' required>
            </div>
            <div>
                <label for='age'>Age :</label>
                <input type='number' name='age' value='$requete_fetch[age]' required>
            </div>
            <div>
                <label for='mail'>E-mail :</label>
                <input type='email' name='mail' value='$requete_fetch[email]' required>
            </div>
            <div>
                <p>Ce compte a des droits d'$droit_accorder</p>
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
            <a href='gerer_utilisateur.php'>
            <button>Retour</button>
            </a> ";
        }


    /**
     * permet de sélectionner tous les utilisateur qui ne sont pas administrateur
     */
    public function selectionnerUtilisateur() {
        $ma_requete = $this->maBDD->prepare("SELECT * FROM utilisateur WHERE droit_admin IN (?, ?)");
        $ma_requete->execute(array(2, 3));
        return $ma_requete;
    }

    /**
     * permet d'afficher tous les utilisateur qui ne sont pas des administrateur
     * @param $ma_requete object
     */
    public function affichageUtilisateurs($ma_requete) {
        while ($a = $ma_requete->fetch()) {
            echo "<tr>
                    <td>$a[prenom]</td>
                    <td>$a[nom]</td>
                    <td>$a[age]</td>
                    <td>$a[pseudo]</td>
                    <td>$a[email]</td>
                    <td><a href='modifier_utilisateur.php?id=$a[id]'>Modifier</a></td>
                    <td><a href='supprimer_utilisateur.php?id=$a[id]'>Supprimer</a></td>
                </tr>
                <br/>";
    };
    }
    /**
     * permet de donner ou pas un droit d'administrateur ou un droit d'utilisateur
     * @param $droit_donne string 
     */
    public function droitAdmin($droit_donne) {
        if ($droit_donne == "administrateur") {
            return $vrai_droit_donne = 1;
        } else if ($droit_donne == "utilisateur") {
            return $vrai_droit_donne = 2;
        } else {
            return $vrai_droit_donne = 3;
        }
    }
    public function afficherUtilisateurASupprimer($droit_accorder, $requete_fetch) {
        echo " <p>id : $requete_fetch[id]</p>
        <p>nom : $requete_fetch[nom]</p>
        <p>prenom : $requete_fetch[prenom]</p>
        <p>pseudo : $requete_fetch[pseudo]</p>
        <p>age : $requete_fetch[age]</p>
        <p>email : $requete_fetch[email]</p>
        <p>droit : $droit_accorder</p>
        <a href='traitement/traitement_supprimer_utilisateur.php?id=$requete_fetch[id]'>
            <button>Supprimer</button>
        </a> ";
    }

    public function supprimerUtilisateur($id) {
        $ma_requete = $this->maBDD->prepare("DELETE FROM utilisateur WHERE id = ?");
            $ma_requete->execute(array($id));
            echo "Les données ont bien été supprimées";
    }
}

