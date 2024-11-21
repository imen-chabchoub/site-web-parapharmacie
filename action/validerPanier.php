<?php
include '../functions.php';
session_start();
$conn=connect();
//id visiteur
$visiteur=$_SESSION['id'];
$total=$_SESSION['panier'][1];
$date=date('Y-m-d');
// //creation panier

$requetepanier="INSERT INTO panier(visiteur,total,date_crea) VALUES('$visiteur','$total','$date')";
$resultatP=$conn->query($requetepanier);

$panier_id=$conn->insert_id;

$commandes=$_SESSION['panier'][3];
foreach($commandes as $commande){
    $quantite=$commande[0];
    $total=$commande[1];
    $id_produit=$commande[4];
    $requete2="INSERT INTO commande(quantite,total,panier,date_crea,date_modif,produit) VALUES('$quantite','$total','$panier_id','$date','$date','$id_produit')";
    $resultat2=$conn->query($requete2);

}
$_SESSION['panier']=null;
header('location:../panier.php');


?>