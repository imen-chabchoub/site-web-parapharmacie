<?php
session_start();
if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="logo-para.png " rel="icon" class="icon">
    <!--<link rel="stylesheet" href="acceuil.css">-->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
    <link rel="stylesheet" href="">
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
                echo '<a id="btnLogin" href="HTTP://'.$_SERVER['HTTP_HOST'].'/pfa-php/profil.php">Profil</a>
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
<body>
    <div class="container">
    <!--<h1>bienvenue <span class="name"><?php// echo $_SESSION['nom'] ." ". $_SESSION['prenom'];?></span></h1>
    <h2>email: <?php //echo $_SESSION['email'] ?></h2>-->
    <h4>Bienvenue <?php  echo $_SESSION['nom'] ; ?> voici vos coordonnées:</h4>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><strong class="adc">Prénom: </strong><?php echo   $_SESSION['prenom'];?> </li>
      <li class="list-group-item"><strong class="adc">Nom:     </strong> <?php echo $_SESSION['nom'] ;?></li>
      <li class="list-group-item"><strong class="adc">Email:   </strong><?php echo $_SESSION['email'] ;?> </li>
    </ul>
    <a class="pushable" href="panier.php">
      <span class="shadow"></span>
      <span class="edge"></span>
      <span class="front">
        Commandes
      </span>
    </a>
    </div>
    
    
<style>
  .adc{
    color:#6885a3;
  }
  .list-group-item{
    margin-top: 20px;
    margin-bottom: 50px;
  }
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
<style>
    .boutondeco {
        
        margin:20px;
        margin-top: 20px;
 background-color: #444141;
 border-radius: 4px;
 color: #fff;
 cursor: pointer;
 padding: 15px 30px;
 font-size: 18px;
 font-weight: bold;
 letter-spacing: 1px;
 border: none;
}
.boutondeco a{
    text-decoration: none;
}

.boutondeco:hover {
 background-image: linear-gradient(90deg, #53cbef 0%, #dcc66c 50%, #ffa3b6 75%, #53cbef 100%);
 animation: slidernbw 5s linear infinite;
 color: #000;
}

@keyframes slidernbw {
 to {
  background-position: 20vw;
 }
}
    
</style>





</html>