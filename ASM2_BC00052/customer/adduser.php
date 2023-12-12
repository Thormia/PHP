<?php
echo "connected <br>";
if (isset($_POST['btnadd']))
{
    $name = $_POST['useror'];
    $price = $_POST['dateor'];
    $address = $_POST['addor'];
    $date = $_POST['phoneor'];
    $phone = $_POST['detailor'];
    $au = "Customer";
    require_once "../admin/databaseconnect.php";
    $sql = "INSERT INTO user(Username,Password,Phone,Address,Banking,Authority) VALUES ('$name',md5('$price'),'$address','$date','$phone','$au')";
   //$result = mysqli_query($conn,$sql);
    if ($conn -> query($sql))
        //echo "insert successful!";
    header("Location: login.php");
    else  
        echo "insert fail!";
}
else
    echo "Access denied";
?>