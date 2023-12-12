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
    $sqltotal = "select * FROM orders";
    $sql = "select * FROM orders WHERE ID = '$id'";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sqltotal);
    if(mysqli_num_rows(mysqli_query($conn,$sql)) == 1)
    {
        $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    }
}
?>

<?php
    if(isset($_POST['btnModify']))
    {
        //lay du lieu
    $name = $_POST['useror'];
    $price = $_POST['priceor'];
    $address = $_POST['addor'];
    $date = $_POST['dateor'];
    $phone = $_POST['phoneor'];
    $sqlupdatef = "
    UPDATE orders
    SET Username = '$name', DateOut = '$date', Address = '$address', `Phone number`='$phone',  `Total Price` = '$price'
    WHERE ID = '$id'
            ";
        if (mysqli_query($conn,$sqlupdatef))
        {
            header("Location: order.php");
        }
        else echo "not success";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css//style.css">
    <title>Document</title>
    <script src="login.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div>
        <div class="header">
            <div
              class="p-6 text-center titlename"
              style="
                background-color: rgb(219, 111, 72);
              "
            >
              <div class="mask" >
                <div class="d-flex justify-content-center align-items-center h-100">
                  <div class="title">
                    <h1 class="mb-3" id="title">Admin Of BC00052 shop</h1>
                  </div>
                </div>
              </div>
            </div>          
        </div>
    </div>
    </div>
    <div class="container">
<table class="table">
            <thead>
              <tr>
                <td colspan="1"></td>
                <th scope="col" colspan="3" id="or">ORDER MANAGEMENT</th>
              </tr>
            </thead>
            <tbody>    
              <tr>
                <th></th>
                <th scope="row">
                    <form action="" method="post" onsubmit="return Checkf()" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">User Name</label>
                          <input type="text" class="form-control" name="useror" id="useror"  aria-describedby="emailHelp" value="<?php echo $row['UserName'];?> ">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Date Out</label>
                          <input type="text" class="form-control" name="dateor" id="dateor" value="<?php echo $row['DateOut'];?> ">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Address</label>
                          <input type="text" class="form-control"name="addor" id="addor" value="<?php echo $row['Address'];?> " >
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                          <input type="text" class="form-control"name="phoneor" id="phoneor" value="<?php echo $row['Phone number'];?> ">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Total Price</label>
                            <input type="text" class="form-control" id="priceor" name="priceor" value="<?php echo $row['Total Price'];?> ">
                          </div>
                        <button type="submit" class="btn btn-primary" name="btnModify" id="btn"  onclick="infor2()">ADD</button>
                      </form>
                </th>
                <td></td>
              </tr>
            </tbody>
          </table>
<form action="" method="POST" enctype="multipart/form-data">
<table class="table">
        <tr>
            <th id="a1">
                ID
            </th>
            <th id="a">    
                UserName
            </th>
            <th id="a">    
                Date Out
            </th id="a">
            <th id="a">
                Address
            </th>
            <th id="a">
                Phone Number
            </th>
            <th id="a">
                Total Price
            </th>
            <th id="a">
                Edit
            </th>
        </tr>

        <?php
            if (mysqli_num_rows($result2) > 0)
                while($row = mysqli_fetch_assoc($result2))
                {
        ?>

        <tr id="list">
            <th>
                <?php echo $row['ID']; ?>
            </th>
            <th>    
                <?php echo $row['UserName']; ?>
            </th>
            <th>    
                <?php echo $row['DateOut']; ?> 
            </th>
            <th>
                <?php echo $row['Address']; ?>
            </th>
            <th>
                <?php echo $row['Phone number']; ?>
            </th>
            <th>    
                <?php echo $row['Total Price']; ?> 
            </th>
            <td>
               <a href="modifyorder.php?id=<?php echo $row['ID']; ?>"><button type="button" class="btn btn-link" onclick="infor()">Modify</button></a> |
               <a href="deleteproduct.php?id=<?php echo $row['ID']; ?>"><button type="button" class="btn btn-link">Delete</button></a> 
               
            </td>
        </tr>
        <?php
                }
        ?>
    </table>
</form>
</div>
<footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3 footer" id="title" style="background-color: rgb(219, 111, 72);">
       Hotline: 0916198xxx
    </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>