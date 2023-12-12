<?php
    $id = $_GET['id'];
    require_once("../admin/databaseconnect.php");
    $sql = "select * from product where Name ='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
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
        <div id="pro1"><h3>Detail</h3></div>
        <table width="100%"  class="table" border="1">
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <?php
                    echo $row['Name'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Price
                </td>
                <td>
                    <?php
                    echo $row['Price'] . " VND";
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td>
                <td>
                <img src="<?php echo '../admin/' . $row['Image']?>" height='100px'><br/>
                </td>
            </tr>
            <tr>
                <td>
                    Description 
                </td>
                <td>
                    <?php
                    echo " " .$row['Description'];
                    ?>
                </td>
            </tr>
        </table>
        </div>
        <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 footer" id="title" style="background-color: rgb(219, 111, 72);">
           Hotline: 0916198xxx
        </div>
    </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
