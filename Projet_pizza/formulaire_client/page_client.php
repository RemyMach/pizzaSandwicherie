<?php 
session_start();
if(isset($_SESSION['nom']) && isset($_SESSION['cp']) && isset($_SESSION['prenom']) && isset($_SESSION['ville']) && isset($_SESSION['nomrue']) && isset($_SESSION['mail']) && isset($_SESSION['id'])){
    session_start();
    require_once 'header.php';
?>
    <div class="container3">
    <?php if(htmlspecialchars($_GET['success']) == 'true'){ ?>
        <div class="alert alert-success" role ="alert">
            <h4>la modification est prise en compte</h4>
        </div>
    <?php } ?>
        <div class="card card_profil">
            <div class="card-body">
                <h2 class="card-title title-profil">Profil</h2>
                <a href="deconnexion_profil.php" class="lien_ingredient" style="position:absolute; top:10px;right:10px;"><div class="button_deconnexion">Deconnexion</div></a>
                <div class="row line_profil">
                    <p class="col-md-4">NOM</p>
                    <p class="col-md-8 parametre_profil"><?= $_SESSION['nom'] ?></p>
                    <a href="modifier_compte.php?modification=nom"><img class="image_fleche" src="../images/fleche.png"></a>
                </div>
                <hr class="featurette-divider">
                <div class="row line_profil">
                    <p class="col-md-4">PRENOM</p>
                    <p class="col-md-8 parametre_profil"><?= $_SESSION['prenom'] ?></p>
                    <a href="modifier_compte.php?modification=prenom"><img class="image_fleche" src="../images/fleche.png"></a>
                </div>
                <hr class="featurette-divider">
                <div class="row line_profil">
                    <p class="col-md-4">MOT DE PASSE</p>
                    <p class="col-md-8 parametre_profil">***********</p>
                    <a href="modifier_compte.php?modification=password"><img class="image_fleche" src="../images/fleche.png"></a>
                </div>
            </div>
        </div>
        <div class="card card_profil">
            <div class="card-body">
                <h2 class="card-title title-profil">Coordonnées</h2>
                <div class="row line_profil">
                    <p class="col-md-4">MAIL</p>
                    <p class="col-md-8 parametre_profil"><?= $_SESSION['mail'] ?></p>
                    <a href="modifier_compte.php?modification=mail"><img class="image_fleche" src="../images/fleche.png"></a>
                </div>
                <hr class="featurette-divider">
                <div class="row line_profil">
                    <p class="col-md-4">TELEPHONE</p>
                    <p class="col-md-8 parametre_profil"><?= $_SESSION['tel'] ?></p>
                    <a href="modifier_compte.php?modification=tel"><img class="image_fleche" src="../images/fleche.png"></a>
                </div>
                <hr class="featurette-divider">
                <div class="row line_profil">
                    <p class="col-md-4">ADRESSE</p>
                    <p class="col-md-8 parametre_profil"><?= $_SESSION['nomrue'] ?></p>
                    <a href="modifier_compte.php?modification=adresse"><img class="image_fleche" src="../images/fleche.png"></a>
                </div>
                <hr class="featurette-divider">
                <div class="row line_profil">
                    <p class="col-md-4">VILLE</p>
                    <p class="col-md-8 parametre_profil" ><?= $_SESSION['ville'] ?><p>
                    <a href="modifier_compte.php?modification=ville"><img class="image_fleche" src="../images/fleche.png"></a>
                </div>
                <hr class="featurette-divider">
                <div class="row line_profil">
                    <p class="col-md-4">CP</p>
                    <p class="col-md-8 parametre_profil" ><?= $_SESSION['cp'] ?><p>
                    <a href="modifier_compte.php?modification=cp"><img class="image_fleche" src="../images/fleche.png"></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>