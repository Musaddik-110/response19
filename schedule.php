
    
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
  <link rel="stylesheet" href="css/style.css">
   
   <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


<!-- header start-->

<div class="topnav" id="myTopnav">
    <a href="index.php">Home</a>
    
    <a href="infected.php">Infected</a>
    <a href="doctors.php">Doctors</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
 
  
<?php 
      if(isset($_SESSION['id']))
      {
?>
          <a href="schedule.php" class="active">Schedules</a>

          <a  style=" color: #35b49c ; right: 1rem;   position: absolute;"><?=$_SESSION['username'];?></a>
 
  <?php    }
      else{
        echo "";
       
      }

      
if(isset($_SESSION['id'])){
  ?>
   <a id="sign_out" href="logout.php" style="color:chocolate;">Sign Out of Your Account</a>

  <?php
}
else{
  echo "";
}
?>

  </div>

<!-- header end-->



<div class="counter_header">
      <h3> Your Schedule List </h3>
</div>


  <table>
  <thead>
    <tr>
      <th> Patient Name</th>
      <th> Patient Email</th>
      <th> Patient Phone</th>
      <th> Symptoms</th>
      <th> Other issues</th>
      <th> Living Area </th>
    </tr>
  </thead>
  <tbody>
    

    
<?php 
 
 
include ('includes/dbh.inc.php');
 
// SQL query to select data from database 
$d_id ="";
$d_id=$_SESSION['id'] ;
// echo $d_id;
$appsql =  " SELECT * FROM appointment where (app_doc_id = '$d_id') order by p_id desc "; 
 
$result = $conn->query($appsql);

if ($result->num_rows> 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["p_id"]. " - Name: " . $row["p_name"]. " " . $row["p_email"].  $row["p_phone"]. "<br>";
    ?>
<tr>
    <td data-column="  " value =" "><?php echo $row['p_name'] ?></td>
    <td data-column="  "  value =" "><?php echo $row['p_email'] ?></td>
    <td data-column="  "  value =" "><?php echo $row['p_phone'] ?></td>
    <td data-column=" "  value =" "><?php echo $row['symptoms'] ?></td>
    <td data-column=" "  value =" "><?php echo $row['other_issues'] ?></td>
    <td data-column=" "  value =" "><?php echo $row['living_area'] ?></td>
</tr>

<?php
  }

} else {

  ?>
  <tr>
    <td colspan="6" style="text-align:center;">NO SCHEDULE</td>
    
</tr>

  <?php
  
}

?>
   
  </tbody>
</table>

<script>  
 $(document).ready(function(){  
      $('#area').change(function(){  
           var area_id = $(this).val();  
           $.ajax({  
                url:"serverpage.php",  
                method:"POST",  
                data:{area_id:area_id},  
                success:function(data){  
                     $('#show_area').html(data);  
                }  
           });  
      });  
 });  
 </script>
 
<script src="js/custom.js"></script>
</body>
</html>