<?php
include 'functions.php';

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
  
    <link rel="stylesheet" href="acceuil.css">
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
            <form class="d-flex" role="search" action="acceuil.php"   method="POST">
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
      
      
    </header>
    <main>
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="affiche1.png" class="affiche" >
          </div>
          <div class="carousel-item">
            <img src="affiche2.png" class="affiche" >
          </div>
          <div class="carousel-item">
            <img src="affiche3.png" class="affiche" >
          </div>
          <div class="carousel-item">
            <img src="affiche4.png" class="affiche" >
          </div>
          <div class="carousel-item">
            <img src="affiche5.png" class="affiche" >
          </div>
        </div>
       
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            let currentIndex = 0;
            const slides = document.querySelectorAll(".carousel-item");
    
            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove("active"));
                slides[index].classList.add("active");
            }
    
          function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
          }
    
          setInterval(nextSlide, 2000); // Change la diapositive toutes les 5 secondes (5000 ms)
          });

        </script>
      </div>
      <div class="container section-title-container"> 

        <h2 class="section-title section-title-center"> 
        <b></b>
        <span class="section-title-main" style="color:rgb(1, 9, 122);">PROMO</span>
        <b></b>
        </h2>
      </div>
        
        <div class="row">
        <?php
// Récupérer tous les produits depuis la base de données
if (!empty($_POST['boutonRech'])) {
    $produits = searchProduct($_POST['boutonRech']);
} else {
    $produits = getPromoProducts();
}

// Vérifier s'il y a des produits
if (!empty($produits)) {
    // Itérer à travers les produits
    foreach ($produits as $produit) {
        ?>
        <div class="product">
        <a href="produit.php?id=<?php echo $produit['id']; ?>" style="color:black;">
            <img class="img-product"   style="width:200px; display:block; margin: auto;" src="<?php echo $produit['image']; ?>">
            <div class="box-text text-center">
                <div class="title-wrapper">
                    <p><?php echo $produit['nom']; ?></p>
                </div>
    </a>
                <div class="price-wrapper">
                    <span class="price">
                        <del aria-hidden="true">
                            <span class="woocommerce-Price-amount amount">
                                <bdi><?php echo $produit['prix']; ?>&nbsp;<span class="woocommerce-Price-currencySymbol">TND</span></bdi>
                            </span>
                        </del>
                        <ins>
                            <span class="woocommerce-Price-amount amount">
                                <bdi><?php echo $produit['prixPromo']; ?>&nbsp;<span class="woocommerce-Price-currencySymbol">TND</span></bdi>
                            </span>
                        </ins>
                    </span>
                </div>
                <form action="action/commander.php" method="POST">
                                <input type="hidden" name="produit" value="<?php echo $produit['id']; ?>">
                                <input type="hidden" name="quantite" value="1">
                                <button type="submit" class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-outline" aria-label="Ajouter au panier : <?php echo $produit['nom']; ?>" aria-describedby rel="nofollow">Ajouter au panier</button>
                              </form>
                
            </div>
        </div>
        <?php
    }
} else {
    // Afficher un message si aucun produit n'est trouvé
    echo "<p>Aucun produit trouvé.</p>";
}
?>
      </div>
    </main>
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