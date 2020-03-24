<?php require_once 'header.php'; ?>
  <!--bannière-->
<div class="container">
<?php if(htmlspecialchars($_GET['succes']) == 'true'){ ?>
        <div class="alert alert-success" role ="alert">
        <h4>Vous êtes bien connecté</h4>
        </div>
    <?php } ?>
  <div class="row">
    <div class="col-md-12 jumbotron p-4 p-md-5 text-white rounded bg-dark" style="height: 400px; 
    background-image: url('images/988128.jpg');
    background-size: cover;">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Pizza Rémy</h1>
        <p class="lead my-3"></p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Pizza naturelle et faites avec passion</a></p>
      </div>
    </div>
  </div>
<!--bannière-->


  <!--Body-->

  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">1 pizza mega + un déssert + une boisson</strong>
          <h3 class="mb-0">Menu mega</h3>
          <div class="mb-1 text-muted">20€</div>
          <br><a href="menu_mega.php" class="stretched-link" style="color:rgb(2,122,255);">Commander</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="280" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" style="background-image: url('images/menu_mega_mega.jpeg');"></svg>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">1 pizza moyenne + un déssert ou une boisson</strong>
          <h3 class="mb-0">Menu moyen</h3>
          <div class="mb-1 text-muted">15€</div>
          <br><a href="menu_moyen.php" class="stretched-link" style="color:rgb(41,166,69);">Commander</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="280" height="250" x="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" style="background-image: url('images/menu_mega.jpeg'); background-size:cover;"></svg>
        </div>
      </div>
    </div>
  </div>

<!--/Body-->

</div>
</body>

</html>

