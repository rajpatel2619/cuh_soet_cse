

<?php include("connection.php") ?>

<?php 
$cid = $_GET['cid'];


$query2 = "SELECT * FROM `classes` where id = '$cid' LIMIT 1 ";
$run2 = mysqli_query($conn,$query2);
 
while($row2 = mysqli_fetch_array($run2)){
  $cname =  $row2['name'];
  $cbid =  $row2['batch_id'];
  $csem =  $row2['semester'];
}


$query3 = "SELECT * FROM `batches` where id = '$cbid' LIMIT 1 ";
$run3 = mysqli_query($conn,$query3);
 
while($row3 = mysqli_fetch_array($run3)){
  $cbsy = $row3['year'];
  $cbly = $row3['year'] + 4;
}
 




?>




  <!-- form -->
  <p>
* Following are the details of the choosen Class in case of any updations simply change the corresponding field value and click on update details. 
<form class="shadow p-3" action="" method="post">
  <div class="form-group">
    <label for="c-name">Class Name :- </label>
    <input type="text" value="<?php echo $cname?>" name="c-name" class="form-control" id="c-name" aria-describedby="c-name" placeholder="Enter Student Full Name. Ex :- Raj Patel" required>
  </div>
 
 
 

  <div class="form-group">
    <label for="c-batch">Batch Year :- </label>
    <input type="text" disabled="disabled" name="c-batch" value="<?php echo $cbsy?> - <?php echo $cbly ?>" class="form-control" id="c-batch" aria-describedby="c-batch" placeholder="Enter Student Batch Starting Year Only. Ex :- 2018" required>
  </div>
  <div class="form-group">
    <label for="c-roll">Semester :- </label>
    <input type="text" disabled="disabled" name="c-sem" value="<?php echo $csem?>" class="form-control" id="c-roll" aria-describedby="c-roll" placeholder="Enter Student Roll Number in numeric value only. Ex :- 180894" required>
  </div>

  
 
  <button type="submit" name="update-class" class="btn btn-info">Update Class Details</button>&nbsp;&nbsp;
  <button type="submit" name="delete-class" class="btn btn-danger">Delete Class</button>
</form>
	</p> 
  
<?php



// add new class...
	if(isset($_POST['update-class'])){
		$cname = $_POST['c-name'];

    // echo $cname.$ciid.$csem;
		$query1 = "UPDATE `classes` SET `name` = '$cname' where id='$cid' ";
		$run1 = mysqli_query($conn,$query1);

		if($run1){
      ?><script> window.location.href = "classes.php?batch=<?php echo $cbsy?>" </script><?php
   
		}else{
      echo "no";
    }
	

	}
// delete class
if(isset($_POST['delete-class'])){
	
	$query5 = "delete from `classes` where id='$cid' ";
	$run5 = mysqli_query($conn,$query5);

	if($run5){
?><script> window.location.href = "classes.php?batch=<?php echo $cbsy?>" </script><?php

	}else{
echo "no";
}


}

?>