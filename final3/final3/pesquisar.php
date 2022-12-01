<?php 
session_start();
if(!isset($_GET['key']) || empty($_GET['key'])){
header("location:index.php");
exit;
}
$key=$_GET['key'];

    
        
include "db_con.php";


include "php/func-jogos.php";
  $jogo = search_jogo($conn,$key);

  
include "php/func-prod.php";
$prod = get_all_prod($conn);

include "php/func-genero.php";
$genero = get_all_genero($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamespot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">


</head>
<body>
 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Gamespot.com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contatos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre</a>
        </li>
        <li class="nav-item">
          <?php if (isset($_SESSION['user_id'])) {?>
           
          <a class="nav-link" href="admin.php">Adm</a>
        
         <?php }else{?>
          <a class="nav-link" href="login.php">login</a>
          <?php }?>
        </li>
        
       
      
    </div>
  </div>
</nav>
<form action="pesquisar.php"
             method="get" 
             style="width: 100%; max-width: 30rem">

       	<div class="input-group my-5">
		  <input type="text" 
		         class="form-control"
		         name="key" 
		         placeholder="procurar jogo..." 
		         aria-label="procurar jogo..." 
		         aria-describedby="basic-addon2">

             <button class="input-group-text
		                 btn btn-primary" id="basic-addon2">Pesquisar</button>
		  </button>
		</div>
       </form>
<?php if($jogo==0){ ?>

<?php }else{?>

<div class="pdf-lista d-flex flex-wrap">

<?php foreach($jogo as $jo){?>


 <div class="card m-1">

  <img src="imagens/capas/<?=$jo['cover']?>"class="card"> <div class="card-body"><h5 class="card-title"><?=$jo['title']?></h5>
<p class="card-text"><?=$jo['Descrição']?></p>
<a href="imagens/arquivos/Super Danganronpa 2 (English v0.5a).iso" class="btn btn-success">baixar</a>

</div>
<?php } ?>
</div>
<?php } ?>
</div>


</div>
</body>
</html>