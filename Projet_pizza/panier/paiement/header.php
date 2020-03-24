<?php session_start(); ?>
<?php require_once '../../fonction_modele.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Pizza Rémy</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
     <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">
    <link href="../../css/formulaire_perso.css" rel="stylesheet">
    <!-- Javascript -->
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="../../js/verif_commande.js"></script>
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  </head>
  <body>
    <!--Header-->
    <div class="container">
  <header class="blog-header" style="padding-bottom: 0px; margin-bottom: 0px; padding-top: 1em;">
    <div class="row">
      <div class="col-sm-1 dropdown" style=" padding-left: 0px;" >
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            <img src="../../images/menu.png">
          </button>
        <div class="dropdown-menu">
          <h6 class="dropdown-header">Menu</h6>
          <a class="dropdown-item" href="../../menu_mega.php">Méga</a>
          <a class="dropdown-item" href="../../menu_moyen.php">Moyen</a>
        <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">A la carte</h6>
          <a class="dropdown-item" href="../../pizza.php">Pizza</a>
          <a class="dropdown-item" href="../../calzone.php">Calzone</a>
          <a class="dropdown-item" href="../../dessert.php">Dessert</a>
          <a class="dropdown-item" href="../../boissons.php">Boisson</a>
        </div>
      </div>
      <div class="offset-sm-4 col-sm-2 text-center">
        <a class="title_remy" href="../../accueil.php" style="font-family: chivo-black-italic; font-weight: 600;">Pizza Rémy</a>      
      </div>
      <?php if(!isset($_SESSION['prenom'])){ ?>
          <div class="offset-sm-2 col-sm-1 d-flex justify-content-end align-items-center">
            <a class="btn btn-sm btn-outline-secondary" href="../../formulaire_client/formulaire_inscription.php">Inscription</a>
          </div>
          <div class="col-sm-1 d-flex justify-content-end align-items-center">
            <a class="btn btn-sm btn-outline-primary" href="../../formulaire_client/formulaire_connexion.php">Connexion</a>
          </div>
      <?php }else{ ?>
          <div class="offset-sm-2 col-sm-2 d-flex justify-content-end align-items-center">
          <a href="../../formulaire_client/page_client.php"><h5><?= Profil . ' ' . $_SESSION['prenom'] ?></h5></a>
          </div>
      <?php } ?>
        <div class="col-sm-1">
          <a href="../panier.php"><img src="../../images/panier.png" alt="panier" class="rounded image_panier" ></a>
        </div> 

    </div>
    <br>
  </header>
</div>