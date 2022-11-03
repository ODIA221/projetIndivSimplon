<?php
    //inclusion bd
    include('../config/bd.php');
if (isset($_GET)) {
    # code...

    //récupération id
    //Rechercher si user existe
    $infoUsers = ('SELECT * FROM utilisateur WHERE id = $id AND etat = 1');
    $infos = $bd -> prepare($infoUsers);
    $info = $infos  -> execute();
    /* recupération de l'id dans l'url */
    $id = $_GET['id'];

    /* var_dump($id);
    die; */
    //afficher les données recupérer dans un tab fetch
   /*  $rows = $infos -> fetch(PDO::FETCH_ASSOC); */

        //requete udpdate roles
        if ($info['roles'] == "Admin") {
            $roles = ("UPDATE utilisateur SET  roles = 'User' WHERE id = $id AND etat = 1 ");
            $switch = $bd -> prepare($roles);
            $switch->execute();
            header("location: ../views/admin.php");   
        }else /* if($infos['roles'] == "User") */{
            $roles = ("UPDATE utilisateur SET roles = 'Admin' WHERE id = $id AND etat = 1");
            $switch = $bd -> prepare ($roles);
            $switch -> execute();
            header("location: ../views/admin.php"); 
        }
}
?>
