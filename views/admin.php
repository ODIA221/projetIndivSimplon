<!-- fichier css et boostrap -->
<?php 
    /*bd*/
    include_once('../config/bd.php');
    /* les inclusions boostrap */
    include('include.php');
    /* les inclusions pour traiment backend */
    include('../controllers/afficherBd.php');
    /** */


    /* les inclusions sécurité */
?>
<!-- fichier css et boostrap -->



<!-- formulaire -->
<!-- nav -->
<div class="container-fluid d-flex align-content-start flex-wrap navBar">
     <!-- photo profil -->
    <div class="profil">
        <?php
 
        ?>

    </div>
    <!-- afficer nom et Matricule -->
    <div>
        <?php
            /* $id = $_SESSION['id'];
            $req = $bd -> query("SELECT matricule, nom, prenom FROM utilisateur WHERE id = $id'"); */
        ?>
        oumar
    </div>
        
    <nav>
    <a class="navbar-brand lienNav" href="archivage.php">Liste des archivés</a>
        <a class="navbar-brand lienNav" href="deconnexion.php">Déconnexion</a>
    </nav>
</div>
<br>
<br>

<!-- /nav -->
<!-- main -->
    <!-- barre de recherche -->
    <div class="container table-responsive-sm">
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
                <th>Actions</th>
            </tr>
        <?php
        if ($row) {
            foreach($row as $row)
            {
                ?>
                <div>
                    <tr>
                        <td><?= $row['matricule']; ?></td>
                        <td><?= $row['nom']; ?></td>
                        <td><?= $row['prenom']; ?></td>
                        <td><?= $row['mail']; ?></td>
                        <td><?= $row['roles']; ?></td>
                        <div id="alignItems">
                            <td >
                                <a href="edit.php?id=<?=$row['id']?>" ><svg width="30" height="35" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 39.0001H11.2L33.35 16.8501L31.15 14.6501L9 36.8001V39.0001ZM39.7 14.7001L33.3 8.3001L35.4 6.2001C35.9667 5.63343 36.6667 5.3501 37.5 5.3501C38.3333 5.3501 39.0333 5.63343 39.6 6.2001L41.8 8.4001C42.3667 8.96676 42.65 9.66676 42.65 10.5001C42.65 11.3334 42.3667 12.0334 41.8 12.6001L39.7 14.7001ZM37.6 16.8001L12.4 42.0001H6V35.6001L31.2 10.4001L37.6 16.8001ZM32.25 15.7501L31.15 14.6501L33.35 16.8501L32.25 15.7501Z" fill="black"/>
                                    </svg>
                                </a>
                                <a href="archive.php?id=<?=$row['id']?>"><svg width="20" height="35" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 36C2.2 36 1.5 35.7 0.9 35.1C0.3 34.5 0 33.8 0 33V6.85C0 6.35 0.0500001 5.925 0.15 5.575C0.25 5.225 0.433333 4.9 0.7 4.6L3.5 0.8C3.76667 0.5 4.075 0.291667 4.425 0.175C4.775 0.0583335 5.18333 0 5.65 0H30.35C30.8167 0 31.2167 0.0583335 31.55 0.175C31.8833 0.291667 32.1833 0.5 32.45 0.8L35.3 4.6C35.5667 4.9 35.75 5.225 35.85 5.575C35.95 5.925 36 6.35 36 6.85V33C36 33.8 35.7 34.5 35.1 35.1C34.5 35.7 33.8 36 33 36H3ZM3.85 5.3H32.1L30.3 3H5.65L3.85 5.3ZM3 8.3V33H33V8.3H3ZM18 28.5L25.8 20.7L23.8 18.7L19.5 23V12.95H16.5V23L12.2 18.7L10.2 20.7L18 28.5ZM3 33H33H3Z" fill="black"/>
                                    </svg>
                                </a>
                                <a href="switcher.php?id=<?=$row['id']?>"><svg width="30" height="35" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 42C8.2 42 7.5 41.7 6.9 41.1C6.3 40.5 6 39.8 6 39V12.85C6 12.35 6.05 11.925 6.15 11.575C6.25 11.225 6.43333 10.9 6.7 10.6L9.5 6.8C9.76667 6.5 10.075 6.29167 10.425 6.175C10.775 6.05833 11.1833 6 11.65 6H36.35C36.8167 6 37.2167 6.05833 37.55 6.175C37.8833 6.29167 38.1833 6.5 38.45 6.8L41.3 10.6C41.5667 10.9 41.75 11.225 41.85 11.575C41.95 11.925 42 12.35 42 12.85V39C42 39.8 41.7 40.5 41.1 41.1C40.5 41.7 39.8 42 39 42H9ZM9.85 11.3H38.1L36.3 9H11.65L9.85 11.3ZM9 14.3V39H39V14.3H9ZM22.5 34.5H25.5V24.45L29.8 28.75L31.8 26.75L24 18.95L16.2 26.75L18.2 28.75L22.5 24.45V34.5ZM9 39H39H9Z" fill="black"/>
                                    </svg>
                                </a>
                            </td>   
                        </div>   
                    </tr>
                <?php
            }
            
        
        
                            
        } else {

            echo "Aucune données n'a été trouvée";
            
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
    admin
</nav>
</div>

<!-- /footer -->
