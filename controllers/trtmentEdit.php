<?php


/* inclusion de la bd */
include("../config/bd.php");

//vérier l'id à modifier existe

if (isset($_GET['id']) && !empty($_GET['id']) ) {
    //récupérer l'id
    $idModif = $_GET['id'];

    $verifId = $bd  -> prepare ("SELECT id FROM utilisateur WHERE id = ?");
    $verifId -> execute(array($_GET['id']));
    header('location: ../views/admin.php');

}else {
    $smgErrors ="ne correspond pas";
}

?>