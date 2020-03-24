<?php require_once '../fonction_modele.php'; ?>
<?php
if($_POST['taille'] && $_POST['quantite']){
    if($_GET['produit']){
        $produit = htmlentities($_GET['produit']);
        $taille = htmlentities($_POST['taille']);
        $quantite = htmlentities($_POST['quantite']);
        //test pour savoir si la taille est valide
        $bdd = connexion();
        $req = $bdd->prepare('SELECT taille,categorie FROM produit_pizza WHERE libelle= ? AND taille = ? ');
        $result = $req->execute(array($produit,$taille));
        while($donnees = $req->fetch()){
            if($donnees['taille'] == $taille){
                $categorie =  $donnees['categorie'];
                $taille_valide = true;
                break;
            }
        }
        //si la taille est valide alors on vérifie que l'on a bien assez de produit
        if($taille_valide === true){
            $quantite_base_sql = view_quantity($bdd,$categorie);
            if($quantite_base_sql >= $quantite){
                session_start();
                $_SESSION['produit'][] = $produit . ',' . $taille . ',' . $quantite . ',' . $categorie;
                header('Location:../pizza.php');
            }
        }
    }else{
        header('Location:../pizza.php');
    }
    
}else{
    header('Location:../pizza.php');
}

?>