<?php
session_start();
if (!isset($_SESSION['example1']))
    header("Location: login.php");
?>
<?php
    require_once "databaseconnect.php";
    $sql = "select * from orderdetails";
    $result = $conn -> query($sql); //$result = mysqli_query($conn,$sql)
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
                  <span id="login1">
                      <a href="logout.php"><button type="button" class="btn btn-outline-success">Logout</button></a>
      </span>
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
                <a class="nav-link" href="product.php">Product</a>
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
                <th scope="col" colspan="3" id="or">ORDER DETAIL MANAGEMENT</th>
              </tr>
            </thead>
          </table>
    </div>
    <table class="table">
        <tr>
            <th id="a">
                ID
            </th>
            <th id="a">    
                Product Name
            </th>
            <th id="a">    
                Order ID
            </th>
            <th id="a">    
                Price
            </th id="a">
        </tr>

        <?php
            if (mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result))
                {
        ?>

        <tr id="list">
            <th>
                <?php echo $row['ID']; ?>
            </th>
            <th>    
                <?php echo $row['ProductName']; ?>
            </th>
            <th>    
                <?php echo $row['OrderID']; ?>
            </th>
            <th>    
                <?php echo $row['Price']; ?> 
            </th>
        </tr>
        <?php
                }
        ?>
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