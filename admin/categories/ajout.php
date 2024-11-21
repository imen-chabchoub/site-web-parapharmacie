<?php
session_start();
//recuperation des données du form
$nom=$_POST['nom'];
$description=$_POST['description'];
$createur=$_SESSION['id'];
$date_crea=date("Y-m-d");//2024-05-03
//chaine de connexion
include "../../functions.php";
$conn=connect();
// creation de la requete 
$requete="INSERT INTO categories(nom,description,createur,date_crea) VALUES('$nom', '$description','$createur','$date_crea') ";
//execution requete
$resultat=$conn->query($requete);
if($resultat){
    header('location:liste.php?ajout=ok');
}
?>