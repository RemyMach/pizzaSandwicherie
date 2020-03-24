<?php
for($e=0;$e<sizeof($_SESSION['menu_mega']);$e++){
    for($f=($e*3);$f<sizeof($_SESSION['menu_mega_produit']);$f++){
        if(sizeof(explode(",",$_SESSION['menu_mega_produit'][$f])) == 5){
            //echo $_SESSION['produit'][$f];
            $details_pizza_m = explode(',',$_SESSION['menu_mega_produit'][$f]); 
            $produit_mega_m = $details_pizza_m[0];
            $taille_mega_m = $details_pizza_m[1];
            $quantite_mega_m = $details_pizza_m[2];
            $categorie_mega_m = $details_pizza_m[3];
            $lien_mega = verify_picture($categorie_mega_m,$produit_mega_m);
            $idTaille_m = "taille" . $f;
            $idQuantite_m = "quantite_moyen" . $f;
            $idPrix_m = "prix_mega" . $f;
            //important pour initier que c'est bien le premier produit du menu_mega
            if($categorie_mega_m == "pizza"){ $count = 0; }
            if($f == 0){ $_SESSION['prix'] = 0;} 
?>
            <?php if($count==0){ ?><h2 style="text-align:center; font-family:Muller; font-weight:bold; margin-bottom:20px;">Menu Mega</h2><?php } ?>
            <div class="row" style="position:relative;">
                            <div class="col-md-4">
                            
                                <img src="../images/<?= $lien_mega ?>" alt="immage commande" class="image_panier_commande"/>
                            </div>
                            <div class="col-md-8">
                                <p><?= $produit_mega_m ?></p>
                                <b><label id="<?= $idPrix_m ?>" name="<?= $idPrix_m ?>"> 
                                <?php  $prix_tempo = view_price_default($bdd,$produit_mega_m,$taille_mega_m,$quantite_mega_m);
                                        $prix = $prix_tempo * 0.8;
                                        echo (sprintf("%.02f", $prix));
                                        $_SESSION['prix'] += $prix;?>
                                </label>€</b>
                                
                                <form action="" method="post" class="form-inline" onsubmit="return verifCommandeValide_panier(this)">
                                    <select  class="custom-select my-1 mr-sm-2" name="<?= $idTaille ?>"  id="<?= $idTaille ?>" >
                                            <option value="<?= $taille_mega_m ?>"><?= $taille_mega_m ?></option>
                                    </select>
                                    <label class="my-1 mr-2">Quantité</label>
                                    <input type="number" class="form-control mr-sm-2" value="<?= $quantite_mega_m ?>" id="<?= $idQuantite_m ?>" name="<?= $idQuantite_m ?>" max="1" min="1" style="width:50px;" />
                                    <?php if($count==0){ ?><a href="supprimer_menu_mega.php?tableau=<?= $_SESSION['menu_mega_produit'][$f]; ?>" style="position:absolute; top:-50px; right:10px;"><img src="../images/croix.png" style="width:28px;"></a><?php } ?>
                                </form>
                            </div>
                        </div>
                        <?php //la ligne pour séparé le menu et pour montré sa fin
                         if($count == 0 || $count==1){ echo "<br/>";} 
                         $count++;
                         if($count == 3 ){
                            echo "<hr class=\"featurette-divider\">"; 
                            $presence_featurette = 0; 
                            break;
                        
                        } ?>


<?php   } 
                        
    }
    
}
?>