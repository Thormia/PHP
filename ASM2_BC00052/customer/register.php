<?php
    require_once "../admin/databaseconnect.php";
    if (isset($_POST['btnreg']))
    {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $banking = $_POST['banking'];
    $phone = $_POST['phone'];
    $fullname = $_POST['fullname'];
    $sql = "INSERT INTO user(Username,Password,Phone,Address,Banking,'Full Name') VALUES ('$user',md5('$pass'),'$phone','$address','$banking','$fullname')";
    $result = mysqli_query($conn,$sql);
    header("Location:login.php");
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
    <script src="regis.js"></script>
    <title>Login</title>
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
        <form action="adduser.php" method="post" id="title" onsubmit="return checkUserRegistration()">
      <table id="stitle">
        <tr id="margin">
          <th colspan="2">Sign Up</th>
        </tr>
        <tr id="margin">
          <td>User:</td>
          <td ><input type="text" style="margin:2%" id="user" name="useror"></td>
        </tr>
        <tr id="margin">
          <td>
            Password:
          </td>
          <td >
            <input type="password" style="margin:2%" id="password"name="dateor">
          </td>
        </tr>
        </tr>
        <tr id="margin">
          <td>
            Full Name:
          </td>
          <td >
            <input type="text" style="margin:2%" id="fullname" name="fullname">
          </td>
        </tr>
        <tr id="margin">
          <td>
            Phone:
          </td>
          <td >
            <input type="text" style="margin:2%" id="phone"name="addor">
          </td>
        </tr>
        <tr id="margin">
          <td>
            Address:
          </td>
          <td >
            <input type="text" style="margin:2%" id="address" name="phoneor">
          </td>
        </tr>
        <tr id="margin">
          <td>
            Banking:
          </td>
          <td >
            <input type="text" style="margin:2%"id="bank" name="detailor">
          </td>
        </tr>
        <tr id="margin">
          <td colspan="2">
          <input type="submit" value="Register" id="registration" name="btnadd" style="margin:2%" >
        </td>  
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