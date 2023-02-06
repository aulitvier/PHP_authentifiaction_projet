<?php

echo " <p>id : $a[id]</p>
        <p>nom de la page : $a[nom]</p>
        <p>titre de la page : $a[titre]</p>
        <p>droit : $authorization_agree</p>
        <p>paragraphe : $a[paragraphe]</p><br/>
        <a href='processing/delete_page_processing.php?id=$a[id]'>
            <button>Supprimer</button>
        </a> ";