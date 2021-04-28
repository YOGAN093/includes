<?php
session_start();
include('database-inc.php');
$email1=$_SESSION['email'];
$qry="select * from engg where email='$email1'";
$res=mysqli_query($conn,$qry);
while($data=mysqli_fetch_assoc($res)){
  $name=$data['name'];
if(isset($_POST['upload'])){
     header("Location: ../includes/plan-table.php");  
    $email=$_SESSION['email'];
  
    $size=$_POST['size'];
    $about=$_POST['about'];
    $floor=$_POST['floor'];
    $bdroom=$_POST['bdroom'];
   $car=$_POST['car'];
    $profile = rand(1000,10000)."-".$_FILES["file"]["name"];
        $tname = $_FILES["file"]["tmp_name"];
             $uploads_dir = 'uploads';
         move_uploaded_file($tname, $uploads_dir.'/'.$profile);
          $qry="INSERT  INTO plan(email,name,size,about,floor,bdroom,car,plan) VALUES('$email','$name','$size','$about','$floor','$bdroom','$car','$profile')";
            mysqli_query($conn,$qry);
    
    }
}


?>
