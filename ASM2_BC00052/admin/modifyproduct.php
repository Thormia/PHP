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
    $sql = "select * FROM PRODUCT WHERE Name = '$id'";
    mysqli_query($conn,$sql);
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
        $product_name = $_POST['namepr'];
        $product_price = $_POST['pricepr'];
        $id = $_GET['id'];
        $des = $_POST['des'];
        $sqlupdatef = "
        UPDATE product
        SET Name = '$product_name', Price ='$product_price', Description='$des'
        WHERE Name = '$id'
            ";
        mysqli_query($conn,$sqlupdatef);

        $sql_image = "SELECT * FROM product WHERE Name = '$id'";
        //delete old
        if(mysqli_num_rows(mysqli_query($conn,$sql_image)) > 0)
        {
            $old_image_path = $row['image'];
            unlink($old_image_path);
        }
        //update new
        $product_image = "image/" . time() . " " . basename($_FILES['picturenew']['name']);    
        move_uploaded_file($_FILES['picturenew']['tmp_name'],$product_image);
        $sqlupdate = "
        UPDATE product
        SET Name = '$product_name', Price =  '$product_price', Description='$des',Image = '$product_image'
        WHERE Name = '$id'
            ";
        if (mysqli_query($conn,$sqlupdate))
        {
            header("Location: product.php");
        }
        else echo "not success";
    }
    
?>

<?php
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
    $sql = "select * from product order by `Status` ASC limit " .$pagenum. " offset ". "$pageset";
    $sql2 = "select * from product";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_num_rows(mysqli_query($conn,$sql2));
    echo $result2;
    $page = ceil($result2/$pagenum);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASM 2 - BC00052</title>
    <script src="login.js"></script>
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
                    <form action="" method="post" onsubmit="return Checkf()" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          <input type="text" class="form-control" name="namepr" id="namepr"  aria-describedby="emailHelp" value="<?php echo $row['Name'];?>">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Price</label>
                          <input type="text" class="form-control" name="pricepr" id="pricepr" value="<?php echo $row['Price'];?>">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Description</label>
                          <input type="text" class="form-control" name="des" id="pricepr" value="<?php echo $row['Description'];?>">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Image</label>
                          <input type="file"  class="form-control" name="picturenew" id="picturenew" accept="image/*" value="<?php echo $row['Image'];?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnModify" id="btn"  onclick="infor2()">ADD</button>
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
                Description
            </th id="a">
            <th id="a">
                Status
            </th>
            <th id="a">
                Edit
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
                <?php echo $row['Description']; ?>
            </th>
            <th>    
                <?php echo $row['Status']; ?> 
            </th>
            <td>
               <a href="modifyproduct.php?id=<?php echo $row['Name']; ?>">Modify</a> |
               <a href="deleteproduct.php?id=<?php echo $row['Name']; ?>">Delete</a> 
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
</html>