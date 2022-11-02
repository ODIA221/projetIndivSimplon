
<?php
$_SESSION = [];
session_destroy();
header("location: ../views/connexion.php");
exit();