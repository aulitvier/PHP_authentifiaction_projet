<?php

class ModifyUserDataBase {
    protected $last_name, $first_name, $nickname, $email, $age, $id;
    public $myDB;
    /**
     * permet de se connecter à la base de données 
     */
    public function connect() {
        try {
            $this->myDB = new PDO("mysql:host=localhost;dbname=authentification", "root", "");
            } catch (PDOException $e) {
                die ("Error!: ".$e->getMessage()."<br/>");
            }
        }
        /**
         * permet de savoir si les $_POST existe et ne sont pas vide
         */
    public function allFieldRegistrationFilled() {
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
     * @param $authorization bool
     * @param $last_name string
     * @param $first_name string
     * @param $nickname string
     * @param $age int
     * @param $email string
     * @param $id int
     * @param $authorization_given int
     */
    public function modifyUser($authorization, $last_name, $first_name, $nickname, $age, $email, $id, $authorization_given) {
        if ($authorization) {
            $request = $this->myDB->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, pseudo = ?, age = ?, email = ?, droit = ? WHERE id = ?");
            $request->execute(array($last_name, $first_name, $nickname, $age, $email, $authorization_given, $id));
            echo "Les données ont bien été modifiées";
        }   
    }
    public function redirect() {
        header("Location: http://localhost/PHP_authentification/connection.html");
    }
    /**
     * permet de mettre dans un tableau les données de la requete
     * @param $request object
     */
    public function useFetch($request) {
        $a = $request->fetch();
        return $a;
    }
    public function knowAuthorization($request_fetch) {
            if ($request_fetch["authorization"] == 1) {
                return $authorization_agree = "administrateur";
            }
            else if ($request_fetch["authorization"] == 2) {
                return $authorization_agree = "utilisateur";
            }
            else {
                return $authorization_agree = "invite";
            }
    }
    /**
     * selectionne les données de l'utilisateur selon l'id de l'url
     * @param $id int
     */
    public function toDisplayUser($id) {
        $request = $this->myDB->prepare("SELECT * FROM utilisateur WHERE id = ?");
        $request->execute(array($id));
        return $request;
    }

    /**
     * affiche les données de l'utilisateur données avec afficherUtilisateur
     * @param $authorization_agree string
     * @param $request_fetch object
     */
    public function displayUser($authorization_agree, $request_fetch) {
            echo    "<form action='processing/modify_user_processing.php?id=$request_fetch[id]' method='post'>
            <div>
                <label for='nom'>Nom :</label>
                <input type='text' name='nom' value='$request_fetch[nom]' required>
            </div>
            <div>
                <label for='prenom'>Prenom :</label>
                <input type='text' name='prenom' value='$request_fetch[prenom]' required>
            </div>
            <div>
                <label for='pseudo'>Pseudo :</label>
                <input type='text' name='pseudo' value='$request_fetch[pseudo]' required>
            </div>
            <div>
                <label for='age'>Age :</label>
                <input type='number' name='age' value='$request_fetch[age]' required>
            </div>
            <div>
                <label for='mail'>E-mail :</label>
                <input type='email' name='mail' value='$request_fetch[email]' required>
            </div>
            <div>
                <p>Ce compte a des droits d'$authorization_agree</p>
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
            <a href='work_user.php'>
            <button>Retour</button>
            </a> ";
        }


    /**
     * permet de sélectionner tous les utilisateur qui ne sont pas administrateur
     */
    public function selectUser() {
        $request = $this->myDB->prepare("SELECT * FROM utilisateur WHERE droit IN (?, ?)");
        $request->execute(array(2, 3));
        return $request;
    }

    /**
     * permet d'afficher tous les utilisateur qui ne sont pas des administrateur
     * @param $request object
     */
    public function displayUsers($request) {
        while ($a = $request->fetch()) {
            echo "<tr>
                    <td>$a[prenom]</td>
                    <td>$a[nom]</td>
                    <td>$a[age]</td>
                    <td>$a[pseudo]</td>
                    <td>$a[email]</td>
                    <td><a href='modify_user.php?id=$a[id]'>Modifier</a></td>
                    <td><a href='delete_user.php?id=$a[id]'>Supprimer</a></td>
                </tr>
                <br/>";
    };
    }
    /**
     * permet de donner ou pas un droit d'administrateur ou un droit d'utilisateur
     * @param $authorization_given string 
     */
    public function authorizationAdmin($authorization_given) {
        if ($authorization_given == "administrateur") {
            return $true_authorization_given = 1;
        } else if ($authorization_given == "utilisateur") {
            return $true_authorization_given = 2;
        } else {
            return $true_authorization_given = 3;
        }
    }
    public function diplayDeleteUser($authorization_agree, $requete_fetch) {
        echo " <p>id : $requete_fetch[id]</p>
        <p>nom : $requete_fetch[nom]</p>
        <p>prenom : $requete_fetch[prenom]</p>
        <p>pseudo : $requete_fetch[pseudo]</p>
        <p>age : $requete_fetch[age]</p>
        <p>email : $requete_fetch[email]</p>
        <p>droit : $authorization_agree</p>
        <a href='processing/delete_user_processing.php?id=$requete_fetch[id]'>
            <button>Supprimer</button>
        </a> ";
    }

    public function deleteUser($id) {
        $my_request = $this->myDB->prepare("DELETE FROM utilisateur WHERE id = ?");
            $my_request->execute(array($id));
            echo "Les données ont bien été supprimées";
    }
}