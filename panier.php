<?php
include 'functions.php';

session_start();
$total=0;
if(isset($_SESSION['panier'])){
    $total=$_SESSION['panier'][1];

}

$commandes = []; 
if(isset($_SESSION['panier'])){
    if(count($_SESSION['panier'][3])>0){
        $commandes=$_SESSION['panier'][3];
    }
}
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
                <a class="nav-link active" aria-current="page" href="#"><img src="shopping-cart.png" style="width:30px;"></a>
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
        <div>
            <h1 style="    margin-top: 50px; margin-bottom: 50px;">Panier utilisateur</h1>
            <?php if(isset($_GET['delete']) && $_GET['delete']=="ok"){
            echo'<div class="alert alert-success">
            commande supprimée avec succès

        </div>';}?>
            <table class="table" style="margin-bottom: 50px;">
                <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($commandes as $index=>$commande){
        echo'<tr>
        <th scope="row">'.(intval($index)+1).'</th>
        <td>'.$commande[5].'</td>
        <td>'.$commande[0].'</td>
        <td>'.$commande[1].'</td>
        <td><a type="button" href="action/supprimerPanier.php?id='.$index.'" class="btn btn-danger">supprimer</a></td>
      </tr>';
    }
    
    
    
    ?>
   
    
    
  </tbody>
</table>
<div class="text-end mt-3">
    <?php
    if (isset($_SESSION['panier'])){
        echo '<h3>Total:'.$_SESSION['panier'][1].' TND</h3>';
    }else{
        echo '<h3>Total:0 TND</h3>';
    }
    ?>
    
<a type="button" class="pushable" style="margin-left: 10px;" href="action/validerPanier.php">
      <span class="shadow"></span>
      <span class="edge"></span>
      <span class="front">
        valider
      </span>
    </a>
</div>
        <style>
            .pushable {
    text-decoration: none;
    margin-top:50px;
    
  position: relative;
  background: transparent;
  padding: 0px;
  border: none;
  cursor: pointer;
  outline-offset: 4px;
  outline-color: deeppink;
  transition: filter 250ms;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

.shadow {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: hsl(226, 25%, 69%);
  border-radius: 8px;
  filter: blur(2px);
  will-change: transform;
  transform: translateY(2px);
  transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
}

.edge {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  border-radius: 8px;
  background: linear-gradient(
    to right,
    hsl(248, 39%, 39%) 0%,
    hsl(248, 39%, 49%) 8%,
    hsl(248, 39%, 39%) 92%,
    hsl(248, 39%, 29%) 100%
  );
}

.front {
  text-align: center;
  display: block;
  position: relative;
  border-radius: 8px;
  background: hsl(248, 53%, 58%);
  padding: 16px 32px;
  color: white;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  font-size: 1rem;
  transform: translateY(-4px);
  transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
}

.pushable:hover {
  filter: brightness(110%);
}

.pushable:hover .front {
  transform: translateY(-6px);
  transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
}

.pushable:active .front {
  transform: translateY(-2px);
  transition: transform 34ms;
}

.pushable:hover .shadow {
  transform: translateY(4px);
  transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
}

.pushable:active .shadow {
  transform: translateY(1px);
  transition: transform 34ms;
}

.pushable:focus:not(:focus-visible) {
  outline: none;
}
</style>
        
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