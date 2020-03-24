<?php
header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";

$idEditor = (isset($_POST["idEditor"])) ? htmlentities($_POST["idEditor"]) : NULL;
$idEditoring = (isset($_POST["idEditoring"])) ? htmlentities($_POST["idEditoring"]) : NULL;

if ($idEditor) {
    echo "<list>";echo "</list>";
    try{
        /*********le localhost pourra changer si les fichiers php ne sont pas hébergé sur le même serveur que mysql**********/
        $bdd = new PDO('mysql:host=localhost;dbname=ecole;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // le array permet d'afficher les erreurs clairement, pas indispensable
        //nom de l'host:localhost,nom de la base de données:test,login:root,mot de passe:root. Connection
    }catch (Exception $e){
        die('Erreur : votre connexion n\'est pas établie' );
    }				
    $reponse = $bdd->prepare('SELECT libelle,prix_u FROM produit_pizza WHERE taille= ? AND libelle= ?' );
    $reponse->execute(array($idEditor,$idEditoring));
    while($back = $reponse->fetch()){
        //on récupère le name et l'id par la suite
        echo "<item id=\"" . $back['libelle'] . "\" name=\"" . $back['prix_u'] . "\" />";
    }
	
}


echo "</list>";

?>