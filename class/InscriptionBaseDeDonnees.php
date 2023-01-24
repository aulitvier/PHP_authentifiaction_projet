<?php

class InscriptionBaseDeDonnees {
protected $nom_donne, $prenom_donne, $pseudo_donne, $age_donne, $mail_donne, 
$mot_de_passe_donne, $confirmation_mot_de_passe_donne, $droit_donne;
public $maBDD;

/**
 * permet de vérifier que les données $_POST existe
 */
public function toutChampInscriptionRemplie() {
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
public function connecter() {
    try {
        $this->maBDD = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
        } catch (PDOException $e) {
            die ("Error!: ".$e->getMessage()."<br/>");
        }
        // ci-dessus je créer un nouvel objet PDO avec l'identifiant localhost, 
        // puis je créer un die pour afficher l'erreur si new PDO en contient une
}
/**
 * vérifie si le mot de passe donnée et le même que le mot de passe de confirmation
 * @param $mot_de_passe_donne string 
 * @param $confirmation_mot_de_passe_donne string
 */
public function verifierMDP($autorisation, $mot_de_passe_donne, $confirmation_mot_de_passe_donne) {
    if ($autorisation) {
        if ($mot_de_passe_donne === $confirmation_mot_de_passe_donne) {
            return $mot_de_passe_valide = true;
            // ci-dessus d'après ce que j'ai compris c'est que plus le nombre est grand plus il y a d'opération 
            // qui est éffectuée pour hasher le MDP     
        } else {
            return $mot_de_passe_valide = false;
        }
    } else {
        echo "tout les champs ne sont pas remplie";
    }
    
}
/**
 * hash le mot de passe si verifierMDP envoie true
 * @param $mot_de_passe_valide bool
 * @param $mot_de_passe_donne string  
 */
public function hashMDP($autorisation, $mot_de_passe_valide, $mot_de_passe_donne) {
    if ($autorisation) {
        if ($mot_de_passe_valide) {
            $options = [
                'cost' => 12,
            ];
            return $mot_de_passe_hash = password_hash($mot_de_passe_donne, PASSWORD_BCRYPT, $options);
            // permet de hash le mot de passe avec bcrypt plus le nombre de 'cost' est grand plus il faut d'operation
            // pour déchiffrer le mot de passe
        } else {
            return false;
        }
    }
    
    
}

/**
 * permet d'enregistrer les données
 * @param $nom_donne string
 * @param $prenom_donne string
 * @param $pseudo string 
 * @param $age_donne int
 * @param $mail_donne string
 * @param $mot_de_passe_hash string
 * @param $vrai_droit_donne int
 * @param $mot_de_passe_valide bool
 */
public function enregistrerDonnees($autorisation, $nom_donne, $prenom_donne, $pseudo_donne, $age_donne, $mail_donne, $mot_de_passe_hash, $vrai_droit_donne, $mot_de_passe_valide) {
    if ($autorisation) {
        if ($mot_de_passe_valide) {
            $ma_requete = $this->maBDD->prepare("INSERT INTO utilisateur(nom, prenom, pseudo, age, email, mot_de_passe, droit) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $ma_requete->execute(array($nom_donne, $prenom_donne, $pseudo_donne, $age_donne, $mail_donne, $mot_de_passe_hash, $vrai_droit_donne));
            echo "Le compte a bien ete creer";
            // ci-dessus je prépare ma requête pour éviter l'injection SQL, puis à la ligne suivante j'execute la requête
        } else {
            echo "Le mot de passe de confirmation n'est pas identique au mot de passe donné, veuillez réessayer";
        }
    }
}
public function rediriger() {
    header("Location: http://localhost/PHP_authentification/connexion.php");
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
}
