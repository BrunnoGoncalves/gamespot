<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	
	include "../db_con.php";


	if (isset($_POST['nome-gen'])) {
	
		$nome = $_POST['nome-gen'];

		
		if (empty($nome)) {
			$em = "Nome do genero é nescessario";
			header("Location: ../add-genero.php?erro=$em");
            exit;
		}else {
			
			$sql  = "INSERT INTO genero (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$nome]);

			
		     if ($res) {
		     	
		     	$sm = "Sucesso!";
				header("Location: ../add-genero.php?sucesso=$sm");
	            exit;
		     }else{
		    
		     	$em = "Erro!";
				header("Location: ../add-genero.php?erro=$em");
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



     
