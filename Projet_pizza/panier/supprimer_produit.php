<?php
session_start();
if($_GET['tableau']){
    $produit_detail = htmlentities($_GET['tableau']);
    $i=0;
    foreach($_SESSION['produit'] as $key => $value){
        if($produit_detail == $value && $i != 10){
            unset($_SESSION['produit'][$key]);
            unset($_SESSION['ingredient']['produit'][$key]);
            $numero_produit = $key;
            $i = 10;
        }else{
            if($_SESSION['ingredient']['produit'][$key]){
                $tableau_produit_ingredient[] = $_SESSION['ingredient']['produit'][$key];
            }
            $tableau_produit[] = $value;
        }
    }
    if($_SESSION['ingredient']['produit']){
        unset($_SESSION['ingredient']['produit']);
    }
    unset($_SESSION['produit']);
    if($tableau_produit){
        foreach($tableau_produit as $key => $value){
        $_SESSION['produit'][$key] = $value;
        $_SESSION['ingredient']['produit'][$key] = $tableau_produit_ingredient[$key];
        }        
    header('Location:panier.php');
    }
}
header('Location:panier.php');
?>