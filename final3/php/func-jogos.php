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

 function get_jo($con, $id){
   $sql  = "SELECT * FROM jogo WHERE id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
   	  $jo = $stmt->fetch();
   }else {
      $jo = 0;
   }

   return $jo;
}
function search_jogo($con, $key){
   # creating simple search algorithm :) 
   $key = "%{$key}%";

   $sql  = "SELECT * FROM jogo 
            WHERE title LIKE ?
            OR Descrição LIKE ?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$key, $key]);

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}


