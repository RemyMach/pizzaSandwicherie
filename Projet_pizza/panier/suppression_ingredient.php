<?php
session_start();
if($_GET['id']){
    $numero = preg_replace('#[a-zA-Z]{1,}#','',htmlspecialchars($_GET['id']));
    $type = preg_replace('#[0-9]#','',htmlspecialchars($_GET['id']));
    echo $type;
    echo $numero;
    if(isset($_SESSION['ingredient'][$type][$numero])){
        echo "jean";
        unset($_SESSION['ingredient'][$type][$numero]);
        header("Location:panier.php");
    }else{
        header("Location:panier.php");
    }
}
header("Location:panier.php");
?>
