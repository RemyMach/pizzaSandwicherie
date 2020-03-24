<?php require_once '../fonction_modele.php'; ?>
<?php session_start();
$bdd = connexion();
$tableau_mail_existant = getMail($bdd);
$mail_unique = compareMail($tableau_mail_existant);
if($mail_unique == "mail valide"){
    $retour = add_clients($bdd);
    if($retour == true){
        $tableau_user = getClientbyMail($bdd);
        $_SESSION['nom'] = $tableau_user['nom'];
        $_SESSION['prenom'] = $tableau_user['prenom'];
        $_SESSION['id'] = $tableau_user['id'];
        $_SESSION['mail'] = $tableau_user['mail'];
        $_SESSION['cp'] = $tableau_user['cp'];
        $_SESSION['ville'] = $tableau_user['ville'];
        $_SESSION['tel'] = $tableau_user['tel'];
        $_SESSION['nomrue'] = $tableau_user['nomrue'];
        $_SESSION['password'] = $tableau_user['password'];

        if(isset($_GET['paiement'])){
            header('Location:../panier/paiement/paiement.php');
        }else{
            header('Location:formulaire_inscription.php?success=true');
        }
    }else{
        header('Location:formulaire_inscription.php?error=true'); 
    }
}else{
   header('Location:formulaire_inscription.php?error=mail'); 
}

?>