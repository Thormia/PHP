<?php
if (isset($_GET['id']))
{   
    require_once "databaseconnect.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE Username = '$id'";
    if (mysqli_query($conn,$sql) == true)
    {
        header("Location: users.php");
    }
    echo "fail";
}
?>