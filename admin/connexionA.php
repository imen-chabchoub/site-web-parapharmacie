<?php
//session_start();
/*if(isset($_SESSION['nom'])){
  header('location:profilA.php');
}
*/
include '../functions.php';
$user= False;
$showError=false;
if(!empty($_POST)){
  $user= connectAdmin($_POST);
  if($user){
    session_start();
    $_SESSION['id']=$user['id'];
    $_SESSION['email']=$user['email'];
    $_SESSION['nomAdmin']=$user['nom'];
    $_SESSION['mp']=$user['mp'];
    $_SESSION['roleAdmin'] = 'admin'; 
    header('location:profilA.php');
  }else{
    $showError=true;
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
  
    <link rel="stylesheet" href="../registre.css">
    <link rel="stylesheet" href="../navbar-footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.min.css">
    <title>Parafam</title>
</head>
<body>
    
    <main>
      <div class="col-12 p-5">
        <h1>Espace Admin:Connexion</h1>
        <form action="connexionA.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Adresse Email </label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer email"> 
            </div>
            
            <div class="form-group">
              <label for="exampleInputPassword1">mot de passe</label>
              <input type="password" name="mp" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            
            
            <button type="submit" class="btn btn-primary">connecter</button>
          </form>

      </div>
    </main>
    <!--footer-->
    <footer class="footer-distributed">
      <div class="footer-left">

          <img class=" imglogo" src="../parafam.png">

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
            <a href="https://www.facebook.com/profile.php?id=100063616330935" target="_blank"><i class="facebook"><img src="../facebook.png"></i></a>
            <a href="https://www.instagram.com/parafam.tunisie/"target="_blank"><i class="instagram"><img src="../instagram.png"></i></a>
          </div>
      </div>
  </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
<?php
if($showError ){
  echo "<script>
  Swal.fire({
  title: 'erreur',
  text: 'coordonnés non valide',
  icon: 'error',
  confirmButtonText: 'ok'
})
</script>";

}

?>
</html>