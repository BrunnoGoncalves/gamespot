<?php
session_start();

if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {   
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar genero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">


</head>
<body>
 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">ADM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-jogo.php">Adicionar jogo</a>
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link" href="add-genero.php">Adicionar genero</a>
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link" href="add-prod.php">Adicionar produtor</a>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
        
      
    </div>
  </div>
</nav>
<form action="php/add-genero.php"
method="post" class="shadow p-4 rounded-shadow" style="width: 90%;">
  <h1 class="text-center">
    Adicionar genero</h1>
    <?php if (isset($_GET['erro'])) { ?>
          <div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['erro']); ?>
        <?php }?>  
		  </div>
      <?php if (isset($_GET['sucesso'])) { ?>
          <div class="alert alert-success" role="alert">
			  <?=htmlspecialchars($_GET['sucesso']); ?>
        <?php }?>  
        </div>
    <div class="mb-3">
		    <label 
		           class="form-label">Nome do genero </label>
		    <input type="text" 
		           class="form-control" 
		           name="nome-gen" 
		           >
		  </div>
      <button type="submit" 
		          class="btn btn-primary">
		         Confirmar</button>
</form>
  
</body>
</html>

<?php }else{
   header("Location: login.php");
   exit;

}
    ?>