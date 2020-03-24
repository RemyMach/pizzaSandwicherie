<?php
session_start();
if(isset($_SESSION['nom']) && isset($_SESSION['cp']) && isset($_SESSION['prenom']) && isset($_SESSION['ville']) && isset($_SESSION['nomrue']) && isset($_SESSION['mail']) && isset($_SESSION['id']) && $_GET['modification']){
    $element_modifier = htmlspecialchars($_GET['modification']); 
    require_once 'header.php';
    $id = htmlspecialchars($_SESSION['id']);

if($element_modifier != "password"){

?>
    <div class="container3">
        <h1 style="margin-top:60px;" id="champ"><?= $element_modifier ?></h1>
        
        <hr class="featurette-divider">
        <?php if(htmlspecialchars($_GET['error']) == 'true'){ ?>
        <div class="alert alert-danger" role ="alert">
            <h4>Erreur les informations rentrées ne sont pas valide</h4>
        </div>
    <?php }elseif(htmlspecialchars($_GET['password']) == 'true'){ ?>
        <div class="alert alert-danger" role ="alert">
            <h4>Erreur le mot de passe n'est pas valide</h4>
        </div>
    <?php } ?>
        <div class="card card_profil">
            <div class="card-body">
                <form action="base_modifier_profil.php?id=<?= $id ?>&element=<?= $element_modifier ?>" method="post" onsubmit="return verifCommande(this)">
                    <div class="row">
                        <p class="col-md-4">Confirmation mot de passe</p>
                        <input class="offset-md-3 col-md-4" type="password" id="password" name="password" placeholder="mot de passe actuel"/>
                    </div>
                    <hr class="featurette-divider">
                    <div class="row">
                        <p class="col-md-4"><?php if(isset($_SESSION[$element_modifier])){ echo $_SESSION[$element_modifier]; }else{ echo $_SESSION['nomrue'];} ?></p>
                        <input class="offset-md-3 col-md-4" type="text" id="element" name="element" placeholder="modification <?= $element_modifier ?>"/>
                    </div><br>
                    <div class="row">
                        <button class="btn btn-primary offset-sm-10" type="submit">valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php 
}else{ ?>

    <div class="container3">
        <h1 style="margin-top:60px;"><?= $element_modifier ?></h1>
        <hr class="featurette-divider">
        <?php if(htmlspecialchars($_GET['error']) == 'true'){ ?>
        <div class="alert alert-danger" role ="alert">
            <h4>Erreur les informations rentrées ne sont pas valide</h4>
        </div>
    <?php }elseif(htmlspecialchars($_GET['password']) == 'true'){ ?>
        <div class="alert alert-danger" role ="alert">
            <h4>Erreur le mot de passe n'est pas valide</h4>
        </div>
    <?php } ?>
        <div class="card card_profil">
            <div class="card-body">
                <form action="base_modifier_profil.php?id=<?= $id ?>&element=<?= $element_modifier ?>" method="post">
                    <div class="row">
                        <p class="col-md-4">Ancien mot de passe</p>
                        <input class="offset-md-3 col-md-4" type="password" name="password" placeholder="mot de passe actuel"/>
                    </div>
                    <hr class="featurette-divider">
                    <div class="row">
                        <p class="col-md-4">Nouveau mot de passe</p>
                        <input class="offset-md-3 col-md-4" type="password" name="element"/>
                    </div>
                    <hr class="featurette-divider">
                    <div class="row">
                        <p class="col-md-4">Confirmation mot de passe</p>
                        <input class="offset-md-3 col-md-4" type="password" name="confirmation_password"/>
                    </div><br>
                    <div class="row">
                        <button class="btn btn-primary offset-sm-10" type="submit">valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php } 
}?>