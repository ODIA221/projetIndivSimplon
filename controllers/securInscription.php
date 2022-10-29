 <?php
 //sécuriser la connexion clients

 if (!isset($_SESSION['auth'])) {
    header('location: ../views/connexion.php');
    
    exit;
 }