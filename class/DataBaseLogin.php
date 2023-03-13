<?php
require "DataBaseRegistration.php";
class DataBaseLogin extends DataBaseRegistration {

    /**
     * Renvoie true si tout les champs ont été remplie et false si ce n'est pas le cas
     */
    public function allFieldFilled() {
        
        if (isset($_POST["mail"]) && !empty($_POST["mail"]) && isset($_POST["MDP"]) && !empty($_POST["MDP"])) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Récupere le mot de passe si l'email existe
     * @param $authorization bool
     * @param $mail_given string
     */
    public function searchEmail($authorization, $mail_given) {
        if ($authorization) {
            $request = $this->myDataBase->prepare("SELECT * FROM utilisateur WHERE email = ? ");
            $request->execute(array($mail_given));
            // ci-dessus je prépare ma requête et l'exécute 
   
            $user  = $request->fetch();
            return $user;
            // Récupére une ligne depuis un jeu de résultats associé à l'objet PDO dans mon cas la fonction fetch me permet de récuperer
            // le mot de passe hashé dans un tableau si l'email existe dans la base de données
        } else {
            echo "Vous n'avez pas remplie tous les champs";
        } 
    }

    /**
     * Dit si l'email n'existe pas ou le mot de passe n'est pas identique à celui de la base de données
     * @param $user array
     * @param $password_given string
     */
    public function checkMailAndPassword($user, $password_given) {
        if ($user) { // si fetch retourne true donc s'il trouve l'e-mail
            if (password_verify($password_given, $user["mot_de_passe"])) { // password_verify permet de vérifier si le mot de passe 
                // hashé est le même que le mot de passe en clair entrée par l'utilisateur
                echo "Bienvenue";
            } else { // si le mot de passe n'est pas bon
            echo "mot de passe invalide, veuillez réessayer";
            }
        } else { // si l'e-mail est incorrect
        echo " l'e-mail n'existe pas";
        }
    }
    public function pageRedirect($user) {
        if ($user) {
            if ($user["droit"] == 1) {
                header("Location: http://localhost/PHP_authentification/home_page/admin_home.php");
                exit();
            }
            else if ($user["droit"] == 2) {
                header("Location: http://localhost/PHP_authentification/home_page/user_home.php");
                exit();
            }
            else if ($user["droit"] == 3) {
                header("Location: http://localhost/PHP_authentification/home_page/guest_home.php");
                exit();
            }
        }
    }

}