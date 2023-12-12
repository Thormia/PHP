<?php
session_start();
if (!isset($_SESSION['example1']))
    header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title> Administrator </title>
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
                        <h1 class="mb-3" id="title">Admin Of BC00052 shop</h1>
                      </div>
                    </div>
                  </div>
                </div>          
            </div>
    </div>
    <div class="container">
        <h3 id="til">Which table do you want to access?</h1>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
  <a href="index.php?page=order"><button class="btn btn-primary" type="button" id="btn">ORDER</button></a>
  <a href="index.php?page=detail"><button class="btn btn-primary" type="button" id="btn">DETAIL ORDER</button></a>
  <a href="index.php?page=product"><button class="btn btn-primary" type="button" id="btn">PRODUCT</button></a>
  <a href="index.php?page=user"><button class="btn btn-primary" type="button" id="btn">USER</button></a>
  <a href="index.php?page=sp"> <button class="btn btn-primary" type="button" id="btn">SUPPORT REQUIRE</button></a>
    </div>
    <div id="main">
        <?php
            if(isset($_GET['page'])){
                if($_GET['page'] === "order")
                    header("Location:order.php ");
              else if($_GET['page'] === "detail")
                    header("Location:orderdetail.php");
              else if($_GET['page'] === "product")
                   header("Location:product.php");
              else if($_GET['page'] === "user")
                    header("Location:users.php");
              else if($_GET['page'] === "Modifydetail")
                    require_once ("modifydetail.php");
              else if($_GET['page'] === "Modify")
                    require_once ("modifyorder.php");
              else if($_GET['page'] === "sp")
                    require_once ("sp.php");
            }
        ?>
    </div>
    <footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3 footer" id="title" style="background-color: rgb(219, 111, 72);">
       Hotline: 0916198xxx
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
