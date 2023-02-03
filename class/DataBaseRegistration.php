<?php

class DataBaseRegistration {
protected $lastname_given, $first_given, $nickname, $age_given, $email_given, 
$password_given, $confirmation_password_given, $authorization_given;
public $myDataBase;

/**
 * permet de vérifier que les données $_POST existe
 */
public function allFieldRegistrationFilled() {
    if (isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["prenom"]) && !empty($_POST["prenom"])
    && isset($_POST["pseudo"]) && !empty($_POST["pseudo"]) && isset($_POST["age"]) && !empty($_POST["age"])
    && isset($_POST["mail"]) && !empty($_POST["mail"]) && isset($_POST["MDP"]) && !empty($_POST["MDP"]) && isset($_POST["confirmation_MDP"])
    && !empty($_POST["confirmation_MDP"])) {
        return true;
    } else {
        return false;
    }
}
/**
* permet de se connecter avec l'objet PDO
*/
public function connect() {
    try {
        $this->myDataBase = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
        } catch (PDOException $e) {
            die ("Error!: ".$e->getMessage()."<br/>");
        }
        // ci-dessus je créer un nouvel objet PDO avec l'identifiant localhost, 
        // puis je créer un die pour afficher l'erreur si new PDO en contient une
}
/**
 * vérifie si le mot de passe donnée et le même que le mot de passe de confirmation
 * @param $password_given string 
 * @param $confirmation_password_given string
 */
public function checkPassword($authorization, $password_given, $confirmation_password_given) {
    if ($authorization) {
        if ($password_given === $confirmation_password_given) {
            return $valid_password = true;
            // ci-dessus d'après ce que j'ai compris c'est que plus le nombre est grand plus il y a d'opération 
            // qui est éffectuée pour hasher le MDP     
        } else {
            return $valid_password = false;
        }
    } else {
        echo "tout les champs ne sont pas remplie";
    }
    
}
/**
 * hash le mot de passe si verifierMDP envoie true
 * @param $password_valid bool
 * @param $password_given string  
 */
public function hashPassword($authorization, $valid_password, $password_given) {
    if ($authorization) {
        if ($valid_password) {
            $options = [
                'cost' => 12,
            ];
            return $mot_de_passe_hash = password_hash($password_given, PASSWORD_BCRYPT, $options);
            // permet de hash le mot de passe avec bcrypt plus le nombre de 'cost' est grand plus il faut d'operation
            // pour déchiffrer le mot de passe
        } else {
            return false;
        }
    }
    
    
}

/**
 * permet d'enregistrer les données
 * @param $lastname_given string
 * @param $firstname_given string
 * @param $nickname string 
 * @param $age_given int
 * @param $email_given string
 * @param $password_hash string
 * @param $true_authorization_given int
 * @param $valid_password bool
 */
public function dataRegister($authorization, $lastname_given, $firstname_given, $nickname_given, $age_given, $email_given, $password_hash, $true_authorization_given, $valid_password) {
    if ($authorization) {
        if ($valid_password) {
            $request = $this->myDataBase->prepare("INSERT INTO utilisateur(nom, prenom, pseudo, age, email, mot_de_passe, droit) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $request->execute(array($lastname_given, $firstname_given, $nickname_given, $age_given, $email_given, $password_hash, $true_authorization_given));
            echo "Le compte a bien ete creer";
            // ci-dessus je prépare ma requête pour éviter l'injection SQL, puis à la ligne suivante j'execute la requête
        } else {
            echo "Le mot de passe de confirmation n'est pas identique au mot de passe donné, veuillez réessayer";
        }
    }
}
public function redirect() {
    header("Location: http://localhost/PHP_authentification/connection.html");
}



/**
 * permet de donner ou pas un droit d'administrateur ou un droit d'utilisateur
 * @param $authorization_given string 
 */
public function authorization($authorization_given) {
    if ($authorization_given == "administrateur") {
        return $true_authorization_given = 1;
    } else if ($authorization_given == "utilisateur") {
        return $true_authorization_given = 2;
    } else {
        return $true_authorization_given = 3;
    }
}
}