<?php
if(session_status() != PHP_SESSION_ACTIVE){
     session_start();
}

try {
     $baseDeDonnees = "gestionInscription";
     $monCompte = "root";
     $mdp ="";
     $serverLocal= "localhost";

    $bd = new PDO("mysql:host=$serverLocal;dbname=$baseDeDonnees;charset=utf8", $monCompte, $mdp);

    

} catch (PDOException $e){
     echo ('erreur de connexion '. $e->getMessage(). '<br>');
     die();
}

