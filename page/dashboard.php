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
    <title>World | Dash </title>
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
            <li> <a href="#">Product</a></li>
            <li> <a href="stock_in.php">Stock_In</a></li>
            <li> <a href="stock_out.php">Stock_Out</a></li>
            <li> <a href="report.php">Report</a></li>
        </ul>
    </nav>
  </div>
  </div>  
  </div>
  <div class="body_content">
   <form action="" method="post">
        <h1>Product</h1>
        <input type="text" name="product_name" id="input" placeholder="product_name">
        <input type="submit" value="Save" name="yes">
    </form>
    <?php 
    include '../database/connection.php';
    if (isset($_POST['yes'])) {
       $product_name = $_POST['product_name'];
       $insert = mysqli_query($db,"INSERT INTO `product`(`productin_id`, `product_name`) 
       VALUES ('','$product_name')");
       header('location:dashboard.php');
    }
 ?>
   </div>

   <table>
       <tr>
          <th>Number</th>
          <th>Product</th>
          <th colspan="2">Action</th>
       </tr>
       <?php 
       $add = 1;
       $select = mysqli_query($db,"SELECT * FROM `product`");
       while($Fetch = mysqli_fetch_assoc($select)){
        
        ?>
       <tr>
          <td><?php echo $Number=$add++?></td>
          <td><?=$Fetch['product_name']?></td>
          <td>
            <a href="../php/delete.php?id=<?=$Fetch['productin_id']?>">Delete</a>
            <a href="../php/update.php?id=<?=$Fetch['productin_id']?>">Update</a>
          </td>
      <?php } ?>
       </tr>
   </table>
</body>
</html>