<?php
session_start();
?>

<?php
    if(isset($_POST['btn123']))
    {
        require_once("../admin/databaseconnect.php");
        $user123 = $_SESSION['example']['Username'];
        $old = $_POST['Old'];
        $new = $_POST['New'];
        $banking = $_POST['bank'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];   
        $passw = $_SESSION['example']['Password'];
        $sqlupdatef = "
        UPDATE user
        SET Password = md5('$new'), `Full Name` ='$name',
        Banking ='$banking', `Phone`='$phone'
        , Address ='$address'
        WHERE Username = '$user123' and '$passw' = md5('$old')
            ";
            if(mysqli_query($conn,$sqlupdatef))
            header("Location: login.php");
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="login.js"></script>
    <title>Modify</title>
</head>
<body>
<div class="header" >
            <div
              class="p-6 text-center titlename"
              style="
                background-color: rgb(219, 111, 72);
              "
            >
              <div class="mask" >
                <div class="d-flex justify-content-center align-items-center h-100">
                  <div class="title">
                    <h1 class="mb-3" id="title">Welcome to BC00052 shop</h1>
                  </div>
                </div>
              </div>
            </div>          
        </div>
    <form action="" method="post">
        <table id="stitle">
            <tr>
                <th colspan="2" id="title"> Modify </th>
            </tr>
            <tr>
                <td>UserName: </td>
                <td><input type="text" disabled id="User" name="User123"  value=" <?php echo $_SESSION['example']['Username'];?>"></td>
            </tr>
            <tr>
                <td>Full Name: </td>
                <td><input type="text" id="" name="name" value=" <?php echo $_SESSION['example']['Full Name'];?>"></td>
            </tr>
            <tr>
                <td>Old Password:</td>
                <td><input type="password" id="" name="Old"></td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="password" id="" name="New"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="password" id="" name="address"value=" <?php echo $_SESSION['example']['Address'];?>"></td>
            </tr>
            <tr>
                <td>Banking:</td>
                <td><input type="password" id="" name="bank"value=" <?php echo $_SESSION['example']['Banking'];?>"></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="password" id="" name="phone"value=" <?php echo $_SESSION['example']['Phone'];?>"></td>
            </tr>
            <tr >
                <td colspan="2" ><input type="submit" value="Save" id="" name="btn123"></td>
            </tr>
        </table>
    </form>
    <footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3 footer" id="title" style="background-color: rgb(219, 111, 72);">
       Hotline: 0916198xxx
    </div>
  </footer>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>  
</body>

</html>