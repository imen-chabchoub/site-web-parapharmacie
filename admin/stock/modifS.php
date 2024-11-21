<?php
session_start();
//recuperation des données du form
$id=$_POST['ids'];
$quantite=$_POST['qte'];

//chaine de connexion
include "../../functions.php";
$conn=connect();
// creation de la requete 
$requete="UPDATE stock SET quantite='$quantite' WHERE id='$id' ";
//execution requete
$resultat=$conn->query($requete);
if($resultat){
    header('location:listeS.php?modif=ok');
}
?>