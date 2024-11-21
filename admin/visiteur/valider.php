<?php
include '../../functions.php';
$conn=connect();
$idvisiteur=$_GET['id'];
$requete="UPDATE visiteur SET etat=1 WHERE id='$idvisiteur' ";
$resultat=$conn->query($requete);
if ($resultat){
    header('location:listeV.php?valider=ok');
}else{
    echo 'Erreur de validation';
}





?>