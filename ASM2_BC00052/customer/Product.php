<html>
    
    <table width="100%" border="1">

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
</html>