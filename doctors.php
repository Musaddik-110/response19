<?php 
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Covid-19</title>
  <link rel="stylesheet" href="css/style.css">
   
   <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: center;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
<a href="index.php">Home</a>
 
    <a href="infected.php">Infected</a>
    <a href="doctors.php" class="active">Doctors</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
   
<?php 

      if(isset($_SESSION['id']))
      {
?>
                <a href="schedule.php">Schedules</a>

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

  <div class="doctable" style="width:70%; text-align:center; margin:auto;">

  
  <div class="counter_header">
      <h3>Near By Doctors </h3>
    </div>
  

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for locations.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:20%;">Doctor Name</th>
    <th style="width:20%;">Doctor Email</th>
    <th style="width:25%;">Chamber</th>
    <th style="width:20%;">Hospital Location</th>
    <th style="width:25%;">Available Time</th>
    <th style="width:20%;">Appointment</th>
  </tr>
 
  
    
<?php 

include ('includes/dbh.inc.php');

 
// SQL query to select data from database 
$sql =  " SELECT * FROM doctable order by doc_id desc  "; 
 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
      
    ?>
 
<tr>
   
      <td  value =" "><?php echo $row['doc_name'] ?></td>
      <td  value =" "><?php echo $row['doc_email'] ?></td>
      <td  value =" "><?php echo $row['chamber_name'] ?></td>
      <td  value =" "><?php echo $row['hospital_location'] ?></td>
      <td  value =" "><?php echo $row['available'] ?></td>
      <?php $value = $row['doc_id'];?>
      <td  value =" "> <a href='appointment.php?value_key=<?php echo $value?>' name="appointment">Appointment</a> </td>
      
    
   
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

<script>

// filter
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>


 