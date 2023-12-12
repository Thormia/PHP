<?php
session_start();
if (!isset($_SESSION['example1']))
    header("Location: login.php");
?>
<?php
if (isset($_GET['id']))
{   
    require_once "databaseconnect.php";
    $id = $_GET['id'];
    $sqltotal = "select * FROM supportrequirement";
    $sql = "select * FROM supportrequirement WHERE ID = '$id'";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sqltotal);
    if(mysqli_num_rows(mysqli_query($conn,$sql)) == 1)
    {
        $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        if ($row['Status'] == "yes")
        {
          $sqlupdatef = "
    UPDATE supportrequirement
    SET Status = 'no'
    WHERE ID = '$id'
            ";
        if (mysqli_query($conn,$sqlupdatef))
        {
            header("Location: sp.php");
        }
        else echo "not success";
        }
        else
        {
          $sqlupdatef = "
    UPDATE supportrequirement
    SET Status = 'yes'
    WHERE ID = '$id'
            ";
        if (mysqli_query($conn,$sqlupdatef))
        {
            header("Location: sp.php");
        }
        else echo "not success";
        }
    }
}
?>
