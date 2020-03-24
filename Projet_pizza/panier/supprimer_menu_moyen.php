<?php
session_start();
if($_GET['tableau']){
    $produit_detail = htmlentities($_GET['tableau']);
    $i=0;
    $count_menu = 0;
    $tableau_produit = explode(",",$produit_detail);
    $id_menu = $tableau_produit[4];
    $tour = sizeof($_SESSION['menu_moyen_produit']);
    for($key = 0;$key<$tour;$key++){
        $value = $_SESSION['menu_moyen_produit'][$key];
        if($produit_detail == $value && $i != 10){
            unset($_SESSION['menu_moyen_produit'][$key]);
            unset($_SESSION['menu_moyen_produit'][$key+1]);
            echo $_SESSION['menu_moyen'][$id_menu];
            unset($_SESSION['menu_moyen'][$id_menu]);
            if($_SESSION['id_menu_moyen'] > 0){
                $_SESSION['id_menu_moyen'] -= 1;
            }elseif($_SESSION['id_menu_moyen'] <= 0){
                unset($_SESSION['id_menu_moyen']);
                unset($_SESSION['prix']);
            }
            $i = 10;
            //on passe au menu d'après
            $key = $key +2;
            $count_menu++;
        }else{
            if(($key % 3) == 0){
                if(isset($_SESSION['menu_moyen'][$count_menu])){
                    $tableau_menu[] = $_SESSION['menu_moyen'][$count_menu];
                }
                //on passe au menu d'après
                $count_menu++;
            }
            $tableau_produit_menu[] = $value;
        }
    }
    unset($_SESSION['menu_moyen_produit']);
    unset($_SESSION['menu_moyen']);
    if(isset($tableau_produit_menu) && isset($tableau_menu)){
        foreach($tableau_produit_menu as $key => $value){
            $_SESSION['menu_moyen_produit'][$key] = $value;
        }
        foreach($tableau_menu as $key => $value){
            $_SESSION['menu_moyen'][$key] = $value;
        }
        header('Location:panier.php');
    }
    header('Location:panier.php');
}
header('Location:panier.php');
?>