<?php require_once '../fonction_modele.php'; ?>
<?php 
if($_POST['taille'] && $_POST['quantite']){
    if($_GET['produit']){
        if($_GET['menu_moyen']){
            session_start();
            $type = $_GET['menu_moyen'];
            //mettre en place l'id du menu pour relier aux produits au début du choix du menu et comme ça 5 "string"
            if($type == "pizza"){
                if(!isset($_SESSION['id_menu_moyen'])){
                    $_SESSION['id_menu_moyen'] = 0;  
                }else{
                    $_SESSION['id_menu_moyen'] = $_SESSION['id_menu_moyen'] + 1; 
                }
                if(isset($_SESSION['return_boisson_dessert'])){
                    unset($_SESSION['return_boisson_dessert']);
                }
            }
                
            $produit = htmlentities($_GET['produit']);
            $taille = htmlentities($_POST['taille']);
            $quantite = htmlentities($_POST['quantite']);
            //test pour savoir si la taille est valide
            $bdd = connexion();
            $req = $bdd->prepare('SELECT taille,categorie FROM produit_pizza WHERE libelle= ? AND taille = ? ');
            $result = $req->execute(array(htmlspecialchars($produit),htmlspecialchars($taille)));
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
                    var_dump($_SESSION);
                    $_SESSION['menu_moyen_produit'][] = $produit . ',' . $taille . ',' . $quantite . ',' . $categorie . ',' . $_SESSION['id_menu_moyen'];
                    $_SESSION['moyen_menu'][$type] = $produit;
                    //met en place le nombre du menu si on en prend plusieurs
                    if($type == "boisson" || $type == "dessert"){
                        $_SESSION["menu_moyen"][]= $_SESSION['moyen_menu']['pizza'] . ',' . $_SESSION['moyen_menu'][$type];
                        unset($_SESSION["moyen_menu"]["pizza"]);
                        unset($_SESSION["moyen_menu"][$type]);
                        unset($_SESSION["moyen_menu"]);
                        $_SESSION['return_boisson_dessert'] = "non";
                    }
                    header('Location:../menu_moyen.php');
                }
            }
        }
    }else{
        header('Location:../menu_moyen.php');
    }
    
}else{
    header('Location:../menu_moyen.php');
}

?>