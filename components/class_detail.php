

<?php include("connection.php") ?>

<?php 
$cid = $_GET['cid'];
$bid = $_GET['bid'];





?>



<p>
<p>Before Moving to the today's Attandance Register Page make sure It's is not Holiday today. If there is any type of class dissmissal kindly do not proceed further.</p>
<form action="" method="post">
<button type="submit" name="submit-form" class="btn btn-success">I Agree & Proceed</button>
</form>
</p>

<!-- href="attandance_redirects.php?cid=<?php echo $cid; ?>&bid=<?php echo $bid; ?>" -->

<?php  
 if(isset($_POST['submit-form'])){
   date_default_timezone_set('Asia/Kolkata');
   $current_time1=date("Y-m-d 00:00:00");
   $current_time2=date("Y-m-d 23:59:59");
   $query1 = "select * from `attandance` where class_id='$cid' and batch_id='$bid' and date between '$current_time1' and '$current_time2' ";
   $run1 = mysqli_query($conn,$query1);
   $count1 = mysqli_num_rows($run1); 
   
   if($count1>0){
    // echo "<p class='msg'>You have already filled todays attandance. The link will be open in next class timings. Thank You..</p>";
    header('location:attandance_redirects.php?cid='.$cid.'&bid='.$bid);
   }
  else{
    // echo "not submitted yet";
     $query2 = "SELECT * FROM `students` where batch_id = '$bid'";
     $run2 = mysqli_query($conn,$query2);
     
     while($row2=mysqli_fetch_array($run2)){

       $stid = $row2['id'];
        $stbid = $bid;
        $stcid = $cid;

        $query3 = "INSERT INTO `attandance` (`student_id`,`batch_id`,`class_id`,`type`,`date`) VALUES ('$stid','$stbid','$stcid',0,NOW())";
        $run3 = mysqli_query($conn,$query3);
        
      }
      header('location:attandance_redirects.php?cid='.$cid.'&bid='.$bid);
    }

    
  
 }

?>


