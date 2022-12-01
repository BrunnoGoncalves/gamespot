<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {




	if (isset($_POST['nome-jogo']) &&
        isset($_POST['descr']) &&
        isset($_POST['genero-jogo']) &&
        isset($_POST['prod-jogo']) &&
        isset($_FILES['capa']) &&
        isset($_FILES['arquivo']) ) {
	
		$titulo = $_POST['nome-jogo'];
        $descr = $_POST['descr'];
        $gene = $_POST['genero-jogo'];
        $prod = $_POST['prod-jogo'];

        	
	include "../db_con.php";
    include "func-validation.php";
    include "func-arquivo.php";

    $user='titulo='.$titulo.'&genero='. $gene.'&descrição='.$descr.'&id_prod='.$prod;

    $text='titulo';
    $location= "../add-jogo.php";
    $ms="erro";
    is_empty($titulo, $text, $location, $ms, $user);
    $text='descrição';
    $location= "../add-jogo.php";
    $ms="erro";
    is_empty($descr, $text, $location, $ms, $user);


    $text='genero';
    $location= "../add-jogo.php";
    $ms="erro";
    is_empty( $gene, $text, $location, $ms, $user);


    $text='produtor';
    $location= "../add-jogo.php";
    $ms="erro";
    is_empty($prod, $text, $location, $ms, $user);
     
    $allowed_imagens_ex=array('jpeg','png','jpg');
    $path='capas';
   $capa_jogo=upload_file($_FILES['capa'], $allowed_imagens_ex, $path);
	
if($capa_jogo['status']=='error'){
    $em=$capa_jogo['data'];

    header("location:../add-jogo.php?error=$em&$user");
    exit;

}else{
    $allowed_arqui_ex=array('NES','gba','ISO','PSP','NDS','N64');
    $path='arquivos';
   $arqui=upload_file($_FILES['arquivo'], $allowed_arqui_ex, $path);
   if($arqui['status']=='error'){
    $em=$arqui['data'];

    header("location:../add-jogo.php?error=$em&$user");
    exit;

}else{
$arqi_url=$arqui['data'];
$capa_url=$capa_jogo['data'];

$sql="INSERT INTO jogo (title,Descrição,Produtor,Genero,cover,Arquivo)
VALUES(?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$res  = $stmt->execute([$titulo,$descr,$prod,$gene,$capa_url,$arqi_url]);


 if ($res) {
     
     $sm = "O jogo foi adicionado com sucesso!";
    header("Location: ../add-jogo.php?sucesso=$sm");
    exit;
 }else{

     $em = "Erro!";
    header("Location: ../add-jogo.php?erro=$em");
    exit;
 }

}
}

	}else {
      header("Location: ../admin.php");
      exit;
	}

}else{
  header("Location: ../login.php");
  exit;
}


