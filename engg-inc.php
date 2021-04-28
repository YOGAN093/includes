<?php
session_start();
$email=$_SESSION['email'];
include('../includes/database-inc.php');
        
if(isset($_POST['enggsubmit']))
	{
	    header('Location: ../index.php');
	      	$exp=$_POST['exp'];
			$field=$_POST['option'];
			$college=$_POST['college'];
			$passedout=$_POST['passedout'];
			$cernum=$_POST['cernum'];
			$ncity=$_POST['ncity'];
            $project=$_POST['project'];
			
			$linkedin=$_POST['linkedin'];
			$twitter=$_POST['twitter'];
			$profile = rand(1000,10000)."-".$_FILES["file"]["name"];
		  $tname = $_FILES["file"]["tmp_name"];
   			$uploads_dir = 'uploads';
    	   move_uploaded_file($tname, $uploads_dir.'/'.$profile);
		   $cerimg = rand(1000,10000)."-".$_FILES["cerimg"]["name"];
		  $tname = $_FILES["cerimg"]["tmp_name"];
   			$uploads_dir = 'certificate';
    	   move_uploaded_file($tname, $uploads_dir.'/'.$cerimg);
		   $query="UPDATE engg SET exp='$exp',field='$field',college='$college',passedout='$passedout',cernum='$cernum',ncity='$ncity',project='$project',profile='$profile',cerimg='$cerimg',linkedin='$linkedin',twitter='$twitter' WHERE email= '$email'";

			mysqli_query($conn,$query);
			
			 
			
	}
	
	
?>