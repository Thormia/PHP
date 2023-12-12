<?php
echo "connected <br>";
if (isset($_POST['btnadd']))
{
    $name = $_POST['namepr'];
    $price = $_POST['pricepr'];
    $stt = "Available";
    //get image
    $imagename = $_FILES['picture']['name'];
    $des = $_POST['des'];
    $target_dir = "image/";
    $target_file = $target_dir . time() . " " . basename($imagename);
    if($_FILES['picture']['error'] != 0)
        {
            echo "ERROR !!!!!!!!!";
            die;
        }
    else if ($_FILES['picture']['size'] > 5242800) //5MB
        {
            echo "TOO LARGE!";
            die;
        }
    else if (file_exists($target_file))
        {
            echo "existed";
            die;
        }
    else
        {
            move_uploaded_file($_FILES['picture']['tmp_name'],$target_file);
        }
    require_once "databaseconnect.php";
    $sql = "INSERT INTO product(Name,Price,Image,Description,Status) VALUES ('$name','$price','$target_file','$des','$stt')";
   //$result = mysqli_query($conn,$sql);
    if ($conn -> query($sql))
        //echo "insert successful!";
    header("Location: product.php");
    else  
        echo "insert fail!";
}
else
    echo "Access denied";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<?php
    require_once "databaseconnect.php";
    if (!isset ($_GET['page']) ) {
      $crp = 1;
      } else {
      $crp = $_GET['page'];
      }
      if (!isset ($_GET['pagenum']) ) {
        $pagenum = 4;       
        } else {     
        $pagenum = $_GET['pagenum'];  
        }
    $pageset = ($crp - 1) * $pagenum;
    $sql = "select * from product order by `Name` ASC limit " .$pagenum. " offset ". "$pageset";
    $sql2 = "select * from product";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_num_rows(mysqli_query($conn,$sql2));
    echo $result2;
    $page = ceil($result2/$pagenum);
?>

<?php
session_start();
if (!isset($_SESSION['example']))
    header("Location: login.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASM 2 - BC00052</title>
    <script src="js/order.js"></script>
    <link rel="stylesheet" href="css/style.css">
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
    <div class="menu">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="users.php">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="order.php">Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orderdetail.php">Order-Detail</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sp.php">Support-Requirement</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div>
        <table class="table">
            <thead>
              <tr>
                <td colspan="1"></td>
                <th scope="col" colspan="3" id="or">PRODUCT MANAGEMENT</th>
              </tr>
            </thead>
            <tbody>    
              <tr>
                <th></th>
                <th scope="row">
                    <form action="addorder.php" method="post" onsubmit="return Checkf()" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          <input type="text" class="form-control" name="namepr" id="namepr"  aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Price</label>
                          <input type="text" class="form-control" name="pricepr" id="pricepr">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Image</label>
                          <input type="file"  class="form-control" name="picture" id="picture" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnadd" id="btn">ADD</button>
                      </form>
                </th>
                <td></td>
              </tr>
            </tbody>
          </table>
    </div>
    <table class="table">
        <tr>
            <th id="a1">
                Name
            </th>
            <th id="a">    
                Price
            </th>
            <th id="a">    
                Image
            </th id="a">
            <th id="a">
                Status
            </th>
        </tr>

        <?php
            if (mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result))
                {
        ?>

        <tr id="list">
            <th>
                <?php echo $row['Name']; ?>
            </th>
            <th>    
                <?php echo $row['Price']; ?>
            </th>
            <th>    
            <img src=" <?php echo $row['Image']; ?>" height="90px" >
            </th>
            <th>    
                <?php echo $row['Status']; ?> 
            </th>
            <td>
               <a href="modifyorder.php?id=<?php echo $row['Name']; ?>">Modify</a> |
               <a href="deleteorder.php?id=<?php echo $row['Name']; ?>">Delete</a> 
            </td>
        </tr>
        <?php
                }
        ?>
    </table>
    <?php
    if ($crp > 1) {
    $pre = $crp - 1;
    ?>
    <a class="page-item" href="?pagenum=4&page=<?php echo $pre ?>"> Previous </a>
    <?php
    }
    ?>
    <?php
    $hehe = $crp;
    for ($crp=1;$crp<=$page;$crp++) {
    ?>
          <a class="page-item" href="?pagenum=4&page=<?php echo $crp ?>">
          <?php echo $crp ?> </a>
    <?php
    }
    ?>
    <?php
    if ($hehe < $page) {
    $next = $hehe + 1;
    ?>
    <a class="page-item" href="?pagenum=4&page=<?php echo $next ?>"> Next </a>
    <?php
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
</html>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>