<?php include_once '../fonction_modele.php' ?>
<?php
if(isset($_POST) && sizeof($_POST) == 3){
    session_start();
    var_dump($_POST);
    foreach($_POST as $key => $value){
        if(preg_match('#^[0-9]{1,}$#',$value)){
            $quantite = htmlspecialchars($value);  
        }elseif(preg_match('#^taille#',$key)){
            $tableau_number = explode('e',$key);
            $number = $tableau_number[1];
            $taille = htmlspecialchars($value);
        }
    }
    $tableau_session = explode(',',$_SESSION['produit'][$number]);
    $produit = $tableau_session[0];
    $type = $tableau_session[3];
    $bdd = connexion();
    if($taille != $tableau_session[1]){
        $tableau_session[1] = $taille;
    }
    if($quantite != $tableau_session[2] && $quantite < view_quantity($bdd,$type)){
        $tableau_session[2] = $quantite;
    }
    echo $qauntite;
    var_dump($tableau_session);
    $_SESSION['produit'][$number] = implode(',',$tableau_session); 
    header('Location:panier.php');
    echo '<br>';
    var_dump($_SESSION);
}else{
   header('Location:panier.php'); 
}

?>