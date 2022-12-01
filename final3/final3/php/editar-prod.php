<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {


	include "../db_con.php";


	if (isset($_POST['nome_prod']) &&
        isset($_POST['id_prod'])) {
	
		$nome = $_POST['nome_prod'];
		$id = $_POST['id_prod'];

	
		if (empty($nome)) {
			$em = "Nome do produtor é preciso";
			header("Location: ../editar-prod.php?error=$em&id=$id");
            exit;
		}else {
			
			$sql  = "UPDATE prod
			         SET name=?
			         WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$nome, $id]);

		
		     if ($res) {
		     	
		     	$sm = "Atualizado!";
				header("Location: ../editar-prod.php?success=$sm&id=$id");
	            exit;
		     }else{
		     	
		     	$em = "Erro!";
				header("Location: ../editar-prod.php?error=$em&id=$id");
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
