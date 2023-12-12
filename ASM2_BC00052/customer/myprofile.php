<?php
    require_once("../admin/databaseconnect.php");
?>
<?php
session_start();
if (!isset($_SESSION['example']))
    header("Location: login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
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
                <h1 class="mb-3" id="title">Welcome to BC00052 shop</h1>
              </div>
            </div>
          </div>
        </div>          
    </div>
    <div class="container">
        <div id="pro1"><h3>Profile</h3></div>
        <form action="modifypro.php" method="post">
        <table width=""  class="table" border="1" id="ho">
            <tr>
                <td id="heh">
                  <b>Username</b> 
                </td>
                <td id="heh">
                    <?php
                    echo $_SESSION['example']['Username'];
                    ?>
                </td>
            </tr>
            <tr>
                <td id="heh">
                   <b> Full Name
                </td>
                <td id="heh">
                    <?php
                   echo $_SESSION['example']['Full Name'];
                    ?>
                </td>
            </tr>
            <tr>
                <td id="heh">
                   <b> Phone 
                </td>
                <td id="heh">
                    <?php
                   echo $_SESSION['example']['Phone'];
                    ?>
                </td>
            </tr>
            <tr>
                <td id="heh">
                  <b>  Address
                </td>
                <td id="heh">
                    <?php
                  echo $_SESSION['example']['Address'];
                    ?>
                </td>
            </tr>
            <tr>
                <td id="heh">
                  <b>  Banking
                </td>
                <td id="heh">
                    <?php
                   echo $_SESSION['example']['Banking'];
                    ?>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary2" name="btnadd" id="btn2">Modify</button>
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
