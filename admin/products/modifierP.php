<?php
session_start();
//chaine de connexion
include "../../functions.php";

$conn=connect();
//recuperation des données du form

$nom=$_POST['nom'];
$categorie_nom = $_POST['categorie'];
//$categorie=$_POST['categorie'];
$date_modif=date('Y-m-d');
$prix=$_POST['prix'];

$image=$_POST['image'];
$id=$_POST['idp'];

$description = $conn->real_escape_string($_POST['description']);
// Récupération de l'ID de la catégorie correspondant au nom sélectionné
$query = "SELECT id FROM categories WHERE nom = '$categorie_nom'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $categorie = $row['id'];
} else {
    // Gestion de l'erreur si la catégorie n'est pas trouvée
    echo "Erreur: Catégorie non trouvée.";
    exit;
}

// creation de la requete 
$requete="UPDATE produits SET nom='$nom' , description='$description',prix='$prix',categorie='$categorie',image='$image' WHERE id='$id' ";
//execution requete
$resultat=$conn->query($requete);
if (!$resultat) {
    // Gestion de l'erreur
    echo "Erreur SQL: " . $conn->error;
} else {
    // La requête s'est exécutée avec succès
    header('location:listeP.php?modif=ok');
}
?>