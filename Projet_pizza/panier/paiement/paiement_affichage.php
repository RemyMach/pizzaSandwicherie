<div class="container" style="margin: 60px;">
  <?php   if(isset($_SESSION['produit']) || isset($_SESSION['menu_mega']) || isset($_SESSION['menu_moyen'])){ ?>
    <div class="row">
      
    <div class="col-md-12 jumbotron p-4 p-md-5 text-white rounded bg-dark" style="height: 100px; 
    background: url('../../images/993859.jpg') no-repeat center fixed;
    background-size: cover;
    ">
      <div class="col-md-6 px-0">
        <h1 class="display-5 font-italic" style="color:white;">Recapitulatif de la commande</h1>
        <p class="lead my-3"></p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold"></a></p>
      </div>
    </div>
  </div>
    <div class="container_2">
         
             <div class="row">
                <div class="col-md-8" style="margin:auto;">
            <!--Pizza-->
       
                <?php   $page = "panier";
                        $bdd = connexion(); 
                        $presence_featurette = 1;
                ?>
                <div class="card">
                    <div class="card-body">
                    <!--boucle pour les Menu_Mega-->
                   <?php if(isset($_SESSION["menu_mega"])) { ?>
                    <?php   require_once 'paiement_affichage_menu_mega.php'; ?>
                   <?php } ?>
                    
                   <!--boucle pour les Menu_Mega-->
                   <?php if(isset($_SESSION["menu_moyen"])) { ?>
                    <?php   require_once 'paiement_affichage_menu_moyen.php'; ?>
                   <?php } ?>
                   
                    <!--boucle pour les produits-->
                    <?php for($i=0;$i<sizeof($_SESSION['produit']);$i++){ ?>
                        <?php if(sizeof(explode(",",$_SESSION['produit'][$i])) == 4){ ?>
                            <?php $details_pizza = explode(',',$_SESSION['produit'][$i]); 
                            $produit = $details_pizza[0];
                            $taille = $details_pizza[1];
                            $quantite = $details_pizza[2];
                            $categorie = $details_pizza[3];
                            $lien = verify_picture($categorie,$produit);
                            ?>
                            <?php if($i >= 1 && $presence_featurette == 1){ echo "<hr class=\"featurette-divider\">"; } 
                            $presence_featurette = 1
                            ?>

                        <div class="row" style="position:relative;">
                            <div class="col-md-4">
                                <img src="../../images/<?= $lien ?>" alt="immage commande" class="image_panier_commande"/>
                            </div>
                            <div class="col-md-8">
                                <p><?= $produit ?></p>
                                <b><label> 
                                <?php   $prix = view_price_default($bdd,$produit,$taille,$quantite);
                                        if(isset($_SESSION['ingredient']['produit'][$i])){
                                            $prix += sizeof($_SESSION['ingredient']['produit'][$i]);
                                            $affichage_message_ingredient = "effacer ingredients";
                                        }else{
                                            $affichage_message_ingredient = "ajouter ingredients";
                                        }
                                        echo (sprintf("%.02f", $prix));
                                        ?>
                                </label>€</b>
                                
                                <div class="form-inline">
                                    <label  class="form-control my-1 mr-sm-2"><?= $taille ?></label>
                                    <label class="my-1 mr-2">Quantité</label>
                                    <label class="form-control mr-sm-2" style="width:50px;"><?= $quantite ?></label>
                                </div>
                                    <?php if($_SESSION['ingredient']['produit'][$i]){ ?>
                                        <div class="row ingredient_affichage">
                                    <?php   foreach($_SESSION['ingredient']['produit'][$i] as $key => $value){ ?>
                                                <a class='lien_ingredient_add'><span class="button_ingredient_real_add"><?= $value ?></span></a>
                                    <?php   } ?>        
                                        </div>          
                                <?php       } 
                                        }?>
                            </div>
                        </div>
                        <?php } ?>
        
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">TOTAL</h3>
                        <hr class="featurette-divider">
                        <div class="row">
                            <h6 class="text-muted col-md-6">Sous-total</h6>
                            <h6 class="col-md-6" style="text-align:right;"><?= sprintf("%.02f",$_SESSION['prix']) ?>€</h6>
                        </div><br>

                        <div class="row">
                            <h6 class="text-muted col-md-6">Livraison</h6>
                            <h6 class="col-md-6" style="text-align:right;"><?= $_SESSION['livraison']['prix'] ?>€</h6>
                        </div><br>
                    <form action="paiement/verif_connexion_paiement.php?" form="post" class="col-md-12">
                        <div class="row">
                                <label class="my-1 mr-sm-2"><?= $_SESSION['livraison']['libelle'] ?></label>
                        </div><br>
                    </form>
                    </div>
                </div>
            </div>
    </div>
<?php }else{ ?>
    <div class="panier_vide" role="Alert">Votre panier est vide</div>
<?php } ?>
</div>