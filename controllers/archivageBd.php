<?php

//include bd
require('../config/bd.php');

//recuperer les élement se trouvant dans dans la base 
$inputs = $bd -> prepare('SELECT * FROM utilisateur   WHERE  etat = 0 ');
$inputs -> execute();

$row = $inputs -> fetchALL(PDO::FETCH_ASSOC);

//recherche
/* $sql = "SELECT * FROM utilisateur WHERE (matricule like '%$recherche%',nom like '%$recherche%' or prenom like  '%$recherche%'  or mail like '%$recherche%') ORDER BY roles DESC" ;
$reponse = $this->conn->query($sql);
if ($reponse->rowCount() > 0) {
$eleves = $reponse->fetchAll() */;

   