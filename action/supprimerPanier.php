<?php
include '../functions.php' ;
session_start();
$id=$_GET['id'];
$conn=connect();
//var_dump($_SESSION['panier'][3]);
$total_enlever=$_SESSION['panier'][3][$id][1];

$_SESSION['panier'][1]-=$total_enlever;
unset($_SESSION['panier'][3][$id]);
//var_dump($_SESSION['panier'][3]);
header('location:../panier.php');
// $requete="DELETE FROM panier WHERE id='$idcomm'";
// $resultat=$conn->query($requete);
// if($resultat){
 
//     header('location:panier.php?delete=ok');
// }
?>
