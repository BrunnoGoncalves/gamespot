<?php
session_start();

if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

        
	include "db_con.php";


	include "php/func-jogos.php";
    $jogo = get_all_jogos($conn);

    
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
    <title>ADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">


</head>
<body>
 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="adimin.php">ADM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Adicionar jogo</a>
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link" href="#">Adicionar genero</a>
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link" href="#">Adicionar plataforma</a>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
        
      
    </div>
  </div>
</nav>
<div class="col-md-2"></div>

<?php  if($jogo ==0 ){ ?>
    empty

<?php }else{ ?>





        <h4 class="text-center"> Melhores produtos</h4>
        <table class="table table-bordered shadow">
			<thead>
				<tr>
					<th>#</th>
					<th>Titulo</th>
					<th>Drecrição</th>
          <th>Produtor</th>
					<th>Genero</th>

			
			
            
                    <th>Action</th>
				</tr>
        </thead>
        
        <tbody>
            <?php foreach ($jogo as $jog){?>

        
            <td>1</td>
          
            <td>
            <img width="100" src="imagens/capas/<?=$jog['cover']?>"><a class="link-dark d-block text-center" href="imagens/arquivos/<?=$jog['Arquivo']?>"><?=$jog['title']?>
          <?php if ($prod==0){
              echo "indefinido";
            }else{
              foreach ($prod as $prods){
                if ($prods['id']==$jog['Produtor']) {
                  echo $prods['prod'];
                }
              }
            }
            
            
            ?></td>
            <td><?=$jog['Descrição']?></td>
            <td><?=$jog['Produtor']?>
            <?php if ($prod==0){
              echo "indefinido";
            }else{
              foreach ($prod as $prods){
                if ($prods['id']==$jog['Produtor']) {
                  echo $prods['prod'];
                }
              }
            }
            
            
            ?>
          
          </td>
            <td><?=$jog['Genero']?>
            <?php if ($genero==0){
              echo "indefinido";
            }else{
              foreach ($genero as $gen){
                if ($gen['id']==$jog['Produtor']) {
                  echo $gen['prod'];
                }
              }
            }
            
            
            ?>
          </td>
            <td>
            <a href="#"
            class="btn btn-warning">EDITAR</a>

            
            <a href="#"
            class="btn btn-warning">DELETAR</a>
            </td>
    </tr>
    <?php } ?>
            </table>
            <?php }?>
        </tbody>
        
        
</body>
</html>

<?php }else{
   header("Location: login.php");
   exit;

}
    ?>