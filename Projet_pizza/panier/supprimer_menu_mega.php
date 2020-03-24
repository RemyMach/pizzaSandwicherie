<?php
session_start();
if($_GET['tableau']){
    $produit_detail = htmlentities($_GET['tableau']);
    $i=0;
    $count_menu = 0;
    $tableau_produit = explode(",",$produit_detail);
    $id_menu = $tableau_produit[4];
    $tour = sizeof($_SESSION['menu_mega_produit']);
    for($key = 0;$key<$tour;$key++){
        $value = $_SESSION['menu_mega_produit'][$key];
        if($produit_detail == $value && $i != 10){
            unset($_SESSION['menu_mega_produit'][$key]);
            unset($_SESSION['menu_mega_produit'][$key+1]);
            unset($_SESSION['menu_mega_produit'][$key+2]);
            unset($_SESSION['menu_mega'][$id_menu]);
            if($_SESSION['idMenu'] > 0){
                $_SESSION['idMenu'] -= 1;
            }elseif($_SESSION['idMenu'] <= 0){
                unset($_SESSION['idMenu']);
                unset($_SESSION['prix']);
            }
            
            $i = 10;
            //on passe au menu d'après
            $key = $key +2;
            $count_menu++;
        }else{
            echo ($key%3) . "<br/>";
            echo $count_menu . "<br/>"; 
            if(($key % 3) == 0){
                if(isset($_SESSION['menu_mega'][$count_menu])){
                    echo "jean";
                    $tableau_menu[] = $_SESSION['menu_mega'][$count_menu];
                }
                //on passe au menu d'après
                $count_menu++;
            }
            $tableau_produit_menu[] = $value;
        }
    }
    unset($_SESSION['menu_mega_produit']);
    unset($_SESSION['menu_mega']);
    if(isset($tableau_produit_menu) && isset($tableau_menu)){
        foreach($tableau_produit_menu as $key => $value){
            $_SESSION['menu_mega_produit'][$key] = $value;
        }
        foreach($tableau_menu as $key => $value){
            $_SESSION['menu_mega'][$key] = $value;
        }
        header('Location:panier.php');
    }
    header('Location:panier.php');
}
header('Location:panier.php');
?>