<?php   

session_start();

 //load_data_select.php  
 $connect = mysqli_connect("localhost", "root", "", "covid19");  
 function fill_area($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM area";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option onclick="display_function()" style="text-align: center; " value="'.$row["area_id"].'">'.$row["area_name"].'</option>';  
      }  
      return $output;  
 }  
 function fill_patient($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM issues order by p_id desc";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
        /*   $output .= '<div class="col-md-3">';  
           $output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["p_name"].''.$row["p_email"].'';  
           $output .=     '</div>';  
           $output .=     '</div>';  
       */

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
      return $output;  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Infected People</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="css/style.css">
      </head>  
      <body>  
    

  <div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
    
    <a href="infected.php" class="active">Infected</a>
    <a href="doctors.php">Doctors</a>
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

  <div class="counter_header">
      <h3>Infected People List </h3>
    </div>

  <select class="area" name="area" id="area" style="text-align: center; left: 50%; position: absolute; transform: translateX(-50%); padding: .5rem 3.5rem 0.5rem 4.5rem; text-shadow: 5px; box-shadow: 2px 2px 2px 2px #cacfcf;">  
       <option onclick="display_function()">Show All areas</option>  
        <?php echo fill_area($connect); ?>  
  </select> 

<table id="pre_table">
  <thead>
    <tr>
      <th> Name</th>
      <th> Email</th>
      <th> Phone</th>
      <th> Symptoms</th>
      <th> Other issues</th>
      <th> Living Area </th>
    </tr>
  </thead>
  <tbody>          
 

    <div class="row" id="show_area">  
          <?php echo fill_patient($connect);?>  
    </div>  
  </tbody> 
</table>    

  <script>  
      // display none
    function display_function(){
      
      document.getElementById("pre_table").style.display = "none";
    }

    // ajax
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
  <ptscri src="js/custom.js"></script>
      </body>  
 </html>  




