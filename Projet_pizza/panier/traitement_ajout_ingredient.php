<?php
session_start();
//var_dump($_POST);
//echo '<br/>';
//var_dump($_GET);
if($_POST['lien_ingredient0'] && $_GET['id']){
    $numero = preg_replace('#[a-zA-Z]{1,}#','',htmlspecialchars($_GET['id']));
    $type = preg_replace('#[0-9]#','',htmlspecialchars($_GET['id']));
    foreach($_POST as $key => $value){
        $_SESSION['ingredient'][$type][$numero][] = htmlspecialchars($value);
    }
    header('Location:panier.php');
}else{
    header('Location:panier.php');
}
?>