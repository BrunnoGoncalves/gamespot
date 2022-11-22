<?php 

function get_all_genero($con){
   $sql  = "SELECT * FROM genero";
   $stmt = $con->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() > 0) {
   	  $genero = $stmt->fetchAll();
   }else {
      $genero = 0;
   }

   return $genero;
}