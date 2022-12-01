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

function get_prod($con, $id){
   $sql  = "SELECT * FROM prod WHERE id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
   	  $produ = $stmt->fetch();
   }else {
      $produ = 0;
   }

   return $produ;
}
