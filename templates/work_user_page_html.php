<?php
echo "  
        <form action='connection.html'>
                <button>Accueil</button>
        </form>
        <tr>
        <td>$a[nom]</td>
        <td>$authorization</td>
        <td><a href='display_page.php?id=$a[id]'>Lire</a></td><br/>
        <td><a href='modify_page.php?id=$a[id]'>Modifier</a></td><br/>
        </tr>
<br/>";