<?php
session_start();
$email1=$_SESSION['email'];

?>
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
  background-color: #263547;
  border: none;
  color: white;
  padding-left:65%;
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
    <div><?php include('../includes/header-all-inc.php'); ?></div>
<div style="width: 100%;background-color: #263547;padding-top:10px;padding-bottom:10px;">
<h2 style="text-align: center;color: white;font-s'ize: 30'px;">Your Plans</h2>
</div><br><br>
<table border="1" id="customers">
  <tr style="padding-top: 22px;padding-bottom: 22px;text-align: center;background-color: #263547;color: white;font-size:20px;">
   
    <td>Size of land</td>
    <td>About plan</td>
    <td>Floors</td>
    <td>Bedrooms</td>
    <td>Car Parking</td>
    <td>Image</td>
   </tr>

<?php
include('../includes/database-inc.php');
$qry="select * from plan where email='$email1'";
$records = mysqli_query($conn,$qry);
while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['size'];?>sqft</td>
    <td><?php echo $data['about']; ?></td>
    <td><?php echo $data['floor']; ?></td>
    <td><?php echo $data['bdroom']; ?></td>
    <td><?php echo $data['car']; ?></td>
    <td><img src="uploads/<?php echo $data['plan']; ?>" width="100" height="100"></td>
   
  </tr>	
<?php
}
?>

</table>
<div style="padding-left:47%;">
   <a href="../index.php" class="button">Return</a>
  </div>  

<?php mysqli_close($conn);  // close connection ?>

</body>
<script>
    function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("customers").deleteRow(i);
}

</script>
</html>
