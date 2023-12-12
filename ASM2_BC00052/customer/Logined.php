

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BC00052 Shop</title>
    <link rel="stylesheet" href="../admin/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/data.js"></script>
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
        <div class="menu">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#" id="title3">Shoes Shop of BC00052</a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html" id="title3">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="title3" href="intro.html">Introduction</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="title3" href="contact.php">Contact</a>
                      </li>
                    </ul>
                    <div id="login">
                      <a href="myprofile.php"><button type="button" class="btn btn-outline-success">My Profile</button></a>
                    </div>
                    <div id="login">
                      <a href="logout.php"><button type="button" class="btn btn-outline-success">Login || Logout</button></a>
                    </div>
                  </div>
                </div>
            </nav>
        
        <h3 id="pro">PRODUCT</h1>
        <table width="100%" border="1" class="table">
        <?php
            require_once ("../admin/databaseconnect.php");
            $sql = "SELECT * FROM product where Status <> 'Out of Stock'";
            $result = $conn -> query($sql);
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
                if($i % 3 == 0)
                    echo "<tr>";
                        echo "<td width='33%'><a href='detail.php?id={$row['Name']}'>
                                <center>
                                    <b>{$row['Name']}</b><br/>
                                    <img src=\"../admin/{$row['Image']}\" height='100px'><br/>
                                    {$row['Price']} $
                                </center></a>
                                <center><a href='Cart.php?action=add&id={$row['Name']}'><button>Add to cart</button></a></center>
                            </td>";
                if($i % 3 == 2)
                    echo "</tr>";
                $i++;
            }
            if($i % 3 != 0)
                    echo "</tr>";
        ?>
    </table>
    </div>
</div>
</div>
<div>
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 footer" id="title" style="background-color: rgb(219, 111, 72);">
           Hotline: 0916198xxx
        </div>
    </footer>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<script src="js/giohang.js"></script>
</html>