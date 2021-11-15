

<?php include("connection.php") ?>

<?php 
$sid = $_GET['id'];


$query2 = "SELECT * FROM `students` where id = '$sid' LIMIT 1 ";
$run2 = mysqli_query($conn,$query2);
 
while($row2 = mysqli_fetch_array($run2)){
  $sname =  $row2['name'];
  $sroll =  $row2['roll_number'];
  $semail =  $row2['email'];
  $smobile =  $row2['mobile'];
  $sdate = $row2['date'];
  $sbid = $row2['batch_id'];
}


$query3 = "SELECT * FROM `batches` where id = '$sbid' LIMIT 1 ";
$run3 = mysqli_query($conn,$query3);
 
while($row3 = mysqli_fetch_array($run3)){
  $sbsy = $row3['year'];
  $sbly = $row3['year'] + 4;
}
 




?>




  <!-- form -->
  <p>
* Following are the details of the choosen candidate in case of any updations simply change the corresponding field value and click on update details. 
<form class="shadow p-3" action="" method="post">
  <div class="form-group">
    <label for="c-name">Candidate Name :- </label>
    <input type="text" value="<?php echo $sname?>" name="c-name" class="form-control" id="c-name" aria-describedby="c-name" placeholder="Enter Student Full Name. Ex :- Raj Patel" required>
  </div>
 
 
 

  <div class="form-group">
    <label for="c-batch">Batch Year :- </label>
    <input type="text" disabled="disabled" name="c-batch" value="<?php echo $sbsy?> - <?php echo $sbly ?>" class="form-control" id="c-batch" aria-describedby="c-batch" placeholder="Enter Student Batch Starting Year Only. Ex :- 2018" required>
  </div>
  <div class="form-group">
    <label for="c-roll">Roll Number :- </label>
    <input type="text" name="c-roll" value="<?php echo $sroll?>" class="form-control" id="c-roll" aria-describedby="c-roll" placeholder="Enter Student Roll Number in numeric value only. Ex :- 180894" required>
  </div>
  <div class="form-group">
    <label for="c-email">Email :- </label>
    <input type="email" name="c-email" value="<?php echo $semail?>" class="form-control" id="c-email" aria-describedby="c-email" placeholder="Enter Student Email. Ex :- kakhilesh79@gmail.com" required>
  </div>
  <div class="form-group">
    <label for="c-mobile">Mobile :- </label>
    <input type="text" name="c-mobile" value="<?php echo $smobile?>" class="form-control" id="c-mobile" aria-describedby="c-mobile" placeholder="Enter Student Mobile No without +91 prefix. Ex :- 8543832619" required>
  </div>
  
 
  <button type="submit" name="submit-form" class="btn btn-info">Update Details</button>
</form>
	</p> 
  
<?php



// add new class...
	if(isset($_POST['submit-form'])){
		$cname = $_POST['c-name'];
		$croll = $_POST['c-roll'];
		$cemail = $_POST['c-email'];
		$cmobile = $_POST['c-mobile'];

		$cid = $sid;
    // echo $cname.$ciid.$csem;
		$query1 = "UPDATE `students` SET `email` = '$cemail',`mobile` = '$cmobile',`roll_number` = '$croll', `name` = '$cname' where id='$cid' ";
		$run1 = mysqli_query($conn,$query1);

		if($run1){
      ?><script> window.location.href = "students.php?batch=<?php echo $sbsy?>" </script><?php
      // header('location:students.php?batch='.$sbsy);
//       echo "<meta http-equiv='refresh' content='0'>";
		}else{
      echo "no";
    }
	

	}

?>