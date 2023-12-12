<?php


if (isset($_POST['btn']))
{   
    $t=    time();
    require_once "../admin/databaseconnect.php";
    $email = $_POST['email'];
    $des = $_POST['des'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO supportrequirement(Time,PhoneNumber,Email, Description,Status) VALUES (Now(),'$phone','$email','$des','no')";
    //$result = mysqli_query($conn,$sql);
     if ($conn -> query($sql))
         //echo "insert successful!";
     header("Location: contact.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../admin/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
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
                    <a class="nav-link active" aria-current="page" href="homepage.php" id="title3">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="title3" href="intro.html">Introduction</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="title3" href="#">Contact</a>
                  </li>
                </ul>
                <div id="login">
                      <a href="myprofile.php"><button type="button" class="btn btn-outline-success">My Profile</button></a>
                    </div>
                    <div id="login">
                      <a href="logout.php"><button type="button" class="btn btn-outline-success">Logout</button></a>
                    </div>
                </div> 
              </div>
            </div>
        </nav>
        <div class="container">
            <table class="table" id="tab">
                <thead>
                  <tr>
                    <td colspan="1"></td>
                    <th scope="col" colspan="1" id="sip">Need support?</th>
                  </tr>
                </thead>
                <tbody>    
                  <tr>
                    <th></th>
                    <th scope="row">
                        <form action="" method="post">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Phone number</label>
                              <input type="phone" class="form-control" name="phone" id="exampleInputPassword1">
                              <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Description</label>
                              <input type="text" class="form-control" name="des" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                              <div id="emailHelp" class="form-text">We'll never share your information with anyone else.</div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="btn">HELP ME</button>
                          </form>
                    </th>
                    <td></td>
                  </tr>
                </tbody>
              </table>
    <b><h4>You also can find us at:</h1></b>
    <h6 id="findd">Facebook: <a href="">https://www.facebook.com/profile.php?id=100070346992357</a></h3>
    <h6 id="findd">Zalo: <a href="">0916198548</a></h3>
    <h6 id="findd">Email: <a href="">phuonghtnbc00052@fpt.edu.vn</a></h3>
    <h6 id="findd">Address: <a href="">41 Cach Mang Thang Tam, Ninh Kieu, Can tho</a></h3>
</div>
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 footer" id="title" style="background-color: rgb(219, 111, 72);">
           Hotline: 0916198xxx
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>