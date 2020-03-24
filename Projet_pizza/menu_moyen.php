<?php require_once 'header.php'; ?>
<?php require_once 'fonction_modele.php'; ?> 
<?php $bdd = connexion(); ?> 
<div class="container">
	<div class="row">
    	<div class="col-md-12 jumbotron p-4 p-md-5 text-white rounded bg-dark" style="height: 300px; 
    	background: url('images/539559.jpg') no-repeat center fixed;
    	background-size: cover;
    	">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Menu Moyen</h1>
<?php        
        /** Pizzas **/
if(!isset($_SESSION['moyen_menu']['pizza'])){ 
 
  write_title_menu('Pizzas');
  view_pizzas($bdd,"pizza2");

  ?>
  <style type="text/css">
  .annulation{
      display:none;
  }
  </style>
<?php

/** Desserts **/ /** Boissons **/
}elseif(isset($_SESSION['moyen_menu']['pizza']) && !isset($_SESSION['moyen_menu']['dessert']) && !isset($_SESSION['moyen_menu']['dessert'])){

  write_title_menu('Dessert ou boisson');
  view_desserts($bdd,"dessert2");
  echo "</div>";
  view_boissons($bdd,"boisson2");  
}
?>
</div>
<div class="container annulation">
<div class="row">
    <form action="formulaire_client/annulation_menu.php?menu_moyen=true" method="post" style="margin-bottom:20px;">
        <input class="btn btn-primary" type="submit" name="annulation_moyen" value="annuler le menu en cours">
    </form>
</div>
</div>
</body>
</html>