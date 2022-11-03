<?php

//inclusion bd
 include('../config/bd.php');

//récupération id



$id = $_GET['id'];
//requete suppression
/* $delete = ("DELETE FROM utilisateur WHERE id = '$id'");
$execDelete = $bd -> query($delete);
 */

//pour prendre en compte l'heure de modif
$dateArchive = date('y-m-s');

$etat = 0;
$mat = ("UPDATE utilisateur SET etat = '$etat', dateArchive = '$dateArchive' WHERE id = '$id'");
$modifMat = $bd -> query ($mat) ;

//redirection
header('location: ../views/admin.php');

?>
