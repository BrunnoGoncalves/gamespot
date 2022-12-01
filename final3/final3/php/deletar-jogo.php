<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {


	include "../db_con.php";


	if (
        isset($_GET['id'])) {
	
		$id = $_POST['nome_prod'];
	

	
		if (empty($id)) {
			$em = "Erro";
			header("Location: ../editar-prod.php?error=$em");
            exit;
		}else {
			
			$sql2  = "SELECT * FROM jogo
			      
			         WHERE id=?";
			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute([$id]);
            $o_jogo= $stmt2->fetch();

            if($stmt2->rowCount()>0){
                if ($res) {
                    $sql='DELETE * FROM jogo WHERE id=?';

                    $stmt=$conn->prepare($sql);
                    $res=$stmt->execute(['id']);
		     	
                    if($res){


                        $cover=$o_jogo['cover'];
                        $file=$o_jogo['file'];
$c_b_c='../imagens/capas/$cover';
$c_f='../imagens/arquivos/$file';
                        unlink($c_b_c);
                        unlink($c_f);
                    }
                    $sm = "DELETADO COM SUCESSO!";
                   header("Location: ../admin.php?success=$sm");
                   exit;
                }else{
                    
                    $em = "Erro!";
                   header("Location: ../admin.php?error=$em");
                   exit;
                }
            }else{  $em = "Erro";
                header("Location: ../editar-prod.php?error=$em");
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
