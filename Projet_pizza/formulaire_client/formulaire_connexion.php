<?php require_once 'header.php'; ?>

<style>
        .container_2{
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        @media (min-width:992px){
            .container_2{
                max-width: 700px;
            }
        }
        @media (max-width: 900px){
            .container_2{
                max-width:450px;
            }
        }    
</style>
<div class="container">
    <h1 style="margin-top:60px;">Connexion</h1>
    <hr class="featurette-divider">
    <?php if(htmlspecialchars($_GET['error']) == 'true'){ ?>
        <div class="alert alert-danger" role ="alert">
        <h4>Votre connexion n'a pas marché</h4>
        </div>
    <?php }elseif(htmlspecialchars($_GET['error']) == 'mail'){ ?>
        <div class="alert alert-danger" role ="alert">
        <h4>le mail ou le mot de passe n'existe pas</h4>
        </div>
    <?php } ?>
    <div class="container_2">
        <div class="row">
            <div class="col-md-5">
                <h3>Pas encore inscrit</h3><br/>
                <a class="btn btn-success" href="formulaire_inscription.php">Créer un compte</a>

            </div>
            <?php   if(isset($_GET['paiement'])){
                        $lien_panier = "?paiement=true"; 
                    }else{
                        $lien_panier = ""; 
                    } ?>
            <form action="formulaire_connexion_sql.php<?= $lien_panier ?>" method="post" class=" offset-md-2 col-md-5" onsubmit="return verifconnexion(this)">
                <div class="form-group">
                    <label>email</label>
                    <input class="form-control" type="text" name="email" id="email">
                    <span class="aide" id="email_aide"></span>
                </div>
                <div class="form-group">
                    <label>mot de passe</label>
                    <input class="form-control" type="password" name="password" id="password">
                    <span class="aide" id="password_aide"></span>
                </div>
                <div>
                    <a href="formulaire_forget_password.php">mot de passe oublié ?</a>
                </div>
                <br>
                <div>
                    <button class="btn btn-primary" type="submit">connexion</button>
                </div>
            </form>
        </div>
    </div>
</div>
