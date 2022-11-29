<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {


	include "../db_con.php";


	if (isset($_POST['nome_genero']) &&
        isset($_POST['id_genero'])) {
	
		$nome = $_POST['nome_genero'];
		$id = $_POST['id_genero'];

	
		if (empty($nome)) {
			$em = "Nome do genero é preciso";
			header("Location: ../editar-gen.php?error=$em&id=$id");
            exit;
		}else {
			
			$sql  = "UPDATE genero
			         SET name=?
			         WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$nome, $id]);

		
		     if ($res) {
		     	
		     	$sm = "Atualizado!";
				header("Location: ../editar-gen.php?success=$sm&id=$id");
	            exit;
		     }else{
		     	
		     	$em = "Erro!";
				header("Location: ../editar-gen.php?error=$em&id=$id");
	            exit;
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
