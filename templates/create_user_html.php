<?php

echo "<!DOCTYPE html>
<head>

</head>
<body>
    <form action='connection.html'>
        <button>Accueil</button>
    </form>
    <form action='processing/registration_processing.php' method='post'>
        <div>
            <label for='nom'>Nom :</label>
            <input type='text' name='nom' required>
        </div>
        <div>
            <label for='prenom'>Prenom :</label>
            <input type='text' name='prenom' required>
        </div>
        <div>
            <label for='pseudo'>Pseudo :</label>
            <input type='text' name='pseudo' required>
        </div>
        <div>
            <label for='age'>Age :</label>
            <input type='number' name='age' required>
        </div>
        <div>
            <label for='mail'>E-mail :</label>
            <input type='email' name='mail' required>
        </div>
        <div>
            <label for='MDP'>Mot de passe :</label>
            <input type='password' name='MDP' required>
        </div>
        <div>
            <label for='MDP'>Confirmation du mot de passe :</label>
            <input type='password' name='confirmation_MDP' required>
        </div>
        <div>
        <input type='radio' name='authorization' value='administrateur' checked>
        <label for='administrateur'>Administrateur</label>
        </div>
        <div>
            <input type='radio' name='authorization' value='utilisateur'>
            <label for='utilisateur'>Utilisateur</label>
        </div>
        <div>
            <input type='radio' name='authorization' value='invite'>
            <label for='invite'>Invite</label>
        </div>
        <div>
            <button type='submit'>Envoyer le formulaire</button>
        </div>
    </form>
</body>";