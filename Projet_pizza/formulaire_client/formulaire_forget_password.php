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
    <h1 style="margin-top:60px;">Reset Password</h1>
    <hr class="featurette-divider">
    <div class="container_2">
        <form action="" method="post" class=" offset-md-2 col-md-5">
            <div class="form-group">
                <label>email</label>
                <input class="form-control" type="password" required>
            </div>
            <br>
            <div>
                <button class="btn btn-primary" type="submit">envoyer</button>
            </div>
        </form>
    </div>
</div>

