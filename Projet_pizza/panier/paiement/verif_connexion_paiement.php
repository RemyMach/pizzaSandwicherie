<?php session_start(); ?>
<?php
if(isset($_SESSION['nom']) && isset($_SESSION['cp']) && isset($_SESSION['prenom']) && isset($_SESSION['ville']) && isset($_SESSION['nomrue']) && isset($_SESSION['mail']) && isset($_SESSION['id'])){
    if($_POST['livraison'] == "sur place" ){
        $_SESSION['livraison']['libelle'] = "sur place";
        $_SESSION['livraison']['prix'] = '0';
    }elseif($_POST['livraison'] == "à emporter"){
        $_SESSION['livraison']['libelle'] = "à emporter";
        $_SESSION['livraison']['prix'] = '0';
    }elseif($_POST['livraison'] == "livraison à domicile"){
        $_SESSION['livraison']['libelle'] = "livraison à domicile";
        $_SESSION['livraison']['prix'] = '3';
        $_SESSION['prix'] += 3;
    }
    header('Location:paiement.php');
    var_dump($_POST);
}else{
    header('Location:../../formulaire_client/formulaire_connexion.php?paiement=true');
}
?>