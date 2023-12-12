<?php
if (isset($_GET['id']))
{   
    require_once "databaseconnect.php";
    $id = $_GET['id'];
    $third= mysqli_fetch_assoc(mysqli_query($conn,"select * from orderdetails where ID = '$id'"))['ProductName'];
    $sql = "DELETE FROM orderdetails WHERE ID = '$id'";
    if (mysqli_query($conn,$sql) == true)
    {
        header("Location: index.php?page=detail");
    }
    echo "fail";
    $sqlupdatef = "
    UPDATE product
    SET `Status` = 'Avaiable'
    WHERE Name = '$third'
            ";
    mysqli_query($conn,$sqlupdatef);
}
?>