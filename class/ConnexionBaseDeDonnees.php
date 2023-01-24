<?php
require "InscriptionBaseDeDonnees.php";
class ConnexionBaseDeDonnees extends InscriptionBaseDeDonnees {

    /**
     * Renvoie true si tout les champs ont été remplie et false si ce n'est pas le cas
     */
    public function toutChampRemplie() {
        
        if (isset($_POST["mail"]) && !empty($_POST["mail"]) && isset($_POST["MDP"]) && !empty($_POST["MDP"])) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Récupere le mot de passe si l'email existe
     * @param $autorisation bool
     * @param $mail_donne string
     */
    public function chercherMail($autorisation, $mail_donne) {
        if ($autorisation) {
            $ma_requete = $this->maBDD->prepare("SELECT * FROM utilisateur WHERE email = ? ");
            $ma_requete->execute(array($mail_donne));
            // ci-dessus je prépare ma requête et l'exécute 
   
            $utilisateur  = $ma_requete->fetch();
            return $utilisateur;
            // Récupère une ligne depuis un jeu de résultats associé à l'objet PDO dans mon cas la fonction fetch me permet de récuperer
            // le mot de passe hashé dans un tableau si l'email existe dans la base de données
        } else {
            echo "Vous n'avez pas remplie tout les champs";
        }
        
    }

    /**
     * Dit si l'email n'existe pas ou le mot de passe n'est pas identique à celui de la base de données
     * @param $utilisateur array
     * @param $mot_de_passe_donne string
     */
    public function verifierMailEtMDP($utilisateur, $mot_de_passe_donne) {
        if ($utilisateur) { // si fetch retourne true donc s'il trouve l'e-mail
            if (password_verify($mot_de_passe_donne, $utilisateur["mot_de_passe"])) { // password_verify permet de vérifier si le mot de passe 
                // hashé est le même que le mot de passe en clair entrée par l'utilisateur
                echo "Bienvenue";
        } else { // si le mot de passe n'est pas bon
            echo "mot de passe invalide, veuillez réessayer";
        }
    } else { // si l'e-mail est incorrect
        echo " l'e-mail n'existe pas";
    }
    }
    public function redirigerPage($utilisateur) {
        if ($utilisateur) {
            if ($utilisateur["droit_admin"] == 1) {
                header("Location: http://localhost/PHP_authentification/page_accueil/admin_accueil.php");
                exit();
            }
            else if ($utilisateur["droit_admin"] == 2) {
                header("Location: http://localhost/PHP_authentification/page_accueil/utilisateur_accueil.html");
                exit();
            }
            else if ($utilisateur["droit_admin"] == 3) {
                header("Location: http://localhost/PHP_authentification/page_accueil/invite_accueil.html");
                exit();
            }
        }
    }

}