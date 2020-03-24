<?php require_once '../fonction_modele.php'; ?>
<?php 
if($_POST['taille'] && $_POST['quantite']){
    if($_GET['produit']){
        if($_GET['menu_mega']){
            session_start();
            $type = $_GET['menu_mega'];
            //mettre en place l'id du menu pour relier aux produits au début du choix du menu
            if($type == "pizza"){
                if(!isset($_SESSION['idMenu'])){
                    $_SESSION['idMenu'] = 0;  
                }else{
                    $_SESSION['idMenu'] = $_SESSION['idMenu'] + 1; 
                }
            }
            if($type == "dessert" && isset($_SESSION['return_boisson'])){
                unset($_SESSION['return_boisson']);
            }
                
            $produit = htmlentities($_GET['produit']);
            $taille = htmlentities($_POST['taille']);
            $quantite = htmlentities($_POST['quantite']);
            //test pour savoir si la taille est valide
            $bdd = connexion();
            $req = $bdd->prepare('SELECT taille,categorie FROM produit_pizza WHERE libelle= ? AND taille = ? ');
            $result = $req->execute(array($produit,$taille));
            while($donnees = $req->fetch()){
                if($donnees['taille'] == $taille){
                    $categorie =  $donnees['categorie'];
                    $taille_valide = true;
                    break;
                }
            }
            //si la taille est valide alors on vérifie que l'on a bien assez de produit
            if($taille_valide === true){
                $quantite_base_sql = view_quantity($bdd,$categorie);
                if($quantite_base_sql >= $quantite){
                    $_SESSION['menu_mega_produit'][] = $produit . ',' . $taille . ',' . $quantite . ',' . $categorie . ',' . $_SESSION['idMenu'];
                    $_SESSION['mega_menu'][$type] = $produit;
                    //met en place le nombre du menu si on en prend plusieurs
                    if($type == "boisson"){
                        $_SESSION["menu_mega"][]= $_SESSION['mega_menu']['pizza'] . ',' . $_SESSION['mega_menu']['dessert'] . ',' . $_SESSION['mega_menu']['boisson'];
                        unset($_SESSION["mega_menu"]["pizza"]);
                        unset($_SESSION["mega_menu"]["dessert"]);
                        unset($_SESSION["mega_menu"]["boisson"]);
                        unset($_SESSION["mega_menu"]);
                        $_SESSION["return_boisson"] = "non";
                    }
                    //var_dump($_SESSION);
                    header('Location:../menu_mega.php');
                }
            }
        }
    }else{
        header('Location:../menu_mega.php');
    }
    
}else{
    header('Location:../menu_mega.php');
}

?>