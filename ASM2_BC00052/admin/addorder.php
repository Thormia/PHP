<?php
echo "connected <br>";
if (isset($_POST['btnadd']))
{
    $name = $_POST['useror'];
    $price = $_POST['priceor'];
    $address = $_POST['addor'];
    $date = $_POST['dateor'];
    $phone = $_POST['phoneor'];
    require_once "databaseconnect.php";
    $sql = "INSERT INTO orders(UserName,DateOut,Address,`Phone number`, `Total Price`) VALUES ('$name','$date','$address','$phone','$price')";
   //$result = mysqli_query($conn,$sql);
    if ($conn -> query($sql))
        //echo "insert successful!";
    header("Location: order.php");
    else  
        echo "insert fail!";
}
else
    echo "Access denied";
?>