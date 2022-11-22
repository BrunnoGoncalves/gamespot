<?php 
function get_all_jogos($con){
    $sql  = "SELECT * FROM jogo ORDER bY id DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
 
    if ($stmt->rowCount() > 0) {
          $jogo = $stmt->fetchAll();
    }else {
       $jogo = 0;
    }
 
    return $jogo;
 }

?>