<!-- fichier css et boostrap -->
<?php
    include('../config/bd.php');
    include('../controllers/afficherBd.php');
    include('include.php');
    

?>
<!-- fichier css et boostrap -->



<!-- formulaire -->

<!-- nav -->

<div class="container-fluid navBar">
     <!-- photo profil -->
    <div class="profil">
    
    </div>
    <nav>
    <a class="navbar-brand lienNav" href="#">Liste des archivés</a>
        <a class="navbar-brand lienNav" href="deconnexion.php">Déconnexion</a>
    </nav>
</div>
<br>
<br>
<!-- nav -->

<!-- main -->
    <!-- barre de recherche -->
    <div class="container table-responsive-sm-md-lg-xl">
        <div  class="container search">
            <form class="search" action="" method="POST">
                <input type="search" id="search_emp_input" name="recherche" placeholder="recherche..." required  size=50>
                <input id="search_emp_button" type="submit" value="recherche">
            </form>
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
