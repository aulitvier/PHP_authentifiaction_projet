<?php
require("src/modify_page_model.php");
echo "
        <form action='connection.html'>
            <button>Accueil</button>
        </form>
        <form action='processing/modify_page_processing.php?id=$a[id]' method='post'>
            <div>
                <label for='name_page'>Nom de la page :</label>
                <input type='text' name='name_page' value='$a[nom]' required>
            </div>
            <div>
                <label for='title_page'>Titre de la page :</label>
                <input type='text' name='title_page' value='$a[titre]' required>
            </div>
            <div>
                <label for='paragraphe'>Paragraphe :</label>
                <textarea name='paragraphe' required>$a[paragraphe]</textarea>
            </div>
            <div>
                <p>Cette page a des droits d'$authorization_agree</p>
            </div>
            <div>
            <input type='radio' name='authorization' value='administrateur'
                   checked>
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
                <button type='submit'>Enregistrer</button>
            </div>
        </form>
            <a href='work_page.php'>
                <button>Retour</button>
            </a>";