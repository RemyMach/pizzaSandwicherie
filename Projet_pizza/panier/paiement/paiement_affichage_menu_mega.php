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
            //echo $lien_mega;echo '<br/>';
            
            //important pour initier que c'est bien le premier produit du menu_mega
            if($categorie_mega_m == "pizza"){ $count = 0; }
?>
            <?php if($count==0){ ?><h2 style="text-align:center; font-family:Muller; font-weight:bold; margin-bottom:20px;">Menu Mega</h2><?php } ?>
            <div class="row" style="position:relative;">
                            <div class="col-md-4">
                            
                                <img src="../../images/<?= $lien_mega ?>" alt="immage commande" class="image_panier_commande"/>
                            </div>
                            <div class="col-md-8">
                                <p><?= $produit_mega_m ?></p>
                                <b><label> 
                                <?php  $prix_tempo = view_price_default($bdd,$produit_mega_m,$taille_mega_m,$quantite_mega_m);
                                        $prix = $prix_tempo * 0.8;
                                        echo (sprintf("%.02f", $prix));
                                        ?>
                                </label>€</b>
                                
                                <div class="form-inline">
                                            <label class="form-control my-1 mr-sm-2"><?= $taille_mega_m ?></label>
                                    <label class="my-1 mr-2">Quantité</label>
                                    <label class="form-control mr-sm-2" style="width:50px;"><?= $quantite_mega_m ?></label>
                                </div>
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