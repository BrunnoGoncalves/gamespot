<?php 

function get_all_prod($con){
   $sql  = "SELECT * FROM prod";
   $stmt = $con->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() > 0) {
   	  $prod = $stmt->fetchAll();
   }else {
      $prod = 0;
   }

   return $prod;
}