<head>
<meta charset="utf-8">
</head>
<?php
session_start();
if(isset($_SESSION['nom']) && isset($_SESSION['cp']) && isset($_SESSION['prenom']) && isset($_SESSION['ville']) && isset($_SESSION['nomrue']) && isset($_SESSION['mail']) && isset($_SESSION['id']) && $_GET['id']){
    if(sizeof($_POST) == 2 || sizeof($_POST) == 3){
        require_once '../fonction_modele.php'; 
        var_dump($_POST);
        var_dump($_GET);
        $new_element = htmlspecialchars($_POST['element']);
        $id = htmlspecialchars($_SESSION['id']);
        $categorie = htmlspecialchars($_GET['element']);
        $password = htmlspecialchars($_POST['password']);

        if($categorie == "adresse"){
            $categorie = 'nomrue';
        }

        $bdd= connexion();
        $password_actuel = getPasswordById($bdd,$id);
        if(password_verify($password,$password_actuel)){
            if(isset($_POST['confirmation_password'])){
                if(htmlspecialchars($_POST['confirmation_password']) == htmlspecialchars($_POST['element'])){
                    $password = password_hash($new_element, PASSWORD_DEFAULT);
                    $retour = modifyElement($bdd,$categorie,$password,$id);
                    $_SESSION[$categorie] = $new_element;
                    header('Location:page_client.php?success=true');
                }else{
                    header('Location:modifier_compte.php?error=true&modification='.$categorie);
                }
            }else{
                $retour = modifyElement($bdd,$categorie,$new_element,$id);
                if($retour){
                    $_SESSION[$categorie] = $new_element;
                    header('Location:page_client.php?success=true');
                }else{
                    header('Location:modifier_compte.php?error=true&modification='.$categorie);  
                }
            }
        }else{
            header('Location:modifier_compte.php?password=true&modification='.$categorie); 
        }
        
    }else{
        header('Location:modifier_compte.php?error=true&modification='.$categorie); 
    }
          
}else{
    header('Location:modifier_compte.php?error=true&modification='.$categorie);
}

?>