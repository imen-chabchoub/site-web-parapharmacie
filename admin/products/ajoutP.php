<?php
session_start();
include "../../functions.php";
$conn=connect();
$nom=$_POST['nom'];
$description=$_POST['description'];
$prix=$_POST['prix'];
$categorie=$_POST['categorie'];
$createur=$_POST['createur'];
$quantite=$_POST['quantite'];
$image=$_POST['image'];
$date=date('Y-m-d');
$requete="INSERT INTO produits(nom,description,prix,categorie,image,createur,date_crea) VALUES('$nom', '$description','$prix','$categorie','$image','$createur','$date') ";


//execution requete
$resultat=$conn->query($requete);

if($resultat){
    $produit_id=$conn->insert_id;
    $requete2="INSERT INTO stock(produit,quantite,createur,date_crea) VALUES('$produit_id','$quantite','$createur','$date')";
    if($conn->query($requete2)){
        header('location:listeP.php?ajout=ok');

    }else{
        echo "impossible d'ajouter le stock du produit";
    }
    
}

?>