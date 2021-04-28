<?php
$url="localhost";
			$user="root";
			$pass="";
			$conn=mysqli_connect($url,$user,$pass,"final");
			if(!$conn){
				die("connection failed".mysql_error());
			}
              