<?php
session_start();
//recuperation des données du form
$id=$_POST['idc'];
$nom=$_POST['nom'];
$description=$_POST['description'];
$date_modif=date('Y-m-d');
//chaine de connexion
include "../../functions.php";
$conn=connect();
// creation de la requete 
$requete="UPDATE categories SET nom='$nom' , description='$description', date_modif='$date_modif' WHERE id='$id' ";
//execution requete
$resultat=$conn->query($requete);
if($resultat){
    header('location:liste.php?modif=ok');
}
?>