<?php
include '../../functions.php' ;
$idproduit=$_GET['idp'];
$conn=connect();
$requete="DELETE FROM produits WHERE id='$idproduit'";
$resultat=$conn->query($requete);
if($resultat){
    $requete2="DELETE FROM stock WHERE produit='$idproduit'";
    if($conn->query($requete2)){
        header('location:listeP.php?delete=ok');

    }else{
        echo "impossible de supprimer le stock du produit";
    }
    
}
?>