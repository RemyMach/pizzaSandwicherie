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
            //important pour initier que c'est bien le premier produit du menu_mega
            if($categorie_moyen_p == "pizza"){ $count = 0; }
?>
            <?php if($count==0){ ?><h2 style="text-align:center; font-family:Muller; font-weight:bold; margin-bottom:20px;">Menu Moyen</h2><?php } ?>
            <div class="row" style="position:relative;">
                            <div class="col-md-4">
                            
                                <img src="../../images/<?= $lien_moyen ?>" alt="immage commande" class="image_panier_commande"/>
                            </div>
                            <div class="col-md-8">
                                <p><?= $produit_moyen_p ?></p>
                                <b><label> 
                                <?php  $prix_tempo = view_price_default($bdd,$produit_moyen_p,$taille_moyen_p,$quantite_moyen_p);
                                        $prix = $prix_tempo * 0.8;
                                        echo (sprintf("%.02f", $prix));
                                        ?>
                                </label>€</b>
                                
                                <div  class="form-inline">
                                    <label class="form-control my-1 mr-sm-2"><?= $taille_moyen_p ?></label>
                                    <label class="my-1 mr-2">Quantité</label>
                                    <label class="form-control mr-sm-2" style="width:50px;"><?= $quantite_moyen_p ?></label>
                                </div>
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