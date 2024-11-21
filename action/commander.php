<?php
include '../functions.php';

session_start();
$conn=connect();
//test user connextion
if(!isset($_SESSION['nom'])){
    header('location:../connexion.php');
    exit();
}
$visiteur=$_SESSION['id'];


$id_produit=$_POST['produit'];
$quantite= $_POST['quantite'];

$requete="SELECT prix,prixPromo, enPromo , nom FROM produits WHERE id='$id_produit'";
$resultat=$conn->query($requete);
 $produit=$resultat->fetch_assoc();
 if($produit['enPromo']==1){
    $prix = (float) $produit['prixPromo'];
 }else{
    $prix = (float) $produit['prix'];

 }
 

 $total = $prix * (float) $quantite;
$nom_produit=$produit['nom'];
$date=date('Y-m-d');
if(!isset($_SESSION['panier'])){
    $_SESSION['panier']=array($visiteur,0 , $date,array());

}
$requete1="SELECT id FROM commande";
$resultat1=$conn->query($requete1);
$id_comm=$resultat1->fetch_assoc()['id'];
$_SESSION['panier'][1]+=$total;
$_SESSION['panier'][3][$id_comm]=array($quantite,$total,$date,$date,$id_produit,$nom_produit);
header('location:../panier.php');



?>