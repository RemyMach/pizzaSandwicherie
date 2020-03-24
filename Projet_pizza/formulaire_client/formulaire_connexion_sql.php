<?php require_once '../fonction_modele.php'; ?>
<?php
$bdd = connexion();
$tableau_mail_existant = getMail($bdd);
$mail_unique = compareMail($tableau_mail_existant);
if($mail_unique == "mail existant"){
    $tableau_client = getClientbyMail($bdd);
    if(password_verify(htmlspecialchars($_POST['password']),$tableau_client['password'])){
        session_start();
        $_SESSION['id'] = $tableau_client['id'];
        $_SESSION['prenom'] = $tableau_client['prenom'];
        $_SESSION['nom'] = $tableau_client['nom'];
        $_SESSION['mail'] = $tableau_client['mail'];
        $_SESSION['cp'] = $tableau_client['cp'];
        $_SESSION['ville'] = $tableau_client['ville'];
        $_SESSION['nomrue'] = $tableau_client['nomrue'];
        $_SESSION['tel'] = $tableau_client['tel'];
        if(isset($_GET['paiement'])){
            header('Location:../panier/paiement/paiement.php');
        }else{
            header('Location:../accueil.php?success=true');
        }
    }else{
        header('Location:formulaire_connexion.php?error=mail');
    }
}else{
    header('Location:formulaire_connexion.php?error=true'); 
}
?>