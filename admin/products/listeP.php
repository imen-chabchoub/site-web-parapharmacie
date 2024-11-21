<?php
session_start();
include '../../functions.php';
$categories=getAllCategories();
$produits=getAllProducts();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>ADMIN: Profil</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    

    

<link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar  sticky-top flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><img src="../../parafam.png" style="width:100px;"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../../deconnexion.php">Deconnexion</a>
    </div>
  </div>
</header>
<style>
    .navbar{Background:linear-gradient( rgb(63, 181, 155),rgb(255, 255, 255));}
</style>

<div class="container-fluid">
  <div class="row">
    <?php
    include '../template/navigation.php';
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Liste des produits</h1>
        
        <div>
            <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
           
        </div>

      </div>
      <div>
        <?php if(isset($_GET['ajout']) && $_GET['ajout']=="ok"){
            echo'<div class="alert alert-success">
            produit ajoutée avec succès

        </div>';}?>
        <?php if(isset($_GET['delete']) && $_GET['delete']=="ok"){
            echo'<div class="alert alert-success">
            produit supprimée avec succès

        </div>';}?>
        <?php if(isset($_GET['modif']) && $_GET['modif']=="ok"){
            echo'<div class="alert alert-success">
            produit modifiée avec succès

        </div>';}?>
      </div>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">prix</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=0;
    foreach($produits as $p){
        $i++;
        echo '<tr>
        <th scope="row">'.$i.'</th>
        <td>'.$p['nom'].'</td>
        <td>'.$p['description'].'</td>
        <td>'.$p['prix'].' TND</td>
        <td>
          <a href="" data-toggle="modal" data-target="#editModal'.$p['id'].'"class="btn btn-success">Modifier</a>
          <a onclick="return popUpDeleteCategorie()" href="supprimerP.php?idp='.$p['id'].'" class="btn btn-danger">Supprimer</a>
        </td>
      </tr>';
    }
    ?>
    
  </tbody>
</table>
    </div>
      
    </main>
  </div>
</div>


<!-- Modal ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="ajoutP.php" method="post">
            <div class="form-group">
                <input type="text" required name="nom" class="form-control" placeholder="nom du produit...">

            </div>
            <div class="form-group">
                <textarea  name="description" required class="form-control"placeholder="description du produit..."></textarea>

            </div>
            <div class="form-group">
                <input type="number" step="0.01" required name="prix" class="form-control" placeholder="prix du produit...">

            </div>
            <div class="form-group">
                <input type="url"   name="image" class="form-control" placeholder="image...">

            </div>
            <div class="form-group">
                <select name="categorie" class="form-control">
                    <?php
                    foreach($categories as $index=>$c){
                        echo '<option value="'.$c['id'].'">'.$c['nom'].'</option>';
                    }
                    ?>
                    
                </select>

            </div>
            <div class="form-group">
              <input type="number" name="quantite" class="form-control" placeholder="tapez la quantite du produit...">

                  </div>
            <input type="hidden" name="createur" value="<?php echo $_SESSION['id'];?>"/>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
foreach($produits as $index=>$produit){?>
<!--modal modif-->
<div class="modal fade" id="editModal<?php echo $produit['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="modifierP.php" method="post">
            <input type="hidden" value="<?php echo $produit['id'];?>" name="idp">
            <div class="form-group">
                <input type="text" name="nom" class="form-control" value="<?php echo $produit['nom'];?>" placeholder="nom du produit...">

            </div>
            <div class="form-group">
                <textarea  name="description" class="form-control"placeholder="description du produit..."><?php echo $produit['description'];?></textarea>

            </div>
            <div class="form-group">
                <input type="number" step="0.01" required name="prix" value="<?php echo $produit['prix'];?>" class="form-control" placeholder="prix du produit...">

            </div>
            <div class="form-group">
                <select name="categorie" class="form-control">
                    <?php
                    foreach($categories as $i=>$c){
                        echo '<option value="'.$c['id'].'">'.$c['nom'].'</option>';
                    }
                    ?>
                    
                </select>
            </div>
            <div class="form-group">
                <input type="url"  required name="image" value="<?php echo $produit['image'];?>" class="form-control" placeholder="image...">

            </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </div>
      </form>
    </div>
  </div>
</div>

<?php
}
?>



   
    <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

      <script src="../../js/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="../../js/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../../js/dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
    function popUpDeleteCategorie(){
        return confirm("vous voulez vraiment supprimer la categorie?");

    }
    </script>
</body>
</html>