<?php
echo "connected <br>";
if (isset($_POST['btnadd']))
{
    $name = $_POST['useror'];
    $date = $_POST['dateor'];
    $detail = $_POST['detailor'];
    require_once "databaseconnect.php";
    $sql = "INSERT INTO orderdetails(ProductName,OrderID,Price) VALUES ('$name','$date','$detail')";
   //$result = mysqli_query($conn,$sql);
    if ($conn -> query($sql))
        //echo "insert successful!";
    header("Location: orderdetail.php");
    else  
        echo "insert fail!";
}
else
    echo "Access denied";
    $sqlupdatef = "
    UPDATE product
    SET `Status` = 'Out of Stock'
    WHERE Name = '$name'
            ";
    mysqli_query($conn,$sqlupdatef);
?>
