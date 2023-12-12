<?php
session_start();
if (!isset($_SESSION['example']))
    header("Location: login.php");
?>

<?php
if (isset($_GET['id']))
{   
    require_once "databaseconnect.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE Name = '$id'";
    $sql_image = "SELECT image FROM product WHERE Name = '$id'";
    mysqli_query($conn,$sql_image);
    if(mysqli_num_rows(mysqli_query($conn,$sql_image)) > 0)
    {
        $row = mysqli_fetch_assoc(mysqli_query($conn,$sql_image));
        $image_path = $row['image'];
        unlink($image_path);
    }
    if (mysqli_query($conn,$sql) == true)
    {
        header("Location: product.php");
    }
    echo "fail";
}
?>