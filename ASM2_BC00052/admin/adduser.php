<?php
echo "connected <br>";
if (isset($_POST['btnadd']))
{
    $name = $_POST['useror'];
    $price = $_POST['dateor'];
    $address = $_POST['addor'];
    $date = $_POST['phoneor'];
    $phone = $_POST['detailor'];
    $fn = $_POST['fullname'];
    require_once "databaseconnect.php";
    $sql = "INSERT INTO user(Username,Password,Phone,Address,Banking,`Full Name`,Authority) VALUES ('$name','$price','$address','$date','$phone','$fn','Customer')";
   //$result = mysqli_query($conn,$sql);
    if ($conn -> query($sql))
        //echo "insert successful!";
    header("Location: users.php");
    else  
        echo "insert fail!";
}
else
    echo "Access denied";
?>