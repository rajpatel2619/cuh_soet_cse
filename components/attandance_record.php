

<?php include("connection.php") ?>

<?php 
$bid = $_GET['bid'];
$cid = $_GET['cid'];
$sd = $_GET['sd'];
$sd = $sd." 00:00:00";
$ld = $_GET['ld'];
$ld = $ld." 23:59:59";

// attandnce list query
$query1 = "select DISTINCT s.name,s.roll_number,COUNT(a.type) as total_present,s.id from students as s inner join attandance as a on a.batch_id = s.batch_id AND a.student_id=s.id  where a.class_id='$cid' and a.batch_id='$bid' and a.type=1 and a.date BETWEEN '$sd' and '$ld' GROUP by a.student_id order by s.roll_number asc";
$run1 = mysqli_query($conn,$query1);
//  print_r($run1);

?>



  <p>
	* Following are the Student's Attandace Performance for the selected class & batch. You can choose the specific by filling the below form.
  <form action="" class="row shadow p-3" method="get">
  <div class="form-group col col-5">
                <select name="bid" class="form-control">
                    <option value="">Choose Batch</option>
                    <?php
                        $sql = "SELECT * FROM `batches` order by id desc"; 
                        $result = mysqli_query($conn,$sql);
                        while($row = $result->fetch_assoc()){
                          $tp = $row['year']+4;
                            echo "<option value='".$row['id']."'>".$row['year'].' - '.$tp."</option>";
                        }
                    ?>
                </select>
            </div>


            <div class="form-group col col-7">
                <select name="cid" class="form-control" style="width:350px">
            <option value="">Select Class</option>
                </select>
            </div>

            <div class="form-group col col-5">
            <input type="text" name="sd" class="form-control" placeholder="Start Date. Ex :- yyyy-mm-dd" required>
            </div>
            <div class="form-group col col-5">
            <input type="text" name="ld" class="form-control" placeholder="Last Date. Ex :- yyyy-mm-dd" required>
            </div>

            <button type="submit" class="btn btn-info col col-10">Fetch Attandace Details</button>
  </form>


    <br>


<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Roll Number</th>
      <th scope="col">Student Name</th>
      <th scope="col">Total Classes Attended</th>
    </tr>
  </thead>
  <tbody>
  <?php  
				while($row1 = mysqli_fetch_array($run1)){
				?>	<tr>
        <td><?php echo $row1['roll_number'] ?></td>
				<td><a href="./student_details.php?id=<?php echo $row1['id'] ?>" class="st-name"><?php echo $row1['name'] ?><a></td>
        <?php
				echo "<td>{$row1['total_present']}</td>";
			
			}
			?>	</tr><?php
				?>
			
  </tbody>
</table>


  </p>


  <script>
$( "select[name='bid']" ).change(function () {
    var stateID = $(this).val();

    if(stateID) {


        $.ajax({
            url: "ajaxpro.php",
            dataType: 'Json',
            data: {'id':stateID},
            success: function(data) {
                $('select[name="cid"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="cid"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $('select[name="city"]').empty();
    }
});
</script>