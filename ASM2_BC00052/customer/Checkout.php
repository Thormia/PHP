<?php
    session_start();
    require_once ("../admin/databaseconnect.php");
    if(isset($_SESSION['cart']) && isset($_SESSION['example']) && isset($_POST['btnCheckout']) && count($_SESSION['cart']) > 0){
        $total = 0;
        foreach($_SESSION['cart'] as $id => $cart){
            $p = $cart["p"];
            $total  +=  $p["Price"] ;
        }
        $conn->begin_transaction();
        try {
            $sql = "INSERT INTO `orders`( `Username`, `DateOut`, `Address`,`Phone number`,`Total Price`) 
                    VALUES ('{$_SESSION['example']['Username']}',Now(),'{$_SESSION['example']['Address']}','{$_SESSION['example']['Phone']}','$total')";
            if ($conn->query($sql) === TRUE) {
                $invoice_id = $conn->insert_id;
                foreach($_SESSION['cart'] as $id => $cart){
                    $p = $cart["p"];

                //    echo $p['Name'];
                //    echo $invoice_id;
                //    echo $p['Price'];

                    $sql = "INSERT INTO orderdetails (ProductName, OrderID, Price) 
                            VALUES ('{$p['Name']}', {$invoice_id}, '{$p['Price']}')";
                    $conn->query($sql);
                }
            }
            $conn->commit();
            unset($_SESSION['cart']);
            echo "<script>
                    alert('Successfully');
                   window.location.href='Product.php';
                </script>";
        }catch (mysqli_sql_exception $exception) {
            $conn->rollback();
            echo "<script>
                    alert('Error');
                    window.location.href='cart.php';
                </script>";
        }
    }else{
        echo "<script>
            alert('No product in cart');
            window.location.href='product.php';
        </script>";
    }
?>