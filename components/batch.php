<!-- <p>

	<i class="fa fa-arrow-right"> Create New Batch</i>

<br><br>

	<i class="fa fa-arrow-down"> Existing Batches</i>

</p> -->

<!-- <button type="button" class="btn btn-primary">Create New Batch</button>
<br><br> -->

<?php include("connection.php") ?>
<?php 

$query = "SELECT * FROM `batches` order by id desc";
$run = mysqli_query($conn,$query);
?>




  <div class="container my-5">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">

        <button class="nav-link btn btn-success active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Batches</button>
	&nbsp;&nbsp;
        <button class="nav-link btn btn-primary" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Create New Batch</button>

      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <p>
	* Following are the total batches which were created till now & All the batches are ordered in the newest to oldest batch order.
	 <table class="table">
		 <thead class="thead-light">
			 <tr>
				 <th scope="col">#</th>
				 <th scope="col">Batch - Session</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i =1;  
				while($row = mysqli_fetch_array($run)){
				?>	<tr><?php
				$ly = $row['year']+4;
				echo "<th scope='row'>{$i}</th>";
				echo "<td>&nbsp;&nbsp;&nbsp;{$row['year']} - {$ly}</td>";
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
 * Let's add some new batches with a new energy. Following is the simple form for adding a new batch to the previous existing batches.
 <form class="shadow p-3" action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Batch Year :- </label>
    <input type="text" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Starting Year of the Batch. ex:- 2018" required>
  </div>
 
  <button type="submit" name="submit" class="btn btn-info">Submit</button>
</form>
	</p>     

      </div>

      
    </div>
  </div>
  
<?php
	if(isset($_POST['submit'])){
		$year = $_POST['year'];
		$ck2 = "select * from `batches` where year='$year'";
		$rn2 = mysqli_query($conn,$ck2);
		$nm2 = mysqli_num_rows($rn2);
		if($nm2>0){
			echo '<script>alert("Batch Already Exists!")</script>';
  
		}else{

			$query1 = "INSERT INTO `batches` (`year`,`creation_date`) VALUES ('$year',NOW()) ";
			$run1 = mysqli_query($conn,$query1);
			
			if($run1){
				echo "<meta http-equiv='refresh' content='0'>";
			}else{
				// echo "no";
			}
		}
	

	}

?>