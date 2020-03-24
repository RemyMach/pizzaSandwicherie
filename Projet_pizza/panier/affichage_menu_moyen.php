<?php
for($e=0;$e<sizeof($_SESSION['menu_moyen']);$e++){
    for($f=($e*2);$f<sizeof($_SESSION['menu_moyen_produit']);$f++){
        if(sizeof(explode(",",$_SESSION['menu_moyen_produit'][$f])) == 5){
            //echo $_SESSION['produit'][$f];
            $details_pizza_p = explode(',',$_SESSION['menu_moyen_produit'][$f]); 
            $produit_moyen_p = $details_pizza_p[0];
            $taille_moyen_p = $details_pizza_p[1];
            $quantite_moyen_p = $details_pizza_p[2];
            $categorie_moyen_p = $details_pizza_p[3];
            $lien_moyen = verify_picture($categorie_moyen_p,$produit_moyen_p);
            $idTaille_p = "taille" . $f;
            $idQuantite_p = "quantite_moyen" . $f;
            $idPrix_p = "prix_moyen" . $f;
            //important pour initier que c'est bien le premier produit du menu_mega
            if($categorie_moyen_p == "pizza"){ $count = 0; }
            if($f == 0 && !isset($_SESSION['menu_mega'])){ $_SESSION['prix'] = 0; }
?>
            <?php if($count==0){ ?><h2 style="text-align:center; font-family:Muller; font-weight:bold; margin-bottom:20px;">Menu Moyen</h2><?php } ?>
            <div class="row" style="position:relative;">
                            <div class="col-md-4">
                            
                                <img src="../images/<?= $lien_moyen ?>" alt="immage commande" class="image_panier_commande"/>
                            </div>
                            <div class="col-md-8">
                                <p><?= $produit_moyen_p ?></p>
                                <b><label id="<?= $idPrix_p ?>" name="<?= $idPrix_p ?>"> 
                                <?php  $prix_tempo = view_price_default($bdd,$produit_moyen_p,$taille_moyen_p,$quantite_moyen_p);
                                        $prix = $prix_tempo * 0.8;
                                        echo (sprintf("%.02f", $prix));
                                        $_SESSION['prix'] += $prix;?>
                                </label>€</b>
                                
                                <form action="" method="post" class="form-inline" onsubmit="return verifCommandeValide_panier(this)">
                                    <select  class="custom-select my-1 mr-sm-2" name="<?= $idTaille ?>"  id="<?= $idTaille ?>" >
                                            <option value="<?= $taille_moyen_p ?>"><?= $taille_moyen_p ?></option>
                                    </select>
                                    <label class="my-1 mr-2">Quantité</label>
                                    <input type="number" class="form-control mr-sm-2" value="<?= $quantite_moyen_p ?>" id="<?= $idQuantite_p ?>" name="<?= $idQuantite_p ?>" max="1" min="1" style="width:50px;" />
                                    <?php if($count==0){ ?><a href="supprimer_menu_moyen.php?tableau=<?= $_SESSION['menu_moyen_produit'][$f]; ?>" style="position:absolute; top:-50px; right:10px;"><img src="../images/croix.png" style="width:28px;"></a><?php } ?>
                                </form>
                            </div>
                        </div>
                        <?php //la ligne pour séparé le menu et pour montré sa fin
                         if($count == 0){ echo "<br/>";} 
                         $count++;
                         if($count == 2){
                            echo "<hr class=\"featurette-divider\">"; 
                            $presence_featurette = 0; 
                            break;
                        } ?>


<?php   } 
                        
    }
    
}
?>