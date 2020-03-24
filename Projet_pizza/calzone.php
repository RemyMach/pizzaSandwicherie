<?php require_once 'header.php'; ?>
<?php require_once 'fonction_modele.php'; ?>  
<div class="container">
	<div class="row">
    <div class="col-md-12 jumbotron p-4 p-md-5 text-white rounded bg-dark" style="height: 300px; 
    background: url('images/calzone/798806.jpg') no-repeat center fixed;
    background-size: cover;
    ">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Calzone</h1>
        <p class="lead my-3"></p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold"></a></p>
      </div>
    </div>
  </div>

<?php $bdd = connexion(); ?>
<?php view_calzones($bdd); ?>
	

</div>
</body>
</html>
