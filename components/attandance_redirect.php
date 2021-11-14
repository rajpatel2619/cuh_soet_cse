

<?php include("connection.php") ?>

<?php 
$cid = $_GET['cid'];
$bid = $_GET['bid'];


$query2 = "SELECT * FROM `classes` where id = '$cid' LIMIT 1 ";
$run2 = mysqli_query($conn,$query2);
 
while($row2 = mysqli_fetch_array($run2)){
  $cname =  $row2['name'];  
}


$query3 = "SELECT * FROM `batches` where id = '$bid' LIMIT 1 ";
$run3 = mysqli_query($conn,$query3);


while($row3 = mysqli_fetch_array($run3)){
  $bsy = $row3['year'];
  $bly = $row3['year'] + 4;
}
 

   date_default_timezone_set('Asia/Kolkata');
   $current_time_s=date("Y-m-d 00:00:00");
   $current_time_e=date("Y-m-d 23:59:59");
   $query4 = "select DISTINCT s.name,s.roll_number,a.type,s.id as sid,a.id as aid from students as s inner join attandance as a on a.batch_id = s.batch_id AND a.student_id=s.id  where a.class_id='$cid' and a.batch_id='$bid' and a.date between '$current_time_s' and '$current_time_e' ";
   $run4 = mysqli_query($conn,$query4);

?>




  <!-- form -->
  <p>
*Following are the students list for the choosen class <b><?php echo $cname ?></b> of Batch <b><?php echo $bsy ?> - <?php echo $bly ?></b>. For submitting the today's attandance just click on the submit attandance button. 



<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Choose Attandance Type</th>
      <th scope="col">Current Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
   while($row4=mysqli_fetch_array($run4)){ 
	?>
	<tr>
       <th scope="row"><?php echo $i; ?></th>
       <td><?php echo $row4['name'] ?></td>
       <td><?php echo $row4['roll_number'] ?></td>
       <td class="row">
       <form action="" method="post">
       <input type="hidden" name="aid" value="<?php echo $row4['aid']; ?>">
       <input type="hidden" name="stype" value="1">
       <button type="submit" name="form-submit" class="btn btn-success">Present</button>
       </form>&nbsp;&nbsp;&nbsp;
       <form action="" method="post">
       <input type="hidden" name="aid" value="<?php echo $row4['aid']; ?>">
       <input type="hidden" name="stype" value="2">
       <button type="submit" name="form-submit" class="btn btn-danger">Absent</button>
       </form> &nbsp;&nbsp;&nbsp;
       <form action="" method="post">
       <input type="hidden" name="aid" value="<?php echo $row4['aid']; ?>">
       <input type="hidden" name="stype" value="3">
       <button type="submit" name="form-submit" class="btn btn-info">On Leave</button>
       </form>
       <?php if($row4['type']==1){
	       echo "<td>Present</td>";
       }else if($row4['type']==2){
	echo "<td>Absent</td>";
       }else if($row4['type']==3){
	echo "<td>On Leave</td>";
       }
       else{
	echo "<td>Not Marked Yet</td>";
       }
        ?>
        <td></td>
 
     </tr>
   
       <?php
       $i++;
  }
  ?>
 
  </tbody>
</table>
  
<?php



	if(isset($_POST['form-submit'])){
		$aid = $_POST['aid'];
		$stype = $_POST['stype'];
		
		$query5 = "UPDATE `attandance` SET `type` = '$stype' where id='$aid' ";
		$run5 = mysqli_query($conn,$query5);
		// header('location:attandance_redirects.php?cid='.$cid.'&bid='.$bid);
		// header("Refresh:0");
		echo "<meta http-equiv='refresh' content='0'>";
		

	}

?>