<html>
    <?php
if(isset($_POST['userengg']))
{
    include('../includes/database-inc.php');
    $result = mysqli_query($conn, "SELECT * FROM engg");
    echo $result;
}

else
{
    header("location:../login.html");
    exit();
}

?>
</html>