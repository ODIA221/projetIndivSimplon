 <?php
 //sécuriser la connexion clients

 if (!isset($_SESSION['auth'])) {
    header('location: connexion.php');
    
    exit;
 }