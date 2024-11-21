<?php
include '../../functions.php' ;
$idcategorie=$_GET['idc'];
$conn=connect();
$requete="DELETE FROM categories WHERE id='$idcategorie'";
$resultat=$conn->query($requete);
if($resultat){
    //echo " categorie supprimé";
    header('location:liste.php?delete=ok');
}
?>