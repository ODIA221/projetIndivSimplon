<?php

//inclusion bd
 include('../config/bd.php');

//récupération id
$select = ("SELECT * FROM utilisateur WHERE etat = 0");
$selection = $bd -> query($select);

/* recupération de l'id dans l'url */

$id = $_GET['id'];

//afficher les données recupérer dans un tab fetch
$rows = $selection -> fetchALL();



//requete suppression



if ($rows['roles'] == 'Admin') {
    $roles = ("UPDATE utilisateur SET  roles = 'Utilisateur' WHERE id = $id AND etat = 0 ");
    $switch = $bd -> query ($roles);
    /* header("location: admin.php");   */ 
}else {
    $roles = ("UPDATE utilisateur SET roles = 'Administrateur' WHERE id = $id AND etat = 0");
    $switch = $bd -> query ($roles);
    /* header("location: admin.php");  */
}

var_dump($rows[$id]);
die;



?>
