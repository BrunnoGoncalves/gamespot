<?php 

function get_all_genero($con){
   $sql  = "SELECT * FROM genero";
   $stmt = $con->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() > 0) {
   	  $genero = $stmt->fetchAll();
   }else {
      $genero  = 0;
   }

   return $genero ;
}


function get_gen($con, $id){
   $sql  = "SELECT * FROM genero WHERE id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
   	  $gen = $stmt->fetch();
   }else {
      $gen = 0;
   }

   return $gen;
}
