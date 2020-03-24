<?php require_once 'header.php'; 
?>
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
                max-width: 600px;
            }
        }
        @media (max-width: 900px){
            .container_2{
                max-width:450px;
            }
        }    
</style>
<div class="container">
<div id="message"> </div>
    
    <h1 style="margin-top:60px;">Créer un compte</h1>
    <!--Gérer erreur et validation de l'inscription-->
    <hr class="featurette-divider">
<?php if(htmlspecialchars($_GET['success']) == 'true'){ ?>
        <div class="alert alert-success" role ="alert">
        <h4>l'inscription a bien été pris en compte</h4>
        </div>
<?php } ?>
<?php if(htmlspecialchars($_GET['error']) == 'true'){ ?>
        <div class="alert alert-danger" role ="alert">
        <h4>l'inscription n'a pas été pris en compte</h4>
        </div>
<?php }elseif(htmlspecialchars($_GET['error']) == 'mail'){ ?>
        <div class="alert alert-danger" role ="alert">
        <h4>Ce mail est déja utilisé</h4>
        </div>
<?php } ?>
<?php   if(isset($_GET['paiement'])){
            $lien_panier = "?paiement=true"; 
        }else{
            $lien_panier = ""; 
        } ?>

    <div class="container_2">
        <form action="formulaire_inscription_sql.php<?= $lien_panier ?>" method="post" onsubmit="return verifinscription(this)">
            <div class="form-group">
                <label>Nom</label>
                <input class="form-control" type="text" name="nom" id="nom">
                <span class="aide" id="nom_aide"></span>
            </div>
            <div class="form-group">
                <label>Prenom</label>
                <input class="form-control" type="text" name="prenom" id="prenom" >
                <span class="aide" id="prenom_aide"></span>
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input class="form-control" type="text" name="telephone" id="telephone">
                <span class="aide" id="telephone_aide"></span>
            </div>
            <div class="form-group">
                <label>email</label>
                <input class="form-control" type="text" name="email" id="email" >
                <span class="aide" id="email_aide"></span>
            </div>
            <div class="form-group">
                <label>mot de passe</label>
                <input class="form-control" type="password" name="password" id="password" >
                <span class="aide" id="password_aide"></span>
            </div>
            <div class="form-group">
                <label>confirmer le mot de passe</label>
                <input class="form-control" type="password" name="password_confirm" id="password_confirm" >
                <span class="aide" id="password_confirm_aide"></span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>adresse</label>
                    <input class="form-control" type="text" placeholder="ex: 5 rue des Marchands" name="adresse_libelle" id="adresse_libelle">
                    <span class="aide" id="adresse_aide"></span>
                </div>
                <div class="form-group col-md-3">
                    <label>Ville</label>
                    <input class="form-control" type="text" placeholder="ex: Paris" name="ville" id="ville">
                    <span class="aide" id="ville_aide"></span>
                </div>
                <div class="form-group col-md-3">
                    <label>code postale</label>
                    <input class="form-control" type="number" placeholder="ex: 95150" name="code_postale" id="code_postale" >
                    <span class="aide" id="code_postale_aide"></span>
                </div>
            </div><br>
            <div>
                <input class="btn btn-primary" value="s'inscrire" type="submit">
            </div>
        </form>
        <div id="para"></div>
    </div>
</div>
</body>
</html>