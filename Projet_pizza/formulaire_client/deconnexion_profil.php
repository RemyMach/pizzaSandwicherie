<?php
session_start();
if(isset($_SESSION['nom']) && isset($_SESSION['cp']) && isset($_SESSION['prenom']) && isset($_SESSION['ville']) && isset($_SESSION['nomrue']) && isset($_SESSION['mail']) && isset($_SESSION['id'])){
    
    unset($_SESSION['nom']);
    unset($_SESSION['cp']);
    unset($_SESSION['prenom']);
    unset($_SESSION['ville']);
    unset($_SESSION['nomrue']);
    unset($_SESSION['mail']);
    unset($_SESSION['id']);
    unset($_SESSION['tel']);
    header('Location:../accueil.php');
}
?>