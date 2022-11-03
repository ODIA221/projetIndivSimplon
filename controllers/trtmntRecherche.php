<?php
//inclusion de la bd
require_once('../config/bd.php');


//récupération id
//Rechercher si user existe         //seletion tous les données de la base

$inputs = $bd -> prepare('SELECT * FROM utilisateur  /* ORDER BY DESC */ WHERE  etat = 1');
$inputs -> execute();

$row = $inputs -> fetchALL(PDO::FETCH_ASSOC);

//vérification si btn est actionné
if (isset($_GET['btnRecherche']) && !empty($_GET['recherche'])) {
         

        /* recupération de l'id dans l'url */
        //$id = $_GET['id'];
        
        //récuprération données
        $recherche = htmlspecialchars($_GET['recherche']);

        //Requête de recherche
        $result = $bd -> query("SELECT * FROM utilisateur where etat = 1 and (matricule like '%$recherche%' or nom like '%$recherche%' or prenom like  '%$recherche%'  or mail like '%$recherche%' or roles like '%$recherche%' ORDER BY id DESC )" );
        header("location: ../views/afficherRecheche.php");


}
?>