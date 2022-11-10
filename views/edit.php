
<?php 
/* session_start(); */

//sécurité
/*     if(!isset($_SESSION['auth'])) {
        header("location: connexion.php");
        exit;
    }  */
    include_once("include.php");
    include('../controllers/trtmentInscript.php');


if (isset($_POST['btnModifier'])) {

    $id = $_GET['id'];
    


    $nomModif = htmlspecialchars($_POST['nom']) ;
    $prenomModif = htmlspecialchars($_POST['prenom']) ;
    $mailModif = htmlspecialchars($_POST['mailModif']);
  


    //Rechercher si user existe
    $chearcher = ("SELECT * FROM utilisateur WHERE id = '$id' AND etat = 1");
    $chearch = $bd -> query($chearcher);

   
    


    //modification des inscriptions

        //pour prendre en compte l'heure de modif
        $dateModif = date('y-m-s');
       

        $req = "UPDATE utilisateur SET
            nom = '$nomModif',
            prenom = '$prenomModif',
            mail = '$mailModif',
            dateModif = '$dateModif'
            WHERE id = '$id' "; 
         $upadate = $bd -> query($req); 

         
        if($upadate){
            header("location: admin.php");
        }  
}

//Pour recupérer les informations à modifier 
//dans les champs
if (isset($_SESSION['id'])) {
    $idAdmin = $_SESSION['id'];        
    $select = $bd -> query("SELECT * FROM `utilisateur` WHERE id = $idAdmin AND etat = 1");
    $rows =$select -> fetch();


}

?>

<!-- formulaire de modification -->
<div class="container form">
  <!--   <div>
        <H1>Inscription</H1>
    </div> -->
    <div class="container">
        <!-- message connexion réeussie -->
        <!-- message connexion réeussie -->
            <small id="mailValide" style="color: red"></small>
        <!-- message connexion réeussie -->

    <form action="" method="POST" id="inscription">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?=$rows['nom']?>" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?=$rows['prenom']?>" >
            </div>           
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="mailModif">Email</label>
                <input type="text" class="form-control" name="mailModif" id="mailInscript" value="<?=$rows['mail']?>" >

            </div>
        </div>
<!--         <div class="form-row">
  
            <div class="form-group col-md-6">
                <label for="photo">Ajouter un photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
        </div> -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <button type="submit" class="btn" name="btnModifier" style="background-color: #B9B2B2; color: #FFFFFF;">Modifier</button>
                ||
                <span><a href="admin.php">Retour</a></span>
            </div>
        </div>
        
        <div>
            <!-- message connexion réeussie -->
            <small id="success" style="color: green"></small>
            <!-- message connexion réeussie -->
            <!-- message connexion réeussie -->
                    <small id="errors" style="color: red"></small>
            <!-- message connexion réeussie -->

        </div>
    
    </form>
</div>


<!-- fichier JS -->
<script src="test.js"></script>