<?php
//connexion
function connexion(){
    try{
        /*********le localhost pourra changer si les fichiers php ne sont pas hébergé sur le même serveur que mysql**********/
        $bdd = new PDO('mysql:host=localhost;dbname=ecole;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // le array permet d'afficher les erreurs clairement, pas indispensable
        //nom de l'host:localhost,nom de la base de données:test,login:root,mot de passe:root. Connection
    }catch (Exception $e){
            die('Erreur : votre connexion n\'est pas établie' );
    }
    return $bdd;
}

function open_row($tour){
    if($tour%4 == 1){
        echo '<div class="row">';
    }
}

function close_row($tour){
    if($tour%4 == 0){
        echo '</div>';
    }
}

//afficher les boissons en grille
function view_boissons($bdd,$menu_session = null){
    if($menu_session == "boisson1")
    { 
        $menu_session = str_replace('1','',$menu_session);
        $link_arg =  "&menu_mega=" . $menu_session; 
    }
    elseif($menu_session == "boisson2")
    { 
        $menu_session = str_replace('2','',$menu_session);
        $link_arg =  "&menu_moyen=" . $menu_session; 
    }
    $tour = 1;
    $reponse = $bdd->query('SELECT id,libelle FROM produit_pizza WHERE categorie=\'boisson\' ');
    while($donnees = $reponse->fetch()){ 
        $libelle = str_replace(' ','',$donnees['libelle']);
        $libelle = str_replace('-','',$libelle);
        open_row($tour);

        if(@exif_imagetype('images/boisson/' . $libelle . '.png') == IMAGETYPE_PNG){
        ?>
            <div class=" col-sm-3">
                <a href="<?= 'pizza/produit.php?produit='. $donnees['libelle']?><?php 
                if($menu_session != null)
                { 
                    echo $link_arg;
                } ?>"><img src="images/boisson/<?= $libelle ?>.png" alt="<?= $donnees['libelle'] ?>" class="offset-sm-1 img-thumbnail">
                <p class="description-pizza"><?= $donnees['libelle'] ?></p></a>
            </div>
        <?php   
        }else{
        ?>
            <div class=" col-sm-3">
                <a href="<?= 'pizza/produit.php?produit='. $donnees['libelle']?><?php 
                if($menu_session != null)
                { 
                    echo $link_arg;
                } ?>"><img src="images/boisson/<?= $libelle ?>.jpg" alt="<?= $donnees['libelle'] ?>" class="offset-sm-1 img-thumbnail">
                <p class="description-pizza"><?= $donnees['libelle'] ?></p></a>
            </div>
        <?php
        }
        
        close_row($tour);
        $tour ++;
        ?>
       

    <?php
    }
    $reponse->CloseCursor();
}

//afficher les pizzas en grille
function view_pizzas($bdd,$menu_session = null){
    if($menu_session == "pizza1")
    { 
        $menu_session = str_replace('1','',$menu_session);
        $link_arg =  "&menu_mega=" . $menu_session; 
    }
    elseif($menu_session == "pizza2")
    { 
        $menu_session = str_replace('2','',$menu_session);
        $link_arg =  "&menu_moyen=" . $menu_session; 
    }
    $tour = 1;
    $reponse = $bdd->query('SELECT id,libelle FROM produit_pizza WHERE categorie=\'pizza\' AND taille=\'mega\' ');
    while($donnees = $reponse->fetch()){ 
        $libelle = str_replace(' ','',$donnees['libelle']);
        open_row($tour);
        
        if(@exif_imagetype('images/' . $libelle . '.png') == IMAGETYPE_PNG){
        ?>
            <div class=" col-sm-3">
                <a href="<?= 'pizza/produit.php?produit='. $donnees['libelle']?><?php 
                if($menu_session != null)
                { 
                    echo $link_arg;
                }
                 ?>"><img src="images/pizza/<?= $libelle ?>.png" alt="<?= $donnees['libelle'] ?>" class="offset-sm-1 img-thumbnail">
                <p class="description-pizza"><?= $donnees['libelle'] ?></p></a>
            </div>
        <?php   
        }else{
        ?>
            <div class=" col-sm-3">
                <a href="<?= 'pizza/produit.php?produit=' . $donnees['libelle']?><?php 
                if($menu_session != null)
                { 
                    echo $link_arg;
                }
                 ?>"><img src="images/pizza/<?= $libelle ?>.jpg" alt="<?= $donnees['libelle'] ?>" class="offset-sm-1 img-thumbnail">
                <p class="description-pizza"><?= $donnees['libelle'] ?></p></a>
            </div>
        <?php
        }
        if($menu_session != null){

        }
        
        close_row($tour);
        $tour ++;
    }
    $reponse->CloseCursor();

}
/**Vérifier le format des photos */
function verify_picture($source,$produit){
    $produit = str_replace(' ','',$produit);
    $produit = str_replace('-','',$produit);
    if($_SERVER['SCRIPT_NAME']=='/Projet_pizza/panier/paiement/paiement.php'){
        $link_verif = '../../images/' . $source . '/' .  $produit . '.png';
    }else{
        $link_verif = '../images/' . $source . '/' .  $produit . '.png';
    }
    if(@exif_imagetype($link_verif) == IMAGETYPE_PNG){
        $lien = $source . '/' .  $produit . '.png';
    }else{
        $lien = $source . '/' .  $produit . '.jpg';
    }
    return $lien;
    
}
/** /Vérifier le format des photos */
//afficher les desserts en grille
function view_desserts($bdd,$menu_session = null){
    if($menu_session == "dessert1")
    { 
        $menu_session = str_replace('1','',$menu_session);
        $link_arg =  "&menu_mega=" . $menu_session; 
    }
    elseif($menu_session == "dessert2")
    { 
        $menu_session = str_replace('2','',$menu_session);
        $link_arg =  "&menu_moyen=" . $menu_session; 
    }
    $tour = 1;
    $reponse = $bdd->query('SELECT id,libelle FROM produit_pizza WHERE categorie=\'dessert\'');
    while($donnees = $reponse->fetch()){ 
        $libelle = str_replace(' ','',$donnees['libelle']);
        open_row($tour);
        
        if(@exif_imagetype('images/dessert/' . str_replace(' ','',$donnees['libelle']) . '.png') == IMAGETYPE_PNG){
        ?>
            <div class=" col-sm-3">
                <a href="<?= 'pizza/produit.php?produit='. $donnees['libelle']?><?php 
                if($menu_session != null)
                { 
                    echo $link_arg;
                }
                ?>"><img src="images/dessert/<?= $libelle ?>.png" alt="<?= $donnees['libelle'] ?>" class="offset-sm-1 img-thumbnail-like">
                <p class="description-pizza"><?= $donnees['libelle'] ?></p></a>
            </div>
        <?php   
        }else{
        ?>
            <div class=" col-sm-3">
                <a href="<?= 'pizza/produit.php?produit='. $donnees['libelle']?><?php 
                if($menu_session != null)
                { 
                    echo $link_arg;
                } 
                ?>"><img src="images/dessert/<?= $libelle ?>.jpg" alt="<?= $donnees['libelle'] ?>" class="offset-sm-1 img-thumbnail">
                <p class="description-pizza"><?= $donnees['libelle'] ?></p></a>
            </div>
        <?php
        }
        
        close_row($tour);
        $tour ++;
        ?>
       

    <?php
    }
    $reponse->CloseCursor();
}

function view_calzones($bdd){
    $tour = 1;
    $reponse = $bdd->query('SELECT id,libelle FROM produit_pizza WHERE categorie=\'calzone\'');
    while($donnees = $reponse->fetch()){ 
        $libelle = str_replace(' ','',$donnees['libelle']);
        open_row($tour);
        
        if(@exif_imagetype('images/calzone/' . str_replace(' ','',$donnees['libelle']) . '.png') == IMAGETYPE_PNG){
        ?>
            <div class=" col-sm-3">
                <a href="<?= 'pizza/produit.php?produit='. $donnees['libelle']?>"><img src="images/<?= $libelle ?>.png" alt="<?= $donnees['libelle'] ?>" class="offset-sm-1 img-thumbnail">
                <p class="description-pizza"><?= $donnees['libelle'] ?></p></a>
            </div>
        <?php   
        }else{
        ?>
            <div class=" col-sm-3">
            <a href="<?= 'pizza/produit.php?produit=' . $donnees['libelle']?>"><img src="images/calzone/<?= $libelle ?>.jpg" alt="<?= $donnees['libelle'] ?>" class="offset-sm-1 img-thumbnail">
                <p class="description-pizza"><?= $donnees['libelle'] ?></p></a>
            </div>
        <?php
        }
        
        close_row($tour);
        $tour ++;
        ?>
       

    <?php
    }
    $reponse->CloseCursor();

}

function write_title_menu($titre){
    ?>
    <h1 class="display-4 font-italic"><?= $titre ?></h1>
        <p class="lead my-3"></p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold"></a></p>
      </div>
    </div>
  </div>
  <?php
}

function add_clients($bdd){

    if($_POST['nom'] && $_POST['prenom'] && $_POST['adresse_libelle'] && $_POST['telephone'] && $_POST['ville'] && $_POST['email'] && $_POST['password'] && $_POST['code_postale']){

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $reponse = $bdd->prepare('INSERT INTO client_pizza (nom, prenom, nomrue, cp, tel, mail, ville, password) 
        VALUES (:nom,:prenom,:nomrue,:cp,:tel,:mail,:ville,:password)');

        $requete = $reponse->execute(array('nom' => $_POST['nom'],'prenom' => $_POST['prenom'], 'nomrue' => $_POST['adresse_libelle'], 
        'cp' => $_POST['code_postale'], 'tel' => $_POST['telephone'], 'mail' => $_POST['email'], 'ville' => $_POST['ville'], 'password' => $password));
        
        return $requete;
    }
    return false;
}

/** Fonction pour les Mails */
function getMail($bdd){

        $req = $bdd->query('SELECT mail from client_pizza');
        while($donnees = $req->fetch()){
            $tableau[] = $donnees['mail'];
        }
        return $tableau;
}

function compareMail($tableau){
    if(isset($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);
        foreach($tableau as $value){
            if($value == $email){
                return "mail existant";
            }
        }
        return "mail valide";
    }
}
/** /Fonction pour les Mails */

/** Fonction pour les mots de passe */
function getClientbyMail($bdd){

    $req = $bdd->prepare('SELECT * from client_pizza WHERE mail = ? ');
    $req->execute(array(htmlspecialchars($_POST['email'])));
    while($donnees = $req->fetch()){
        $tableau['id'] = $donnees['id'];
        $tableau['password'] = $donnees['password'];
        $tableau['prenom'] = $donnees['prenom'];
        $tableau['nom'] = $donnees['nom'];
        $tableau['mail'] = $donnees['mail'];
        $tableau['cp'] = $donnees['cp'];
        $tableau['tel'] = $donnees['tel'];
        $tableau['ville'] = $donnees['ville'];
        $tableau['nomrue'] = $donnees['nomrue'];
    }
    return $tableau;
}

function getPasswordById($bdd,$id){
    $req = $bdd->prepare('SELECT password from client_pizza WHERE id = ? ');
    $req->execute(array(htmlspecialchars($id)));
    while($donnees = $req->fetch()){
        $password = $donnees['password'];
    }
    return $password;
}

/** /Fonction pour les mots de passe */

function modifyElement($bdd,$element,$new_valeur_element,$id){
    $id = intval($id);
    echo gettype($element);
    $element = htmlspecialchars($element);
    $new_valeur_element = htmlspecialchars($new_valeur_element);
    $id = htmlspecialchars($id);
    $sql ="update client_pizza set $element='$new_valeur_element' WHERE id='$id'";
    $req = $bdd->query($sql);
    /*$req = $bdd->prepare("UPDATE client_pizza SET :element = :valeur WHERE id = :id");
    $req->execute(array('element' => $element,'valeur' => $new_valeur_element,'id' => $id));*/
    return $req;
}

/** Fonction pour les ingredients */
function viewIngredients($bdd, $nom_pizza){
    $reponse = $bdd->prepare('SELECT libelle FROM ingredient_pizza WHERE id IN (SELECT id_ingredient FROM produit_ingredient WHERE id_produit=(SELECT id FROM produit_pizza WHERE libelle = ? AND prix_u=15)) ');
        $reponse->execute(array($nom_pizza));
        while($donnees = $reponse->fetch()){
            $tableau[] = $donnees['libelle']; 
        }
        for($i=0;$i<sizeof($tableau);$i++){
            if(sizeof($tableau) - $i == 1){
                $chaine .= $tableau[$i] . '.';
            }else{
                $chaine .= $tableau[$i] . ', ';
            }
        }
        //retourne une chaine de carractère avec tous les ingrédients
        return $chaine;
}

function view_AllIngredients($bdd){
    $reponse = $bdd->query('SELECT * FROM ingredient_pizza');
    while($donnees = $reponse->fetch()){
        $tableau['id'][] = $donnees['id'];
        $tableau['libelle'][] = $donnees['libelle'];
    }
    return $tableau;
}

/** /Fonction pour les ingredients */

/** Fonction pour récupérer les prix des Pizzas */

function viewPrice($bdd,$nom_produit){
    $req = $bdd->prepare('SELECT prix_u,taille FROM produit_pizza WHERE libelle =  ? ');
    $req->execute(array($nom_produit));
    while($donnees = $req->fetch()){
        //$tableau[$donnees['taille']] = $donnees['prix_u'];
        $tableau[] = $donnees['taille'];
        $tableau[] = $donnees['prix_u'];
    }
    return $tableau;
}
/** /Fonction pour les récupérer les prix des Pizzas */

/** Fonction pour les stocks de categorie de produits*/
function view_quantity($bdd,$type){
    $req = $bdd->prepare('SELECT * FROM categorie_pizza WHERE categorie =  ? ');
    $req->execute(array($type));
    while($donnees = $req->fetch()){
        $quantite = $donnees['quantite'];
    }
    return $quantite;
}

function change_quantity($bdd,$quantity){
    if($_POST['quantite']){
        if($quantity < htmlspecialchars($_POST['quantite'])){
            $quantite = $quantity['quantite'] - htmlspecialchars($_POST['quantite']);
            $req = $bdd->prepare('UPDATE categorie_pizza SET quantite=? WHERE id=?');
            $req->execute(array($quantite,$quantite['id']));
            return "success";
        }else{
            return "error_quantity";
        }
    }else{
        return "error_pas_de_POST";
    }
}
/** /Fonction pour les stocks de categorie de produits*/

function view_taille($bdd, $produit){
    $req = $bdd->prepare('SELECT taille FROM produit_pizza WHERE libelle =  ? ');
    $req->execute(array($produit));
    while($donnees = $req->fetch()){
        $tableau[]=$donnees['taille'];
    }
    return $tableau;
}
/**récupérer les catégorie des pizzas */
function view_type($bdd,$nom_pizza){
    $req = $bdd->prepare('SELECT categorie FROM produit_pizza WHERE libelle =  ? ');
    $req->execute(array($nom_pizza));
    $donnees = $req->fetch();
    $chaine=$donnees['categorie'];
    
    return $chaine;
}

function view_price_default($bdd,$nom_produit,$taille_produit = NULL,$quantite = 1){
    
    if($taille_produit != NULL)
    {
        $req = $bdd->prepare('SELECT prix_u FROM produit_pizza WHERE libelle = ? AND taille = ? ');
        $req->execute(array($nom_produit,$taille_produit));
    }else{
        $req = $bdd->prepare('SELECT prix_u FROM produit_pizza WHERE libelle = ?');
        $req->execute(array($nom_produit)); 
    }
    $donnees = $req->fetch();
    $nom_produit = str_replace(' ','',$nom_produit);
    $nom_produit = str_replace('-','',$nom_produit);
    $prix = $donnees['prix_u'] * $quantite;
    return $prix;
}

?>