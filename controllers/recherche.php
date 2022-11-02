<?php
//inclusion de la bd
require_once('../config/bd.php');



//vérification si btn est actionné
if (isset($_GET['btnRecherche'])) {
    
    //vérif empty
    if (!empty($_GET['recherche'])) {
        
        //récuprération données
        $recherche = htmlspecialchars($_GET['recherche']);

        //seletion tous les données de la base
        $select = "SELECT * FROM utilisateur";
        $selection = $bd -> query($select);

        //
        $sql = "SELECT * FROM utilisateur where archive = 0 and (matricule like '%$recherche%' or nom like '%$recherche%' or prenom like  '%$recherche%'  or mail like '%$recherche%') or roles like '%$recherche%' ORDER BY id DESC" ;
        $reponse = $bd->query($sql);
       

    }else {
        header("location: admin.php");
    }
}

?>