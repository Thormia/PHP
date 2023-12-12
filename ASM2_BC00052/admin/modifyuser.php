<?php
session_start();
if (!isset($_SESSION['example1']))
    header("Location: login.php");
if (isset($_GET['id']))
{   
    require_once "databaseconnect.php";
    $id = $_GET['id'];
    $sqltotal = "select * FROM user where Authority <> 'Admin'";
    $sql = "select * FROM user WHERE Username = '$id' AND Authority <> 'Admin'";
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
    $pass = $_POST['dateor'];
    $phone = $_POST['addor'];
    $add = $_POST['phoneor'];
    $bank = $_POST['detailor'];
    $sqlupdatef = "
    UPDATE user
    SET Username = '$name',`Password`= '$pass', `Phone` = '$phone',`Address` = '$add', `Banking` = '$bank'
    WHERE Username = '$id'
            ";
        if (mysqli_query($conn,$sqlupdatef))
        {
            header("Location: users.php");
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
                <th scope="col" colspan="3" id="or">USER MANAGEMENT</th>
              </tr>
            </thead>
            <tbody>    
              <tr>
                <th></th>
                <th scope="row">
                    <form action="" method="post" onsubmit="return Checkf()" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Username</label>
                          <input type="text" class="form-control" name="useror" id="useror"  aria-describedby="emailHelp" value="<?php echo $row['Username'];?>">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Full Name</label>
                          <input type="text" class="form-control" name="name" id="dateor" value="<?php echo $row['Full Name'];?>">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Phone</label>
                          <input type="text" class="form-control" name="addor" id="addor" value="<?php echo $row['Phone'];?>">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Address</label>
                          <input type="text" class="form-control" name="phoneor" id="phoneor" value="<?php echo $row['Address'];?>">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Banking</label>
                          <input type="text" class="form-control"name="detailor" id="detailor" value="<?php echo $row['Banking'];?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnModify" id="btn" onclick="infor2()">ADD</button>
                      </form>
                </th>
                <td></td>
              </tr>
            </tbody>
          </table>
<form action="" method="POST" enctype="multipart/form-data">
<table class="table">
<tr>
            <th id="a">    
                User
            </th>
            <th id="a">
                Full Name
            </th>
            <th id="a">
                Phone Number
            </th>
            <th id="a">
                Address
            </th>
            <th id="a">
                Banking
            </th>
            <th id="a">
                Edit
            </th>
        </tr>


       <?php
            if (mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result))
                {
                  if($row['Authority'] != "Admin"){
        ?>

        <tr id="list">
            <th>    
                <?php echo $row['Username']; ?>
            </th>
            <th>
                <?php echo $row['Full Name']; ?>
            </th>
            <th>
                <?php echo $row['Phone']; ?>
            </th>
            
            <th>
                <?php echo $row['Address']; ?>
            </th>
            <th>    
                <?php echo $row['Banking']; ?>
            </th>
            <td>
            <a href="modifyuser.php?id=<?php echo $row['Username']; ?>"><button type="button" name="btn123" class="btn btn-link" onclick="infor()">Modify</button></a>
            </td>
        </tr>
        <?php
                }}
        ?>
    </table>
</form>
</div>
<?php
    if(isset($_POST['btn123']))
    {
        require_once("../admin/databaseconnect.php");
        $user123 = $_SESSION['example1']['Username'];
        $old = $_POST['dateor'];
        $new = $_POST['New'];
        $banking = $_POST['detailor'];
        $name = $_POST['name'];
        $phone = $_POST['addor'];
        $address = $_POST['phoneor'];
        $sqlupdatef = "
        UPDATE user
        SET Password =md5('$new'), `Full Name` ='$name',
        Banking ='$banking', `Phone`='$phone'
        , Address ='$address'
        WHERE Username = '$user123'
            ";
        if ($passw == $old)
        {
            mysqli_query($conn,$sqlupdatef);
            header("Location: login.php");
        }
        
    }
?>
<footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3 footer" id="title" style="background-color: rgb(219, 111, 72);">
       Hotline: 0916198xxx
    </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>