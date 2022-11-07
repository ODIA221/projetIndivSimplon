<?php
    //inclusion bd
    include('../config/bd.php');
    /* recupération de l'id dans l'url */
    $id = (int) $_GET['id'];

    //récupération id
    //Rechercher si user existe
    $infoUsers = ("SELECT * FROM utilisateur WHERE id = '$id' AND etat = 1");
    $infos = $bd -> prepare($infoUsers);
    $infos  -> execute();

    //afficher les données recupérer dans un tab fetch
    $rows = $infos -> fetch(PDO::FETCH_ASSOC);

        //requete udpdate roles
        if ($rows['roles'] == "Admin") {
            $roles = ("UPDATE utilisateur SET  roles = 'User' WHERE id = '$id' AND etat = 1 ");
            $switch = $bd -> prepare($roles);
            $switch->execute();

        
            header("location: ../views/admin.php");   
        }else {
            $roles = ("UPDATE utilisateur SET roles = 'Admin' WHERE id = '$id' AND etat = 1");
            $switch = $bd -> prepare ($roles);
            $switch -> execute();
            header("location: ../views/admin.php"); 
        }
?>
