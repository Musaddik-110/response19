
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Server page infected </title>
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
     
<table>
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


 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "covid19");  
 $output = '';  
 if(isset($_POST["area_id"]))  
 {  
      if($_POST["area_id"] != '')  
      {  
           $sql = "SELECT * FROM issues WHERE area_id = '".$_POST["area_id"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM issues";  
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
          // $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["p_name"].''.$row["p_email"].'</div></div>'; 
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
      echo $output;  
 }  else{
      echo "no data";
 }

?>


  </tbody>   
</body>
</html>