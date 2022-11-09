<?php
//Pagination
// On détermine sur quelle page on se trouve

$afficher = true;
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

//on se connecte à la base
require('../config/bd.php');

// On détermine le nombre d'enregistrement
$sql = 'SELECT COUNT(*) AS nb_users FROM `utilisateur`;';

// On prépare la requête
$query = $bd->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();


$nbUsers = (int) $result['nb_users'];

// On détermine le nombre d'articles par page
$parPage = 5;

// On calcule le nombre de pages total
$pages = ceil($nbUsers / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

/*$sql = 'SELECT * FROM `utilisateur` ORDER BY `id`  DESC LIMIT :premier, :parpage ;';

// On prépare la requête
$query = $bd->prepare($sql);*/




//.........................

if (@$_GET['submit']) {

    $search = $_GET['recherche'];

    $inputs = $bd -> prepare("SELECT * FROM utilisateur WHERE nom = :nom AND etat = 1 ");
    $inputs -> execute(['nom' => $search]);
}else {
    //recuperer les élement se trouvant dans dans la base 
    $inputs = $bd -> prepare('SELECT * FROM utilisateur  WHERE  etat = 1 ORDER BY id DESC LIMIT :premier, :parpage');
    $inputs -> execute();
}
/* $row = @$inputs -> fetchALL(PDO::FETCH_ASSOC) */;

//........................

@$inputs->bindValue(':premier', $premier, PDO::PARAM_INT);
@$inputs->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
@$inputs->execute();

// On récupère les valeurs dans un tableau associatif
$row = @$inputs->fetchAll(PDO::FETCH_ASSOC);

require_once('../views/user.php');