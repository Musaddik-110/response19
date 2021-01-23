
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style.css">
    <title>Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
  
<div class="topnav" id="myTopnav">

<a href="index.php" class="active">Home</a>
   
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
<script>
  // display none
 function display_function() {
      
      document.getElementById("sign_out").style.display = "none";
    }
</script>
  </div>


<?php 

include ('includes/dbh.inc.php');

if(isset($_GET['value_key'])){
     $doc_id1 = $_GET['value_key'];
 
}
// SQL query to select data from database 
$sql="SELECT * FROM doctable WHERE (doc_id=$doc_id1) ";
 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
   
    ?>


<div class= " writing">
      <h6 style="font-size: 17px; margin-top:10px;">
      <strong style="font-size:18px; font-style: italic; margin-bottom:7px;">Doctor's Appointment</strong>
       <br><hr>
       <p>Name: <?php echo $row['doc_name'] ?></p>
       <p>Email: <?php echo $row['doc_email'] ?></p>
       <p>Chamber: <?php echo $row['chamber_name'] ?></p>
       <p>Hospital location: <?php echo $row['hospital_location'] ?></p>
       <p>Available Time : <?php echo $row['available'] ?></p>
      </h6>
</div>


<?php
  }

} else {

  ?>
  
    <h4>NO DATATABLE</h4>
  <?php
  
}

?>
 

 <div class="counter_header" style="padding-bottom:0;">
      <h5 style="left: 3rem; position: absolute;">Appointment</h5>
    </div>

<!-- your case start--->
<div class="appointment_form">

<form action="" method="post">



<div class="form-section">

<label for="">Name</label>
<input style="width: 70%;" id="pname" type="text" name="pname" placeholder="Your name">

</div>


<div class="form-section">

<label for="">Email</label>
<input style="width: 70%;" type="email" name="pemail" placeholder="Your Email">

</div>


<div class="form-section">

<label for="">Phone</label>
<input style="width: 70%;" type="text" name="pphone" placeholder="Contact Number">

</div>

<div class = "form-checkbox">
<div class="cb">
  <input type="checkbox" id="" name="covidsymp[]" value="Cold">
 <label for=""> Cold</label><br>
  </div>
  <div class="cb">
  <input type="checkbox" id="" name="covidsymp[]" value="Fever">
 <label for=""> Fever</label><br>
  </div>
  <div class="cb">
  <input type="checkbox" id="" name="covidsymp[]" value="Difficult to Breath">
 <label for=""> Difficult to Breath</label><br>
  </div>
  <div class="cb">
  <input type="checkbox" id="" name="covidsymp[]" value="Feeling weak">
 <label for=""> Feeling weak</label><br>
  </div>
  <div class="cb">
  <input type="checkbox" id="" name="covidsymp[]" value="Headache">
 <label for=""> Headache </label><br>
  </div>

</div>
<div class="form-section">

<label for="">Other issues</label>
<textarea name="issue" style=" position: absolute; right: 2rem; width: 70%" name="" id="" cols="30" rows="5">


</textarea>

</div>

<div class="dropdown-section">
 
 <label style="margin-right:8rem;" for="">Living Area </label>
 
 <?php 
 // area sql
  $areasql = "SELECT * FROM area ";

   
$result = $conn->query($areasql);

if ($result->num_rows> 0) {
// output data of each row
?>
<select name="area">
  <?php
  while($row = $result->fetch_assoc()) {
   
    ?>
 
      <option name="area" value="<?php echo $row['area_id'] ?>"><?php echo $row['area_name'] ?></option>
     
<?php
  }
  ?>
  </select>
  <?php
} else {

  ?>
  <tr>
    <td colspan="5" style="text-align:center;">NO DATATABLE</td>
    
</tr>

  <?php
  
}

?>

 
  
 </div>


<div class="submit_button">
   <button name="submit">Submit</button>
</div>
</form>
</div>

  




<!-- your case end--->


<?php 

// issues 

  
if(isset($_POST['submit'])){
  $pat_name = $_POST['pname'];
  $email = $_POST['pemail'];
  $phone = $_POST['pphone'];

  $symp="";
  if(isset($_POST['covidsymp'])){
  $symp = $_POST['covidsymp'];
  }
  $issues = $_POST['issue'];
  
  $chk = "";
  if (is_array($symp) || is_object($symp)){
  foreach ($symp as $chk1){
    $chk .= $chk1.",";

  }
  
}

$area1="";
if(isset($_POST['area'])){

  $area1 = $_POST['area'];
 
}


// selecting specific value from db
$pat_living_area="";
$pat_living_area = "SELECT area_name from area where(area_id = '$area1')";


$result11 = mysqli_query($conn,$pat_living_area);
if(mysqli_num_rows($result11)>0){
  while($row = mysqli_fetch_assoc($result11)){
    $p_area = $row['area_name'];
  }
}



$sql = "INSERT INTO appointment(p_name, p_email, p_phone, symptoms, other_issues,living_area,app_doc_id) VALUES ('$pat_name','$email','$phone','$chk','$issues','$p_area','$doc_id1')";

if (mysqli_query($conn, $sql)) {
?>
  <script>
  alert(" Appointment Fixed! We will stay conected with you.");
</script>
<?php 
} else {
  ?>
  <script>
     alert(" Data couldn't  inserted .");
  </script>
<?php
}
}

?>


</body>
</html>