<?php
//inclusion de la bd
require_once('../config/bd.php');



//vérification si btn est actionné
if (isset($_GET['btnRecherche'])) {

    
    //vérif empty
    if (!empty($_GET['recherche'])) {

        //récupération id
        //Rechercher si user existe         //seletion tous les données de la base
        $infoUsers = ('SELECT * FROM utilisateur WHERE id = $id AND etat = 0');
        $infos = $bd -> query($infoUsers);

        /* recupération de l'id dans l'url */
        $id = $_GET['id'];
        
        //récuprération données
        $recherche = htmlspecialchars($_GET['recherche']);

        //Requête de recherche
        $sql = "SELECT * FROM utilisateur where etat = 0 and id = $id and (matricule like '%$recherche%' or nom like '%$recherche%' or prenom like  '%$recherche%'  or mail like '%$recherche%') or roles like '%$recherche%' ORDER BY id DESC" ;
        $reponse = $bd->query($sql);

       /*  $row = $reponse -> fetch(); */

    }else {
        header("location: admin.php");
    }
}

?>