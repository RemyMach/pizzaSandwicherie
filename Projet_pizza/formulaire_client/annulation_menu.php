<?php
session_start();
if(isset($_GET['menu_mega']) && isset($_POST['annulation_mega'])){
    if(isset($_SESSION['mega_menu'])){
        unset($_SESSION['mega_menu']);
    }
    header('Location:../menu_mega.php');

}elseif(isset($_GET['menu_moyen']) && isset($_POST['annulation_moyen'])){
    if(isset($_SESSION['moyen_menu'])){
        unset($_SESSION['moyen_menu']);
    }
    header('Location:../menu_moyen.php');
}else{
    header('Location:../accueil.php');
}
?>