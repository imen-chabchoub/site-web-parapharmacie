
<?php
function connect(){
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "parafam";
    // Connexion à la base de données
    $conn = new mysqli($servername, $DBuser, $DBpassword, $DBname);
    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
function getAllProducts(){
    $conn=connect();
    $requete="SELECT * FROM produits";
    $resultat=$conn->query($requete);
    if ($resultat->num_rows > 0) {
        // Création d'un tableau pour stocker les produits
        $produits = array();
        // Parcours des résultats et stockage dans le tableau
        while($row = $resultat->fetch_assoc()) {
            $produits[] = $row;
        }
        // Fermeture de la connexion à la base de données
        $conn->close();
        // Retourne le tableau des produits
        return $produits;
    } else {
        // Si aucun produit trouvé, retourne un tableau vide
        return array();
    }
}
function getCorpsProducts(){
    $conn=connect();
    // Requête SQL pour récupérer tous les produits
    $requete = "SELECT * FROM produits WHERE enPromo=FALSE AND  categorie='corps'";
    // Exécution de la requête
    $resultat = $conn->query($requete);
    // Vérification s'il y a des résultats
    if ($resultat->num_rows > 0) {
        // Création d'un tableau pour stocker les produits
        $produits = array();
        // Parcours des résultats et stockage dans le tableau
        while($row = $resultat->fetch_assoc()) {
            $produits[] = $row;
        }
        // Fermeture de la connexion à la base de données
        $conn->close();
        // Retourne le tableau des produits
        return $produits;
    } else {
        // Si aucun produit trouvé, retourne un tableau vide
        return array();
    }
}
function getHygieneProducts(){
    $conn=connect();

    // Requête SQL pour récupérer tous les produits
    $requete = "SELECT * FROM produits WHERE enPromo=FALSE AND categorie='hygiene'";

    // Exécution de la requête
    $resultat = $conn->query($requete);

    // Vérification s'il y a des résultats
    if ($resultat->num_rows > 0) {
        // Création d'un tableau pour stocker les produits
        $produits = array();

        // Parcours des résultats et stockage dans le tableau
        while($row = $resultat->fetch_assoc()) {
            $produits[] = $row;
        }

        // Fermeture de la connexion à la base de données
        $conn->close();

        // Retourne le tableau des produits
        return $produits;
    } else {
        // Si aucun produit trouvé, retourne un tableau vide
        return array();
    }
}
function getCheveuxProducts(){
    $conn=connect();

    // Requête SQL pour récupérer tous les produits
    $requete = "SELECT * FROM produits WHERE enPromo=FALSE AND categorie='cheveux'";

    // Exécution de la requête
    $resultat = $conn->query($requete);

    // Vérification s'il y a des résultats
    if ($resultat->num_rows > 0) {
        // Création d'un tableau pour stocker les produits
        $produits = array();

        // Parcours des résultats et stockage dans le tableau
        while($row = $resultat->fetch_assoc()) {
            $produits[] = $row;
        }

        // Fermeture de la connexion à la base de données
        $conn->close();

        // Retourne le tableau des produits
        return $produits;
    } else {
        // Si aucun produit trouvé, retourne un tableau vide
        return array();
    }
}
function getSolaireProducts(){
    $conn=connect();

    // Requête SQL pour récupérer tous les produits
    $requete = "SELECT * FROM produits WHERE enPromo=FALSE AND categorie='solaire'";

    // Exécution de la requête
    $resultat = $conn->query($requete);

    // Vérification s'il y a des résultats
    if ($resultat->num_rows > 0) {
        // Création d'un tableau pour stocker les produits
        $produits = array();

        // Parcours des résultats et stockage dans le tableau
        while($row = $resultat->fetch_assoc()) {
            $produits[] = $row;
        }

        // Fermeture de la connexion à la base de données
        $conn->close();

        // Retourne le tableau des produits
        return $produits;
    } else {
        // Si aucun produit trouvé, retourne un tableau vide
        return array();
    }
}
function getMaquillageProducts(){
    $conn=connect();

    // Requête SQL pour récupérer tous les produits
    $requete = "SELECT * FROM produits WHERE enPromo=FALSE AND categorie='maquillage'";

    // Exécution de la requête
    $resultat = $conn->query($requete);

    // Vérification s'il y a des résultats
    if ($resultat->num_rows > 0) {
        // Création d'un tableau pour stocker les produits
        $produits = array();

        // Parcours des résultats et stockage dans le tableau
        while($row = $resultat->fetch_assoc()) {
            $produits[] = $row;
        }

        // Fermeture de la connexion à la base de données
        $conn->close();

        // Retourne le tableau des produits
        return $produits;
    } else {
        // Si aucun produit trouvé, retourne un tableau vide
        return array();
    }
}
function getVisageProducts(){
    $conn=connect();

    // Requête SQL pour récupérer tous les produits
    $requete = "SELECT * FROM produits WHERE  categorie='visage'";

    // Exécution de la requête
    $resultat = $conn->query($requete);

    // Vérification s'il y a des résultats
    if ($resultat->num_rows > 0) {
        // Création d'un tableau pour stocker les produits
        $produits = array();

        // Parcours des résultats et stockage dans le tableau
        while($row = $resultat->fetch_assoc()) {
            $produits[] = $row;
        }

        // Fermeture de la connexion à la base de données
        $conn->close();

        // Retourne le tableau des produits
        return $produits;
    } else {
        // Si aucun produit trouvé, retourne un tableau vide
        return array();
    }
}
function getPromoProducts(){
    $conn=connect();
    $nombreProduits = 5;
    $requete = "SELECT * FROM produits  WHERE enPromo = TRUE LIMIT $nombreProduits";
    $resultat = $conn->query($requete);
    //$produits = $resultat->fetchAll();
    if ($resultat->num_rows > 0) {
        // Création d'un tableau pour stocker les produits
        $produits = array();

        // Parcours des résultats et stockage dans le tableau
        while($row = $resultat->fetch_assoc()) {
            $produits[] = $row;
        }

        // Fermeture de la connexion à la base de données
        $conn->close();

        // Retourne le tableau des produits
        return $produits;
    } else {
        // Si aucun produit trouvé, retourne un tableau vide
        return array();

}
}
function searchProduct($keywords){
    $conn=connect();
    $requete="SELECT * FROM produits WHERE nom LIKE '%$keywords%'";
    $resultat = $conn->query($requete);
    $produits = $resultat->fetch_all(MYSQLI_ASSOC);
    return $produits;

}
function getProduitById($id){
    $conn=connect();
    $requete="SELECT * FROM produits WHERE id=$id ";
    $resultat = $conn->query($requete);
    $produit=$resultat->fetch_assoc();
    return $produit;
}
function AddVisiteur($data){
    $conn=connect();
    $mphash=md5($data['mp']);
    $requete="INSERT INTO visiteur(nom,prenom,mp,email,telephone ) VALUES('".$data['nom']."','".$data['prenom']."','".$mphash."','".$data['email']."','".$data['telephone']."')";
    $resultat=$conn->query($requete);
    
    if($resultat){
        return true;
    }else{
        return false;
    }
}
function connectVisiteur($data){
    $conn=connect();
    $email=$data['email'];
    $mp=md5($data['mp']);
    $requete="SELECT * FROM visiteur WHERE email='$email' AND mp='$mp' ";
    $resultat=$conn->query($requete);
    $user=$resultat->fetch_assoc();
    return $user;

}
function destroySession(){
// Unset all of the session variables.
$_SESSION = array();
// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Finally, destroy the session.
session_destroy();
}
function connectAdmin($data){
    $conn=connect();
    $email=$data['email'];
    $mp=md5($data['mp']);
    $requete="SELECT * FROM administrateur WHERE email='$email' AND mp='$mp' ";
    $resultat=$conn->query($requete);
    $user=$resultat->fetch_assoc();
    return $user;

}
function getAllCategories(){
    $conn=connect();
    $requete="SELECT * FROM categories";
    $resultat=$conn->query($requete);
    $categories=$resultat->fetch_all(MYSQLI_ASSOC);
    return $categories;
}
function getStock(){
    $conn=connect();
    $requete="  SELECT p.nom,s.id,s.quantite FROM produits p,stock s WHERE p.id=s.produit";
    $resultat=$conn->query($requete);
    $stocks=$resultat->fetch_all(MYSQLI_ASSOC);
    return $stocks;
}
function getAllUsers(){
    $conn=connect();
    $requete="SELECT * FROM visiteur WHERE etat=0";
    $resultat=$conn->query($requete);
    $user=$resultat->fetch_all(MYSQLI_ASSOC);
    return $user;
}
?>












