<?php

echo "<tr>
        <td>$a[nom]</td>
        <td>$authorization</td>
        <td><a href='display_page.php?id=$a[id]'>Lire</a></td><br/>
        <td><a href='modify_page.php?id=$a[id]'>Modifier</a></td><br/>
        <td><a href='delete_page.php?id=$a[id]'>Supprimer</a>
      </tr>
        <br/>";