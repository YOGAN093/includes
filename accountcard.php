<?php
session_start();
include('../includes/database-inc.php');
$email1=$_SESSION['email'];
$qry="SELECT * FROM project WHERE email='$email1'";
$res=mysqli_query($conn,$qry);
$qry1="SELECT * FROM engg WHERE email='$email1'";
$res1=mysqli_query($conn,$qry1);

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  height:400px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #263547;
  text-align: center;
  cursor: pointer;
  width: 100%;
  height:80px;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

</style>
</head>
<body style="background-color:#242222;">
<div><?php include('../includes/header-all-inc.php'); ?></div>
<div style="padding-top:100px;">
<div class="card" style="background-color:white;">
<?php  while($data=mysqli_fetch_assoc($res))
{
    $name=$data['name'];
    $email=$data['email'];
    $role=$data['role'];
?>
<?php if($role=='Engineer'): ?>
<?php
while($data=mysqli_fetch_assoc($res1))
{
    $profile=$data['profile'];
  ?>

<img src="uploads/<?php echo $profile; ?>" alt="noimage" style="width:100%;height:250px">
<?php } ?>
<?php else: ?>
<img src="../images/upload.jpg" alt="noimages" style="width:100%;height:250px">
<?php endif; ?>



  <h1><?php echo $name; ?></h1>
  <p class="title"><?php echo $role; ?></p>
  <p><?php echo $email; ?></p>
 <?php if($role=='Engineer'):?>
  <a href="https://smarthomeconstruction.000webhostapp.com/Engineer.php"><button>Update</button></p>
 
  <?php else: ?>
        <a href="https://smarthomeconstruction.000webhostapp.com/index.php"><button>Close</button></p>
    
  <?php endif; ?>
</div>
</div>
<?php } ?>
<script>

const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');


imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});


imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "none";
});


file.addEventListener('change', function(){
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); 
        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);

        }
});
 </script>


</body>
</html>
