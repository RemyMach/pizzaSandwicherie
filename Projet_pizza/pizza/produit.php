<?php require_once 'header.php'; ?> 
<?php 
if(isset($_GET['produit'])){
  //problème de la touche précédent pour le menu mega
  if((isset($_SESSION["mega_menu"]["pizza"]) && $_GET['menu_mega'] == 'pizza') || 
  (isset($_SESSION["mega_menu"]["dessert"]) && $_GET['menu_mega'] == 'dessert') ||
  (isset($_SESSION["return_boisson"]) && $_GET['menu_mega'] == 'boisson')){
    header("Location:../menu_mega.php");
  }
  //problème de la touche précédent pour le menu moyen
  if((isset($_SESSION["moyen_menu"]["pizza"]) && $_GET['menu_moyen'] == 'pizza') ||
  isset($_SESSION['return_boisson_dessert']) && ($_GET['menu_moyen'] == 'dessert' || $_GET['menu_moyen'] == 'boisson')){
    header("Location:../menu_moyen.php");
  } 

  if($_GET['menu_mega'] == "pizza" || $_GET['menu_mega'] == "dessert" || $_GET['menu_mega'] == "boisson"){
    $link = "traitement_commande_menu.php?produit=";
    $quantite_max = 1;
    $link_arg = "&menu_mega=";
    $taille_pizza = "mega";
  }elseif($_GET['menu_moyen'] == "pizza" || $_GET['menu_moyen'] == "dessert" || $_GET['menu_moyen'] == "boisson"){
    $link = "traitement_commande_menu_moyen.php?produit=";
    $quantite_max = 1;
    $link_arg = "&menu_moyen=";
    $taille_pizza = "moyenne";
  }else{
    $link = "traitement_commande.php?produit=";
  }
   ?>

    <?php $bdd = connexion(); 
          $tableau_price = viewPrice($bdd,'Reine');
          $produit = htmlspecialchars($_GET['produit']);
          $type = view_type($bdd,$produit);
          $lien = verify_picture($type,$produit);
          $page = "produit";
          if($_GET['menu_mega']){
            $menu_mega_pizza = $produit;
          }
    ?>

    <div class="container">

      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a class="lien" href="../accueil.php">Accueil</a>
          </li>
          <li class="breadcrumb-item">
            <a class="lien" href="../<?= $type ?>.php"><?= $type ?></a>
          </li>
          <li class="breadcrumb-item active"><?= $produit ?></li>
        </ol>

        <h1 class="mt-4 mb-3"><?= $produit ?></h1>

        <hr class="featurette-divider">

      <div class="row">

        <div class="col-lg-8">
          <img src="<?= '../images/' . $lien ?>" class="img-fluid rounded mt-4 mb-4" style="width: 500px; height: auto;">
          <hr class="featurette-divider">
          <form action="<?= $link ?><?= $produit ?><?php if(isset($link_arg)){ echo $link_arg . $type; }?>" method="post" onsubmit="return verifCommandeValide(this)">
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Taille</label>
                <select  class="form-control" name="taille" id="taille" onchange="request(this,'<?php echo $produit; ?>','<?php echo $page; ?>')">
                  <?php 
                  if(isset($quantite_max) && $type == "pizza"){ ?>
                    <option value="<?= $taille_pizza ?>"><?= $taille_pizza ?></option>
            <?php }else{
                    $tableau_type = view_taille($bdd,$produit);
                    foreach($tableau_type as $value){ ?>
                      <option value="<?= $value ?>"><?= $value ?></option>
            <?php   }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label>Quantité</label>
                <input class="form-control" type="number" name="quantite" value="1" <?php if(isset($quantite_max)){ echo "max=1"; } ?> min="1" id="quantite" 
                onchange="request(taille,'<?php echo $produit; ?>','<?php echo $page; ?>')" onkeyup="request(taille,'<?php echo $produit; ?>','<?php echo $page; ?>')">
                <span class="aide" id="quantite_aide"></span>
              </div>
              <div class="form-group col-md-3">
                <label>Validation</label>
                <button class="btn btn-primary form-control">Ajouter au panier</button>            
              </div>
              <div class="form-group col-md-3" style="text-align: center;">
                <label><b>Prix</b></label><br>
                <b><label id="prix" name="prix">
                <?php if($type == 'pizza'){ echo view_price_default($bdd,$produit,'mega');
                                          }else{
                                            echo view_price_default($bdd,$produit);
                                          }
                                          ?>
                </label>€</b>
              </div>

          </div>
          </form>
          
        </div>

        <div class="col-lg-4">
          <div class="card my-4" style="<?php if($type != 'pizza'){ echo 'display:none'; } ?>">
            <h4 class="card-header">Ingrédients</h4>
            <div class="card-body">
              <p class="card-text"><?php 
              $ingredients = viewIngredients($bdd, $produit);
              echo $ingredients ?></p>
          </div>
        </div>
      </div>
    </div>
    </div>
    </body>
    </html>
    <script src="ajax/produit_price_taille.js"></script>
<?php 
}else{
header("Location:../pizza.php");
} ?>