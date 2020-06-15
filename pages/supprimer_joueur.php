<?php/*
include("../connexion/connection_base.php");
   if ( isset($id) ) {
    $req = $bdd->exec('DELETE FROM `joueur` WHERE `id` = '.$id);
 
    if ( !$req ) {
        echo 'Erreur de suppression';
    } else {
        echo 'Entrée '.$id.' supprimée';
    }
        echo"<script> confirm('voulez vous supprimer')</script>";
        echo"<script>window.location.href='liste_joueur.php';</script>";
       }*/
?>
<?php
try {
   $bdd = new PDO('mysql:host=localhost;dbname=miniprojet_qcm_quizz_sa');
  } catch (Exception $e) {
   die('erreur : ' . $e -> getMessage());
  }
if (isset($_GET['id']) && !empty($_GET['id'])) {
 $id = $_GET['id'];
 $sql = "DELETE FROM joueur WHERE id = :id";
 $q = array('id' => $id);
 $req = $bdd -> prepare($sql);
 $req -> execute($q);
 header('Location:iste_joueur.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Supprimer Joueur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    
</body>
</html>