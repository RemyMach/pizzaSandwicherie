<?php require_once 'header.php'; ?> 
<div class="container">
  <?php   if(isset($_SESSION['produit']) || isset($_SESSION['menu_mega']) || isset($_SESSION['menu_moyen'])){ ?>
    <div class="row">
      
    <div class="col-md-12 jumbotron p-4 p-md-5 text-white rounded bg-dark" style="height: 100px; 
    background: url('../images/993859.jpg') no-repeat center fixed;
    background-size: cover;
    ">
      <div class="col-md-6 px-0">
        <h1 class="display-5 font-italic" style="color:black;">Panier</h1>
        <p class="lead my-3"></p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold"></a></p>
      </div>
    </div>
  </div>
    <div class="container_2">
         
             <div class="row">
            <div class="col-md-8">
            <!--Pizza-->
       
                <?php   $page = "panier";
                        $bdd = connexion(); 
                        $presence_featurette = 1;
                ?>
                <div class="card">
                    <div class="card-body">
                    <!--boucle pour les Menu_Mega-->
                   <?php if(isset($_SESSION["menu_mega"])) { ?>
                    <?php   require_once 'affichage_menu_mega.php'; ?>
                   <?php } ?>
                    
                   <!--boucle pour les Menu_Mega-->
                   <?php if(isset($_SESSION["menu_moyen"])) { ?>
                    <?php   require_once 'affichage_menu_moyen.php'; ?>
                   <?php } ?>
                   
                    <!--boucle pour les produits-->
                    <?php for($i=0;$i<sizeof($_SESSION['produit']);$i++){ ?>
                        <?php if(sizeof(explode(",",$_SESSION['produit'][$i])) == 4){ ?>
                            <?php if($i == 0 && !isset($_SESSION['menu_mega']) && !isset($_SESSION["menu_moyen"])){ $_SESSION['prix'] = 0; } ?>
                            <?php $details_pizza = explode(',',$_SESSION['produit'][$i]); 
                            $produit = $details_pizza[0];
                            $taille = $details_pizza[1];
                            $quantite = $details_pizza[2];
                            $categorie = $details_pizza[3];
                            $lien = verify_picture($categorie,$produit);
                            $idTaille = "taille" . $i;
                            $idQuantite = "quantite" . $i;
                            $idPrix = "prix" . $i;
                            ?>
                            <?php if($i >= 1 && $presence_featurette == 1){ echo "<hr class=\"featurette-divider\">"; } 
                            $presence_featurette = 1
                            ?>

                        <div class="row" style="position:relative;">
                            <div class="col-md-4">
                                <img src="../images/<?= $lien ?>" alt="immage commande" class="image_panier_commande"/>
                            </div>
                            <div class="col-md-8">
                                <p id="nom_produit<?= $i ?>"><?= $produit ?></p>
                                <b><label id="<?= $idPrix ?>" name="<?= $idPrix ?>"> 
                                <?php   $prix = view_price_default($bdd,$produit,$taille,$quantite);
                                        if(isset($_SESSION['ingredient']['produit'][$i])){
                                            $prix += sizeof($_SESSION['ingredient']['produit'][$i]);
                                            $affichage_message_ingredient = "effacer ingredients";
                                        }else{
                                            $affichage_message_ingredient = "ajouter ingredients";
                                        }
                                        echo (sprintf("%.02f", $prix));
                                        $_SESSION['prix'] += $prix;
                                        ?>
                                </label>€</b>
                                
                                <form action="actualiser_produit_panier.php" method="post" class="form-inline" onsubmit="return verifCommandeValide_panier(this)">
                                    <select  class="custom-select my-1 mr-sm-2" name="<?= $idTaille ?>"  id="<?= $idTaille ?>" 
                                        onchange="request(this,'<?php echo $produit; ?>','<?php echo $page; ?>','<?php echo $idPrix; ?>','<?php echo $idQuantite; ?>')">
                                        <?php $tableau_type = view_taille($bdd,$produit);
                                        foreach($tableau_type as $value){ ?>
                                            <option value="<?= $value ?>" <?php if($value == $taille){ echo "Selected"; } ?>><?= $value ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <label class="my-1 mr-2">Quantité</label>
                                    <input type="number" class="form-control mr-sm-2" value="<?= $quantite ?>" id="<?= $idQuantite ?>" name="<?= $idQuantite ?>" min="1" style="width:50px;" 
                                    onkeyup="request('<?php echo $idTaille; ?>','<?php echo $produit; ?>','<?php echo $page; ?>','<?php echo $idPrix; ?>','<?php echo $idQuantite; ?>')"
                                    onchange="request('<?php echo $idTaille; ?>','<?php echo $produit; ?>','<?php echo $page; ?>','<?php echo $idPrix; ?>','<?php echo $idQuantite; ?>')"/>
                                    <button class="btn btn-primary bouton_panier" type="submit" name="boutton<?= $i ?>" id="boutton<?= $i ?>" value="envoyer">cliquer pour actualiser</button>
                                    <a href="supprimer_produit.php?tableau=<?= $_SESSION['produit'][$i]; ?>" style="position:absolute; top:0px; right:10px;"><img src="../images/croix.png" style="width:28px;"></a>
                                </form>
                    <?php   if($categorie == "pizza" || $categorie == "calzone"){  ?>
                                <?php if(isset($_SESSION['ingredient']['produit'][$i])){ ?>
                                    <form action="suppression_ingredient.php?id=produit<?= $i ?>" method="post">
                                <?php } ?>
                                        <button type="submit" class="btn btn-primary bouton_panier_ingredient"  name="boutton_ingredient_produit<?= $i ?>" id="boutton_ingredient_produit<?= $i ?>" style="position:absolute; top:0px; right:40px;" value="envoyer" 
                                        <?php if(!isset($_SESSION['ingredient']['produit'][$i])){ ?> onclick="show_ingredients(this)" <?php } ?>><?= $affichage_message_ingredient ?></button>
                                <?php   if(isset($_SESSION['ingredient']['produit'][$i])){ ?>
                                    </form>
                                    <div class="row ingredient_affichage">
                                    <?php   foreach($_SESSION['ingredient']['produit'][$i] as $key => $value){ ?>
                                                <a class='lien_ingredient_add'><span class="button_ingredient_real_add"><?= $value ?></span></a>
                                    <?php   } ?>        
                                    </div>          
                                <?php    } ?>
                    <?php   } ?>
                            </div>
                        </div>
                        <?php } ?>
            <?php   } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-ingredient"  id="ingredient" name="ingredient">
                    <div class="card-body">
                        <h3 class="card-title">Ingrédients ajouté</h3>
                        <h6 class="text-muted" style="font-size:0.7em;">1€ par ingrédient par Pizza</h6>
                        <hr class="featurette-divider">
                        <div class="row ingredient_affichage" id="show_ingredient" name="show_ingredient">
                            <a class="croix_ingredient" id="croix_ingredient" onclick="suppr_ingredients(this)"><img src="../images/croix.png" style="width:28px;"></a>
                        </div>
                        <div class="row ingredient_affichage_formulaire" id="show_ingredient_formulaire" name="show_ingredient_formulaire">
                            </div>
                            <hr class="featurette-divider">
                        <div class="row">
                            <?php $ingredients = view_AllIngredients($bdd); ?>
                            <?php foreach($ingredients['libelle'] as $key => $value){ 
                                $value_id = str_replace(" ","_",$value);?>
                                <a class='lien_ingredient' id="<?= $value_id ?>" name="<?= $value_id ?>" onclick="add_ingredient(this)"><div class="button_ingredient"><?= $value ?></div></a>
                           <?php } ?>
                        </div>
                    </div>
                </div>
                <span id="span"></span>
            
            
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">TOTAL</h3>
                        <hr class="featurette-divider">
                        <div class="row">
                            <h6 class="text-muted col-md-6">Sous-total</h6>
                            <h6 class="col-md-6" style="text-align:right;"><?= sprintf("%.02f",$_SESSION['prix']) ?>€</h6>
                        </div><br>

                        <div class="row ligne_livraison" id="livraison">
                            <h6 class="text-muted col-md-6">Livraison</h6>
                            <h6 class="col-md-6" style="text-align:right;">+3€</h6>
                        </div><br>
                    <form action="paiement/verif_connexion_paiement.php?" method="post" class="col-md-12">
                        <div class="row">
                            <select  class="custom-select my-1 mr-sm-2" name="livraison" id="taille" onchange="evaluate_livraison(this)">
                                <option value="sur place">Sur place</option>
                                <option value="à emporter">à emporter</option>
                                <option value="livraison à domicile">livraison à domicile</option>
                            </select>
                        </div><br>
                        <div class="row">
                            <button type="submit" class="btn btn-success col-md-12">PAIEMENT</button>
                        </div>
                    </form>
                    </div>
                </div>
    </div>
<?php }else{ ?>
    <div class="panier_vide" role="Alert">Votre panier est vide</div>
<?php } ?>
</div>
<script src="../js/verif_commande.js"></script>
<script src="../pizza/ajax/produit_price_taille.js"></script>
<script src="../js/panier.js"></script>