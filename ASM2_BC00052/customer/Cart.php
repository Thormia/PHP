<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../admin/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="container1">

<?php
session_start();
require_once ("../admin/databaseconnect.php");
if(!isset($_SESSION['example'])){
    echo '<meta http-equiv="Refresh" content="0; url=Login.php">';
}
if(isset($_GET["action"])){
    switch ($_GET["action"]){
        case "delete":
            unset($_SESSION['cart']["{$_GET["id"]}"]);
            break;
         case "add":
            if(isset($_GET['id'])){
                $rs = $conn->query("SELECT * FROM `product` WHERE `Name` = '{$_GET['id']}'");            
                if($rs->num_rows == 1){
                    $p = $rs->fetch_assoc();
                    $id = $_GET['id'];
                    if(!isset($_SESSION['cart'])){
                        $_SESSION['cart'] = ["{$id}"=>["p"=>$p]];
                    }else{
                        if(isset($_SESSION['cart']["{$id}"])){
                            $_SESSION['cart']["{$id}"]["quantity"] +=  $quantity;
                        }else{
                            $cart = $_SESSION['cart'];
                            $cart["{$id}"] = ["p"=>$p, "quantity"=> $quantity];
                            $_SESSION['cart'] = $cart;
                        }
                    }
                }
                $abc = $conn->query("
                UPDATE product
                SET `Status` = 'Out of Stock'
                WHERE Name = '{$_GET['id']}'");
            }
            break;
    }
    echo '<meta http-equiv="Refresh" content="0; url=Cart.php">';
}
?>

<style>
</style>
<h3 class="prima">CART</h3>
<table border='1' class="container1" width="100%" style="border-collapse: collapse;">
    <thead>

        <tr class="cart_menu">
            <th class="image" colspan="2">Item</th>
            <th class="price">Price</th>
            <th class="total">Total</th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        <?php
            $total = 0;
            if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
                echo "<tr><td colspan=5>No product in Cart</td></tr>";
            }
            else
            foreach($_SESSION['cart'] as $id => $item){
                $p = $item["p"];
                $total+=$p["Price"];
        ?>
        <tr>
            <td class="cart_product" width="20%" style="border-right: 0; vertical-align: middle;  text-align: center;">
                    <a href=""><img width="60" src="../admin/<?php echo $p["Image"]; ?>" alt=""></a>
            </td >
            <td style="border-left: 0">
                    <a href="#"><?php echo $p["Name"]; ?></a>
            </td>
            <td class="cart_price">
                <p><?php echo number_format($p["Price"],0); ?> $</p>
            </td>
            <td class="cart_total">
                <p class="cart_total_price"><?php  echo number_format($p["Price"],0); ?></p>
            </td>
            <td class="cart_delete" style="text-align:center">
                <a class="cart_quantity_delete" href="?page=Cart&action=delete&id=<?php echo $id;?>"><button>Delete</button></a>
            </td>
        </tr>
        <?php } ?>
        <tr><td colspan="6" style="text-align:right"><h3>Total: <?php echo number_format($total,0);?> $</h3></td></tr>  
        <tr><td colspan="6" style="text-align:right"><a href="Logined.php" class="btn btn-primary">Continue to buy</a></td></tr>
    </tbody>
</table>
<section id="do_action">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-6">
                <div class="total_area">
                    <div class="shopper-info">
                        <form action="Checkout.php" method="POST">
                            <button type="submit" class="prima1" name="btnCheckout">Confirm</button>
                        </form>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
</body>
</div>
</html>