<?php 
# nome do server

$sName = "localhost";
# username
$uName = "root";
# senha
$pass = "";
#nome da data base
$db_name = "gamespot";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Erro de conexão: ". $e->getMessage();
}
