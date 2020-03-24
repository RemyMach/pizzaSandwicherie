<?php
session_start();

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

function create_line_command(){

    if(isset($_SESSION['produit'])){
        for($i=0;$i<sizeof($_SESSION['produit']);$i++){
            if($i==0){
                if(isset($_SESSION['ingredient']['produit'][$i])){
                    foreach($_SESSION['ingredient']['produit'][$i] as $key => $value){
                        if($key == 0){
                            $result = $value;
                        }else{
                            $result = $result . ' ' .$value;
                        }
                    }
                    $chaine = 'produit :' . $_SESSION['produit'][$i] .'|' . $result;
                }else{
                    $chaine = 'produit :' . $_SESSION['produit'][$i];                   
                }
            }else{
                if(isset($_SESSION['ingredient']['produit'][$i])){
                    foreach($_SESSION['ingredient']['produit'][$i] as $key => $value){
                        if($key == 0){
                            $result = $value;
                        }else{
                            $result = $result . ' ' .$value;
                        }
                    }
                    $chaine = $chaine .'/produit :'. $_SESSION['produit'][$i] .'|' . $result;
                }else{
                    $chaine = $chaine .'/produit :'. $_SESSION['produit'][$i];                   
                }
            }
        }
    }
    if(isset($_SESSION['menu_mega'])){
        for($i=0;$i<sizeof($_SESSION['menu_mega']);$i++){
            if($i==0){
                if(isset($_SESSION['produit'])){
                    $chaine = $chaine .'/menu_mega :'. $_SESSION['menu_mega'][$i];
                }else{
                    $chaine = $_SESSION['menu_mega'][$i];
                }
            }else{
                    $chaine = $chaine . '/menu_mega :'. $_SESSION['menu_mega'][$i];                  
            }
        }
    }
    if(isset($_SESSION['menu_moyen'])){
        for($i=0;$i<sizeof($_SESSION['menu_moyen']);$i++){
            if($i==0){
                if(isset($_SESSION['menu_mega']) || isset($_SESSION['produit'])){
                    $chaine = $chaine . '/menu_moyen :' .$_SESSION['menu_moyen'][$i];
                }else{
                    $chaine = $_SESSION['menu_moyen'][$i];
                }
            }else{
                    $chaine = $chaine .  '/menu_moyen :'. $_SESSION['menu_moyen'][$i];                  
            }
        }
    }

    return $chaine;
}

?>