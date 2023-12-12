<?php
session_start();
if(isset($_POST['btn']))
{
    $user = $_POST['User'];
    $pass = $_POST['Pass'];
    require_once "../admin/databaseconnect.php";
    $sql = "SELECT * FROM user where Username='$user' and Password=md5('$pass') and Authority='Admin'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
      $row= mysqli_fetch_assoc($result);
      $_SESSION['example1']=$row;
      header("Location: index.php");
    } else
    {
      ?>
       <script language="javascript">
              alert("Wrong password or user!");
          </script>
      <?php
      }
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
                    <h1 class="mb-3" id="title">Welcome ADMIN to BC00052 shop</h1>
                  </div>
                </div>
              </div>
            </div>          
        </div>
    <form action="" method="POST" onsubmit="return Checkf()" id="title">
        <table id="stitle">
            <tr>
                <th colspan="2" id="title"> LOGIN </th>
            </tr>
            <tr>
                <td>UserName: </td>
                <td><input type="text" id="User" name="User"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="Pass" name="Pass"></td>
            </tr>
            <tr>
                <td colspan="1"><input type="submit" value="Login" id="btn" name="btn"></td>
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