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
    <link rel="stylesheet" href="navbar-footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
    <link rel="stylesheet" href="navbar-footer.css">
    <link rel="stylesheet" href="corpsT.css">

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
            <form class="d-flex" action="visage.php" method="POST">
              <input class="form-control me-2" type="rechercher" placeholder="rechercher" aria-label="rechercher" name="boutonRech">
              <button class="btn btn-outline-success" type="submit">rechercher</button>
            </form>
          </div>
        </div>
      </nav>
      
    </header>
    <main>
        <div class="row category-page-row"> 
            <div class="col large-3 hide-for-medium">
                <div id="shop-sidebar" class="sidebar-inner col-inner">
                    <aside id="text-6" class="widget widget_text">
                        <span class="widget-title shop-sidebar">Marque</span>
                        <div class="is-divider small"></div>
                        <div class="textwidget">
                            <div class="facetwp-facet facetwp-facet-marque facetiwp-type-checkboxes" data-name="marque" data-type="checkboxes">
                                <div class="facetwp-checkbox" data-value="nuxe">
                                    <span class="facetwp-display-value">NUXE</span>
                                    <span class="facetwp-counter">(36)</span>
                                </div>
                                <div class="facetwp-checkbox" data-value="svr">
                                    <span class="facetwp-display-value">SVR</span>
                                    <span class="facetwp-counter">(50)</span>
                                </div>
                                <div class="facetwp-checkbox" data-value="avène">
                                    <span class="facetwp-display-value">Avène</span>
                                    <span class="facetwp-counter">(41)</span>
                                </div>
                                <div class="facetwp-checkbox" data-value="eucerin">
                                    <span class="facetwp-display-value">Eucerin</span>
                                    <span class="facetwp-counter">(22)</span>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col large-9">
            <?php
            // Récupérer tous les produits depuis la base de données
            if (!empty($_POST['boutonRech'])) {
              $produits = searchProduct($_POST['boutonRech']);
          } else {
            $produits = getVisageProducts();
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
                              <?php
                              if($produit['enPromo']==1){ ?>
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

                             <?php }else{ ?>
                              <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi><?php echo $produit['prix']; ?>&nbsp;<span class="woocommerce-Price-currencySymbol">TND</span></bdi>
                                    </span>
                                </ins>


                             <?php
                             }
                              
                              ?>
                    
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