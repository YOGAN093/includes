<?php 
session_start();
include('../includes/database-inc.php');
    
if(isset($_POST['loginsubmit']))
{
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];    
    $qry1="SELECT *  FROM engg WHERE email='$email'";
    $res1=mysqli_query($conn,$qry1);
    
    $qry="select * from project where email='$email' and pwd='$pwd'";
    $res=mysqli_query($conn,$qry);
    if($row=mysqli_fetch_assoc($res))
    {
        $_SESSION['role']=$row['role'];
        $_SESSION['email']=$row['email'];
        if($_SESSION['role']=="Engineer") {
        if($data=mysqli_fetch_assoc($res1))
        {
            $cernum=$data['cernum'];

            if(!$cernum)
            {
            header("Location: ../Engineer.php");
            }
            else{
                header("location:../index.php");
            }
        }
        }
        else{
            header("location:../index.php");
        }
    }
    else
    {
        header("Location: ../login.php?error=Invalid Username or password");
    }
}
else
{
    header("location:../login.html");
    exit();
}

?>
<script type="text/javascript">
document.write('<script type="text/javascript" src="js/mainlogin.js"></script>');
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</script>

