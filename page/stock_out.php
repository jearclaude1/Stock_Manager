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
    <title>World | Stock_Out </title>
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
            <li> <a href="report.php">Report</a></li>
        </ul>
        
    </nav>
  </div>
  </div>  
  </div>
  <div class="body_content">
   <form action="../php/stock_out.php" method="post">
        <h1>Stock_Out</h1>
         <select name="product" id="input">
              <?php   
              include '../database/connection.php';
              $select = mysqli_query($db,"SELECT * FROM `product`");
              while($Fetch = mysqli_fetch_assoc($select)){
              ?>
                <option value="">Select Product</option>
                <option value="<?=$Fetch['productin_id']?>"><?=$Fetch['product_name']?></option>
         <?php } ?>
        </select>
         

        <input type="date" name="date" id="input">
        <input type="text" name="quantity" placeholder="quantity" id="input">
        <input type="submit" value="Save" name="yes">


        <!-- php insert-->
        
        <!-- end -->
   </div>
</form>
   <table>
       <tr>
          <th>Number</th>
          <th>Product_id</th>
          <th>Quantity</th>
          <th>Data</th>
          <th colspan="2">Action</th>
       </tr>
       <?php 
        $add = 1;
       $select = mysqli_query($db,"SELECT * FROM `stock_out`");
       while($Fetch = mysqli_fetch_assoc($select)){
        
        ?>
       <tr>
          <td><?php echo $Number=$add++?></td>
          
          <td><?=$Fetch['product_id']?></td>
          <td><?=$Fetch['quantity']?></td>
          <td><?=$Fetch['date']?></td>
          <td>
            <a href="../delete/stock_out.php?id=<?=$Fetch['stock_out_id']?>">Delete</a>
            <a href="../php/stock_out_update.php?id=<?=$Fetch['stock_out_id']?>">Update</a>
          </td>
      <?php } ?>
       </tr>
   </table>
</body>
</html>