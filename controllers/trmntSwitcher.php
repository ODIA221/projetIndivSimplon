<?php

    //inclusion bd
    include('../config/bd.php');

    //récupération id
    //Rechercher si user existe
    $infoUsers = ('SELECT * FROM utilisateur WHERE id = $id AND etat = 0');
    $infos = $bd -> query($infoUsers);
    /* recupération de l'id dans l'url */
    $id = $_GET['id'];
    //afficher les données recupérer dans un tab fetch
    /* $rows = $chearch -> fetchALL(); */

    //requete udpdate roles
    if ($infos['roles'] == 'Admin') {
        $roles = ("UPDATE utilisateur SET  roles = 'Utilisateur' WHERE id = $id AND etat = 0 ");
        $switch = $bd -> query ($roles);
        header("location: ../views/admin.php");   
    }else {
        $roles = ("UPDATE utilisateur SET roles = 'Administrateur' WHERE id = $id AND etat = 0");
        $switch = $bd -> query ($roles);
        header("location: ../views/admin.php"); 
    }

?>
