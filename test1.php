
<?php
  include_once 'includes/dbh.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


<div class="topnav" id="myTopnav">
    <a href="index.php" class="active">Home</a>
    <a href="#news">News</a>
    <a href="table.php">Table</a>
    <a href="#about">About</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>



  <div class="doctable" style="width:70%; text-align:center; margin:auto;">

  
  <h2 style="margin-top: 3rem; font-size:3rem;">Near By Doctors </h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for locations.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:20%;">Doctor Name</th>
    <th style="width:20%;">Doctor Email</th>
    <th style="width:30%;">Chamber</th>
    <th style="width:30%;">Hospital Location</th>
    <th style="width:30%;">Appointment</th>
  </tr>
 
  
    
<?php 

include ('includes/dbh.inc.php');

 
// SQL query to select data from database 
$sql =  " SELECT * FROM doctable  "; 
 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
      
    ?>

<tr>
   
      <td name="s_doc_name" value =" "><?php echo $row['doc_name'] ?></td>
      <td name="s_doc_email"  value =" "><?php echo $row['doc_email'] ?></td>
      <td name="s_doc_cham"  value =" "><?php echo $row['chamber_name'] ?></td>
      <td name="s_doc_hos"  value =" "><?php echo $row['hospital_location'] ?></td>
      <?php $value = $row['doc_id'];?>
      <td > <a href='test.php?value_key=<?php echo $value?>'>Appointment</a> </td>
      
    


   
</tr>
<?php
  }

} else {

  ?>
  <tr>
    <td colspan="5" style="text-align:center;">NO DATATABLE</td>
    
</tr>

  <?php
  
}

?>

  
</table>


  </div>
 
</body>
</html>
