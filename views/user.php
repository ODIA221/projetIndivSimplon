<!-- fichier css et boostrap -->
<?php
   //sécurité
/*     if(!isset($_SESSION['auth'])) {
        header("location: connexion.php");
        exit;
    }  */

    session_start();

    include('../config/bd.php');
    include('../controllers/afficherBd.php');
    include('include.php');
    /* les inclusions pour traiment backend */
    include('../controllers/afficherBd.php');




    //resultats recherche
    @$keyword = $_GET['$recherche'];
    @$valider = $_GET['$btnRecherche'];
    if (isset($valider) && !empty(trim($keyword))) {
    $reccherche = $bd -> preapare("SELECT matricule , nom, prenom, mail, roles  FROM utilisateur WHERE etat = 1 AND (matricule LIKE '%$keyword%'  OR  nom LIKE '%$keyword%' OR prenom LIKE '%$keyword%' OR  mail LIKE '%$keyword%' OR roles LIKE '%$keyword%') ");
    $reccherche -> setFetchMode(PDO::FETCH_ASSOC);
    $reccherche -> execute();
    $tabRecheche -> fetchALL();

    $afficher = true;

    var_dump($tabRecheche);
    var_dump($_GET);
    die;
    
    }
?>
<!-- fichier css et boostrap -->



<!-- formulaire -->

<!-- nav -->

<div class="container-fluid navBar">
     <!-- photo profil -->
    <div class="profil">
    
    </div>
    <nav>
    <a class="navbar-brand lienNav" href="affichageArchivageUser.php">Liste des archivés</a>
        <a class="navbar-brand lienNav" href="../controllers/trtmentDeconnexion.php">Déconnexion</a>
    </nav>
</div>
<br>
<br>
<!-- nav -->

<!-- main -->
    <!-- barre de recherche -->
    <div class="container table-responsive-sm-md-lg-xl">
        <div  class="container search">
            <form class="search" action="" method="GET">
                <input type="search" id="search_emp_input" name="recherche" placeholder="recherche..." required  size=50>
                <input id="search_emp_button" type="submit" value="recherche" name="submit">
            </form>
<!--résultat recherche-->
<?php
if (@$afficher) {
?>
<div id="resultat"> 
        <div id="nbr"> 2 Résultats trouvés</div>
        <hr>
        <ol>
            <li>Résultat 1</li>
        </ol>
        </div>
        <hr>
<?php } ?>



<!--résultat-->
        </div>
        <br>
        <br>
    <!-- /barre de recherche -->
    <!-- afficher les éléments de la bases dans un tab -->

        <table border="1px" class="table">
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Rôle</th>
            </tr>
        <?php
        if ($row) {
            foreach($row as $row)
            {
                ?>
                    <tr>
                        <td><?= $row['matricule']; ?></td>
                        <td><?= $row['nom']; ?></td>
                        <td><?= $row['prenom']; ?></td>
                        <td><?= $row['mail']; ?></td>
                        <td><?= $row['roles']; ?></td>
                    </tr>
                <?php
            }                            
        } else {

            echo "Aucune données n'a été trouvée";
            ?>
            <br>
            <br>
            <?php           
        }   
    ?>
    </table>

<!--  pagination -->
<div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
</div>

<!-- /pagination -->


<!-- /main -->

<!-- footer -->
<div class="container-fluid footer">
<nav>
    user
</nav>
</div>

<!-- /footer -->
