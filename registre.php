<?php
session_start();
if(isset($_SESSION['nom'])){
  header('location:profil.php');
}

include 'functions.php';
$showRegistrationAlert=0;
// if(!empty($_POST)){
//   if(AddVisiteur($_POST)){
//     $showRegistrationAlert=1;

//   }
// }
if(!empty($_POST)){
  // Vérifiez d'abord si l'utilisateur existe déjà dans la base de données
  $user = connectVisiteur($_POST);
  if($user){
    // Si l'utilisateur existe déjà, affichez un message indiquant que le compte existe
    echo "<script>alert('Ce compte existe déjà. Veuillez utiliser une autre adresse email.')</script>";
  } else {
    // Si l'utilisateur n'existe pas encore, essayez de l'ajouter
    if(AddVisiteur($_POST)){
      $showRegistrationAlert=1;
    }
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
  
    <link rel="stylesheet" href="registre.css">
    <link rel="stylesheet" href="navbar-footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.min.css">

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
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="rechercher" placeholder="rechercher" aria-label="rechercher">
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
      <div class="col-12 p-5">
        <h1>Registre</h1>
        <form action="registre.php" method="post">

            <div class="form-group">
              <label for="exampleInputEmail1">Addresse Email </label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer email"> 
            </div>
            
            <div class="form-group">
              <label for="exampleInputPassword1">mot de passe</label>
              <input type="password" name="mp" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nom</label>
                <input type="text" name="nom" class="form-control" id="exampleInputPassword1" placeholder="Nom">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="exampleInputPassword1" placeholder="Prénom">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Téléphone</label>
                <input type="text" name="telephone" class="form-control" id="exampleInputPassword1" placeholder="Téléphone">
              </div>
            
            <button type="submit" class="btn btn-primary">envoyer</button>
          </form>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
<?php
if($showRegistrationAlert==1){
  echo "<script>
  Swal.fire({
  title: 'succés',
  text: 'compte créé avec succés',
  icon: 'success',
  confirmButtonText: 'ok'
})
</script>";

}

?>

</html>