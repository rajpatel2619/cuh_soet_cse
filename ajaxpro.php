<?php


   require('./components/connection.php');

      $bid = $_GET['id'];

   $sql = "SELECT * FROM classes where batch_id='$bid' ORDER BY `name` "; 


   $result = mysqli_query($conn,$sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['id']] = $row['name'];
   }


   echo json_encode($json);
?>