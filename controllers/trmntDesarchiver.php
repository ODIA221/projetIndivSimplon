<?php

//inclusion bd
 include('../config/bd.php');

//récupération id



$id = $_GET['id'];
//requete suppression
/* $delete = ("DELETE FROM utilisateur WHERE id = '$id'");
$execDelete = $bd -> query($delete);
 */
$etat = 1;
$mat = ("UPDATE utilisateur SET etat = '$etat' WHERE id = '$id'");
$modifMat = $bd -> query ($mat) ;

//redirection
header('location: ../views/affichageArchivage.php');


?>
