<?php   
 //load_data_select.php  
 $connect = mysqli_connect("localhost", "root", "", "covid19");  
 function fill_area($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM area";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option onclick="myFunction()" value="'.$row["area_id"].'">'.$row["area_name"].'</option>';  
      }  
      return $output;  
 }  
 function fill_patient($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM issues";  
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
           <title>doc ajax</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="css/style.css">
      </head>  
      <body>  
    

  <div class="topnav" id="myTopnav">
    <a href="index.php" class="active">Home</a>
    <a href="#news">News</a>
    <a href="table.php">All Patients</a>
    <a href="doctors.php">Doctors</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>


  <select name="area" id="area" >  
                          <option onclick="display_function()" value="">Show All areas</option>  
                          <?php echo fill_area($connect); ?>  
  </select> 


<table id="pat_table">
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
<?php 


?>

          <div class="row" id="show_area">  
               <?php echo fill_patient($connect);?>  
          </div>  
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
// display none
 function display_function() {
      
  document.getElementById("pat_table").style.display = "none";
}

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















 






