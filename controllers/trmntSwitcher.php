<?php
    //inclusion bd
    include('../config/bd.php');
if (isset($_GET)) {
    /* recupération de l'id dans l'url */
    //récupération id
    $id = (int) $_GET['id'];


    //Rechercher si user existe
    $infoUsers =  $bd -> query('SELECT * FROM utilisateur WHERE id = "$id" AND etat = 1');
 /*    $infos = $bd -> prepare($infoUsers);
    $info = $infos  -> execute(); */

    //afficher les données recupérer dans un tab fetch
    $rows = $infoUsers -> fetchALL();
/*     var_dump($rows );
    var_dump($_GET);
    die; */
        //requete udpdate roles
        if ($info['roles'] == "Admin") {
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
}
?>
