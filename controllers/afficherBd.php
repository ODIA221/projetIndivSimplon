<?php

//include bd
require('../config/bd.php');

if (@$_GET['submit']) {

    $search = $_GET['recherche'];

    $inputs = $bd -> prepare("SELECT * FROM utilisateur WHERE nom = :nom AND etat = 1");
    $inputs -> execute(['nom' => $search]);
}else {
    //recuperer les élement se trouvant dans dans la base 
    $inputs = $bd -> prepare('SELECT * FROM utilisateur  WHERE  etat = 1 limit 5');
    $inputs -> execute();
}
$row = @$inputs -> fetchALL(PDO::FETCH_ASSOC);



   