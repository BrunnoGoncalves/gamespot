<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	
	include "../db_con.php";


	if (isset($_POST['nome-prod'])) {
	
		$nome = $_POST['nome-prod'];

		
		if (empty($nome)) {
			$em = "Nome do produtor é nescessario";
			header("Location: ../add-prod.php?erro=$em");
            exit;
		}else {
			
			$sql  = "INSERT INTO prod (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$nome]);

			
		     if ($res) {
		     	
		     	$sm = "Sucesso!";
				header("Location: ../add-prod.php?sucesso=$sm");
	            exit;
		     }else{
		    
		     	$em = "Erro!";
				header("Location: ../add-prod.php?erro=$em");
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



     
