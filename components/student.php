<!-- <p>

	<i class="fa fa-arrow-right"> Create New Batch</i>

<br><br>

	<i class="fa fa-arrow-down"> Existing Batches</i>

</p> -->

<!-- <button type="button" class="btn btn-primary">Create New Batch</button>
<br><br> -->

<?php include("connection.php") ?>

<?php include("connection.php") ?>
<?php 
$ub = $_GET['batch'];
$ubl = $ub+4;


$query2 = "SELECT id FROM `batches` where year = '$ub' LIMIT 1 ";
$run2 = mysqli_query($conn,$query2);
$bid =1; 
while($row2 = mysqli_fetch_array($run2)){
  $bid =  $row2['id'];
}


$query3 = "SELECT * FROM `students` where batch_id='$bid' order by roll_number asc";
$run3 = mysqli_query($conn,$query3);
// if($run3) echo "yes";
// if (mysqli_num_rows($run3)==0) { echo "hi"; }

$query4 = "SELECT * FROM `batches` order by year desc";
$run4 = mysqli_query($conn,$query4);

?>


  <div class="container my-5">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">

        <button class="nav-link btn btn-success active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Students</button>
	&nbsp;&nbsp;
        <button class="nav-link btn btn-primary" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Register New Candidate</button>

      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <p>
	* Following are the total candidates with their all details which were registered till now for the choosen batch session <?php echo $ub.' - '.$ubl; ?>.
  <form class="shadow p-3" action="" method="get">
  <div class="form-group row">
  &nbsp;&nbsp;
    <input type="text" name="batch" class="form-control col col-4" placeholder="Enter Batch Year" required>
    &nbsp;&nbsp;
  <button type="submit" class="btn btn-info">Go</button>
  </div>

</form>
  <br>
	 <table class="table">
		 <thead class="thead-light">
			 <tr>
				 <th scope="col">#</th>
				 <th scope="col">Full Name</th>
				 <th scope="col">Roll No</th>
				 <th scope="col">Email</th>
				 <th scope="col">Mobile</th>
				 <th scope="col">Session</th>
				</tr>
			</thead>
			<tbody>
     
      <?php
				$i =1;  
				while($row3 = mysqli_fetch_array($run3)){
				?>	<tr><?php
        $dte = substr($row3['creation_date'],0,10);
				echo "<th scope='row'>{$i}</th>";
        ?>  
				<td><a href="./student_details.php?id=<?php echo $row3['id'] ?>" class="st-name"><?php echo $row3['name'] ?><a></td>
        <?php
				echo "<td>{$row3['roll_number']}</td>";
				echo "<td>{$row3['email']}</td>";
				echo "<td>{$row3['mobile']}</td>";
        echo "<td>{$ub} - {$ubl}</td>";
				$i++;
			}
			?>	</tr><?php
				?>
					

			</tbody>
		</table>
	</p>
      </div>

      <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
 <p>
 * Let's add some new cndidates with a new energy. Following is the simple form for adding a new student record to the previous existing records.
 <form class="shadow p-3" action="" method="post">
  <div class="form-group">
    <label for="c-name">Candidate Name :- </label>
    <input type="text" name="c-name" class="form-control" id="c-name" aria-describedby="c-name" placeholder="Enter Student Full Name. Ex :- Raj Patel" required>
  </div>
 
  <div class="form-group">
    <label for="c-batch">Batch Session :- </label>
 
  <select class="custom-select" name="c-batch" id="c-batch" required>
    <option value="">Choose...</option>
    <?php 
    while($row4 = mysqli_fetch_array($run4)){
      $bfy = $row4['year'];
      $blly = $row4['year'] + 4;
      $biid = $row4['id'];
      ?>
      <option value="<?php echo $biid; ?>"><?php echo $bfy; ?> - <?php echo $blly; ?></option>
    <?php
    }
    ?>
    </select>
  </div>
 

  <div class="form-group">
    <label for="c-roll">Roll Number :- </label>
    <input type="text" name="c-roll" class="form-control" id="c-roll" aria-describedby="c-roll" placeholder="Enter Student Roll Number in numeric value only. Ex :- 180894" required>
  </div>
  <div class="form-group">
    <label for="c-email">Email :- </label>
    <input type="email" name="c-email" class="form-control" id="c-email" aria-describedby="c-email" placeholder="Enter Student Email. Ex :- kakhilesh79@gmail.com" required>
  </div>
  <div class="form-group">
    <label for="c-mobile">Mobile :- </label>
    <input type="text" name="c-mobile" class="form-control" id="c-mobile" aria-describedby="c-mobile" placeholder="Enter Student Mobile No without +91 prefix. Ex :- 8543832619" required>
  </div>
  
 
  <button type="submit" name="submit-form" class="btn btn-info">Submit</button>
</form>
	</p>     

      </div>

      
    </div>
  </div>
  
<?php



// add new class...
	if(isset($_POST['submit-form'])){
		$cname = $_POST['c-name'];
		$cbatch = $_POST['c-batch'];
		$cemail = $_POST['c-email'];
		$croll = $_POST['c-roll'];
		$cmobile = $_POST['c-mobile'];
    // echo $cname.$cbatch.$cemail.$croll.$cmobile;
    $ck2 = "select * from `students` where roll_number='$croll'";
		$rn2 = mysqli_query($conn,$ck2);
		$nm2 = mysqli_num_rows($rn2);
		if($nm2>0){
			echo '<script>alert("Student Data Already Exists!")</script>';
  
		}else{

		$query1 = "INSERT INTO `students` (`batch_id`,`email`,`mobile`,`roll_number`,`name`,`date`) VALUES ('$cbatch','$cemail','$cmobile','$croll','$cname',NOW())";
		$run1 = mysqli_query($conn,$query1);

		if($run1){
      // header('location:classes.php?batch=2018');
      echo "<meta http-equiv='refresh' content='0'>";
		}else{
      // echo "no";
    }
    }

	}

?>