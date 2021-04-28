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
<div><?php include('header-all-inc.php'); ?></div>
<div style="width: 100%;background-color: #263547;padding-top:10px;padding-bottom:10px;">
<h2 style="text-align: center;color: white;font-size: 30px;">Demo Plans</h2>
</div><br><br>
<form method="POST" action="../includes/plan-table-user.php">
<table><tr>
<td><p style="font-size:20px;">Size of land:</p></td><td><input type="text" name="size" style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #black;border-radius: 4px;box-sizing: border-box;" required></td>
<td><p style="font-size:20px;">Number of floors:</p></td><td><input type="text" name="floor" style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #black;border-radius: 4px;box-sizing: border-box;" required></td>
<td><input type="submit" class="button" name="search" value="Search"></td></tr>

</table>
</form>

<table border="1" id="customers">
  <tr style="padding-top: 22px;padding-bottom: 22px;text-align: center;background-color: #263547;color: white;font-size:20px;">
   
    <td>Name of the Engineer</td>
    <td>Email</td>
    <td>Size of land</td>
    <td>No of floors</td>
    <td>No of bedrooms</td>
    <td>Car Parking</td>
    <td>About the Plan</td>
    <td>Model of Plan</td>
  </tr>

<?php
include('../includes/database-inc.php');
if(isset($_POST['search'])){
  $size=$_POST['size'];
  $floor=$_POST['floor'];
  $qry1="select * from plan where size='$size' and floor='$floor'";
  $res1=mysqli_query($conn,$qry1);
  while($data=mysqli_fetch_assoc($res1))
  {
    if($data){
  
    ?>
   <tr>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data['size']; ?>sqft</td>
    <td><?php echo $data['floor']; ?></td>
    <td><?php echo $data['bdroom']; ?></td>
    <td><?php echo $data['car']; ?></td>
    <td><?php echo $data['about']; ?></td>
    <td><a href=""><img src="uploads/<?php echo $data['plan']; ?>" width="100" height="100"></a></td>
  </tr>	

<?php
  }
  else{
  ?>
  <tr>
    <td>NO RECORD FOUND</td>
   </tr>
      <?php
  }
  }
  }
else{

include('../includes/database-inc.php');
$qry="select * from plan";
$records = mysqli_query($conn,$qry);
while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data['size']; ?>sqft</td>
    <td><?php echo $data['floor']; ?></td>
    <td><?php echo $data['bdroom']; ?></td>
    <td><?php echo $data['car']; ?></td>
    <td><?php echo $data['about']; ?></td>
    <td><a href=""><img src="uploads/<?php echo $data['plan']; ?>" width="100" height="100"></a></td>
  </tr>	
<?php
}
}
?>

</table>

<?php mysqli_close($conn);  // close connection ?>

</body>
</html>
