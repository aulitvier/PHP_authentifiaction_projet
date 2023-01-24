<input type="radio" id="aller" name="choix" value="aller" /> Aller 
<input type="radio" id="retour" name="choix" value="retour" /> Retour
<?php
echo $_POST['choix'];
/** 
*bla bla bla bla
*@param $a int premier paramètre
*@param $b int deuxième paramètre  
*/
function aditionner($a, $b) {
    return $a + $b;
} 

aditionner(3, 9);
?>