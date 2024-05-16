<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:../page/login.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>World | Report </title>
</head>
<body>
  <div class="containter">  
  <div class="top">
            <div class="welcome_page">
                <h1>Welcome, Back ! <?=$_SESSION['username']?></h1>
                <p>This is your dashboard. You can add more content here.</p>
                <div class="link">
                    <a href="../page/logout.php">Logout</a>  
                </div> 
            </div>
  <div class="menu">
    <nav>
        <ul>
            <li> <a href="../index.html">Home</a></li>
            <li> <a href="dashboard.php">Product</a></li>
            <li> <a href="stock_in.php">Stock_In</a></li>
            <li> <a href="stock_out.php">Stock_Out</a></li>
        </ul>
    </nav>
  </div>
  </div>  
  </div>
<!-- SELECT * FROM product INNER JOIN stock_in ON product.productin_id=stock_in.stock_in_id INNER JOIN stock_out ON product.productin_id=stock_out.stock_out_id;  -->

<table>
       <tr>
          <th>Number</th>
          <th>product_name</th>
          <th>Date In</th>
          <th>Quantity_In</th>
          <th>toatal_price</th>
          <th>Date Out</th>
          <th>Quantity Out</th>
          <th>Remain Quantity</th>
       </tr>
       <?php
        include '../database/connection.php'; 
        $add = 1;
        $select = mysqli_query($db,"SELECT * FROM product INNER JOIN stock_in ON product.productin_id=stock_in.stock_in_id INNER JOIN stock_out ON product.productin_id=stock_out.stock_out_id;");
        while($Fetch = mysqli_fetch_assoc($select)){
        $Remain = $Fetch['quantity_in']-$Fetch['quantity'];
        ?>
       <tr>
          <td><?php echo $Number=$add++?></td>
          <td><?=$Fetch['product_name']?></td>
          <td><?=$Fetch['date_in']?></td>
          <td><?=$Fetch['quantity_in'].'Kg'?></td>
          <td><?=$Fetch['toatal_price']?></td>
          <td><?=$Fetch['date']?></td>
          <td><?=$Fetch['quantity'].'Kg'?></td>
          <td><?=$Remain.'Kg';?></td>
      <?php } ?>
       </tr>
   </table>
</body>
</html>