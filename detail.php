<html>
<head>
 <style>
     #customers {

  font-family: Arial, Helvetica, sans-serif;

  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


 </style>
</head>
<body>
<div style="width:100%;"><?php include('header-all-inc.php'); ?></div><br>

<div style="width: 100%;background-color: #263547;padding-top:10px;padding-bottom:10px;">

<h2 style="text-align: center;color: white;font-size: 30px;">Our Engineers</h2>
</div><br><br>
<form method="POST" action="../includes/detail.php">
<table><tr>
<td><p style="font-size:20px;">Experience:</p></td><td><input type="text" name="exp" style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #black;border-radius: 4px;box-sizing: border-box;" required></td>
<td><p style="font-size:20px;">City:</p></td><td><input type="text" name="cty" style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #black;border-radius: 4px;box-sizing: border-box;" required></td>
<td><input type="submit" class="button" name="search" value="Search"></td></tr>

</table>
</form>
<table border="1" id="customers">
  <tr style="padding-top: 22px;padding-bottom: 22px;text-align: center;background-color: #263547;color: white;font-size:20px;">
   
    <td>Name</td>
    <td>Experience</td>
    <td>Field</td>
    <td>City</td>
    <td>LinkedIN</td>
    <td>Twitter </td>
    <td>Project</td>
 
    <td>Profile</td>
  </tr>

<?php

include('../includes/database-inc.php');
if(isset($_POST['search'])){
  $exp=$_POST['exp'];
  $cty=$_POST['cty'];
  $qry1="select * from engg where exp='$exp' and ncity='$cty'";
  $res1=mysqli_query($conn,$qry1);
  while($data=mysqli_fetch_assoc($res1))
  {
    ?>
  <tr>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['exp']; ?></td>
    <td><?php echo $data['field']; ?></td>
    <td><?php echo $data['ncity']; ?></td>
    <td><a href="<?php echo $data['linkedin']; ?>"><?php echo $data['linkedin']; ?></a></td>
    <td><a href="<?php echo $data['twitter']; ?>"><?php echo $data['twitter']; ?></a></td>
    <td><?php echo $data['project']; ?></td>
 
    <td><a href=""><img src="uploads/<?php echo $data['profile']; ?>" width="100" height="100"></a></td>
  </tr>	
<?php

  }
}
else{
$qry="select * from engg";
$records = mysqli_query($conn,$qry);
while($data = mysqli_fetch_array($records))
{
    $cernum=$data['cernum'];
    if($cernum){

?>
  <tr>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['exp']; ?></td>
    <td><?php echo $data['field']; ?></td>
    <td><?php echo $data['ncity']; ?></td>
    <td><a href="<?php echo $data['linkedin']; ?>"><?php echo $data['linkedin']; ?></a></td>
    <td><a href="<?php echo $data['twitter']; ?>"><?php echo $data['twitter']; ?></a></td>
    <td><?php echo $data['project']; ?></td>
 
    <td><a href=""><img src="uploads/<?php echo $data['profile']; ?>" width="100" height="100"></a></td>
  </tr>	
<?php
}
}
}
?>

</table>

<?php mysqli_close($conn);  // close connection ?>

</body>
</html>
