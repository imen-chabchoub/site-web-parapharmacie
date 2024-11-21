<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="logo-para.png " rel="icon" class="icon">
    <!--<link rel="stylesheet" href="acceuil.css">-->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
    <link rel="stylesheet" href="corps.css">
    <link rel="stylesheet" href="navbar-footer.css">
    <title>Parafam</title>
</head>
<body>
  <!--naviggation bar avec bootstrap-->
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <img class="imglogo" src="parafam.png">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./acceuil.php">Acceuil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./corps.php">Corps</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./cheveux.php">Cheveux</a>
              </li>
                
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./hygiène.php">Hygiène</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./solaire.php">Solaire</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./maquillage.php">Maquillage</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./visage.php">Visage</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
              </li>
               
              <?php 
              if (isset($_SESSION['nom'])){
                echo '<a id="btnLogin" href="profil.php">Profil</a>
                <a id="btnLogin" href="deconnexion.php"><span>Deconnexion</span></a>';
              }else{
                echo'<a id="btnLogin" href="connexion.php">Connexion</a>
                <a id="btnSignUp" href="registre.php">Registre</a>';
              }
              ?>
              <li class="nav-item">
                <a href="panier.php" class="nav-link active" aria-current="page" href="#"><img src="shopping-cart.png" style="width:30px;"></a>
              </li>
              <form class="d-flex" role="search" action="cheveux.php"   method="POST">
              <input class="form-control me-2" type="rechercher" placeholder="rechercher" aria-label="rechercher" name="boutonRech">
              <button class="btn btn-outline-success" type="submit">rechercher</button>
            </form>
          </div>
        </div>
      </nav>
      <script>
        document.getElementById("btnLogin").addEventListener("click", function() {
    // Actions à effectuer lors du clic sur le bouton de connexion
    // Par exemple, afficher un formulaire de connexion
});
      </script>
          <?php
if(isset($_SESSION['email'] ) && isset($_SESSION['etat']) ){
  if($_SESSION['etat']==0){
    echo '<div class="alert alert-danger">
  compte non validée';
  }
}
?>
    </header>
    <?php
include 'functions.php';
if(isset($_GET['id'])){
    $produit=getProduitById($_GET['id']);
    if($produit) {
        
?>

    <main>

        <div class="col-lg-9" style=" width: 800px; display: block; margin: auto;">
            <div class="card">
                <img class="card-img-top" style=" width: 500px; display: block; margin: auto;" src="<?php echo $produit['image'];?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit['nom'];?></h5>
                    <p class="card-text"><?php echo $produit['description'];?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><bdi><?php echo $produit['prix']; ?>&nbsp;<span class="woocommerce-Price-currencySymbol">TND</span></bdi></li>
                    <li class="list-group-item"><?php echo $produit['categorie'];?></li>
                </ul>
            </div>
            <div>
              <form  class="d-flex" action="action/commander.php" method="POST">
                <input type="hidden" value="<?php echo $produit['id'];?>" name="produit">
                <input type="number" name="quantite" class="form-control" step="1" placeholder="quantite de produit...">
                <button type="submit" <?php if (isset($_SESSION['email']) && isset($_SESSION['etat'])){if($_SESSION['etat']==0){echo "disabled";}} ?> class="btn btn-primary">commander</button>
              </form>
            </div>
        </div>
    
</main>
    <?php
    } else {
        echo "Produit non trouvé."; // Message d'erreur si le produit n'existe pas
    }
}
?>
    <!--footer-->
    <footer class="footer-distributed">
      <div class="footer-left">

          <img class=" imglogo" src="parafam.png">

          <p class="footer-links">
              <a href="" class="link-1">acceuil</a>
              
              <a href="">corps</a>
          
              <a href="">cheveux</a>
          
              <a href="">solaire</a>
              <a href="">hygiène</a>
              <a href="">maquillage</a>
          </p>

          <p class="footer-company-name">Parafam© 2024</p>
      </div>

      <div class="footer-center">

          <div>
              <i class="fa fa-map-marker"></i>
              <p><span>17 rue Osmen Bahri </span> Ain Zaghouan, El Aouina, Tunis</p>
          </div>

          <div>
              <i class="fa fa-phone"></i>
              <p>+21620737738</p>
          </div>

          <div>
              <i class="fa fa-envelope"></i>
              <p><a href="mailto:support@company.com">parafam.tunisie@gmail.com</a></p>
          </div>

      </div>

      <div class="footer-right">

          <p class="footer-company-about">
              <span>A propos de nous</span>
              Espace santé et bien etre  et vente d'accessoires et matériel paramédical.
          </p>

          <div class="footer-icons">
            <a href="https://www.facebook.com/profile.php?id=100063616330935" target="_blank"><i class="facebook"><img src="facebook.png"></i></a>
            <a href="https://www.instagram.com/parafam.tunisie/"target="_blank"><i class="instagram"><img src="instagram.png"></i></a>
          </div>
      </div>
  </footer>
</body>
</html>