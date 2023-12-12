<?php
if (isset($_GET['id']))
{   
    require_once "databaseconnect.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM orders WHERE ID = '$id'";
    if (mysqli_query($conn,$sql) == true)
    {
        header("Location: index.php?page=order");
    }
    echo "fail";
}
?>