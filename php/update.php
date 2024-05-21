<?php include '../database/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <h1>Product</h1>
        <?php 
        $id=$_GET['id'];
       $select = mysqli_query($db,"SELECT * FROM `product` WHERE productin_id='$id'");
       while($Fetch = mysqli_fetch_assoc($select)){
        
        ?>
       <tr>
       <input type="text" name="product_name" value="<?=$Fetch['product_name']?>"/>
       <input type="submit" value="Save" name="yes"/>
      <?php } ?>
    </form>

    <?php 
    include '../database/connection.php';
    $id=$_GET['id'];
    if (isset($_POST['yes'])) {
       $product_name = $_POST['product_name'];
       $insert = mysqli_query($db,"UPDATE `product` SET`product_name`='$product_name' 
       WHERE `productin_id`='$id' ");
       header('location:../page/dashboard.php');
    }
 ?>
 <!-- end of update of product -->
<form action="" method="post">
        <h1>Update Stock_In</h1>
        <?php 
        $id=$_GET['id'];
        $select = mysqli_query($db,"SELECT * FROM `stock_in` WHERE stock_in_id='$id'");
        while($Fetch = mysqli_fetch_assoc($select)){
        
        ?>
       <tr>
        <label for="">Date</label><br>
        <input type="date" value="<?=$Fetch['date_in']?>" name="date"><br>
        <label for="">Quantity</label><br>
        <input type="text" value="<?=$Fetch['quantity_in']?>" name="quantity" placeholder="quantity"><br>
        <label for="">Unit_price</label><br>
        <input type="text" value="<?=$Fetch['unit_price']?>" name="unit_price" placeholder="unit_price"><br>
        <input type="submit" value="Save" name="yes">

      <?php } ?>
    </form>

    <?php
include '../database/connection.php';

if (isset($_POST['yes'])) {
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $price = $_POST['unit_price'];
    $total= $quantity * $price;
    $stmt = mysqli_query($db,"UPDATE `stock_in` SET `date`='$date',`quantity_in`='$quantity',`unit_price`='$price',`toatal_price`='$total' WHERE `stock_in_id`='$id'");
    header('location:../page/stock_in.php');

}
?>
<!-- end of stock in -->


<form action="" method="post">
        <h1>Update Stock_Out</h1>
        <?php 
        $id=$_GET['id'];
        $select = mysqli_query($db,"SELECT * FROM `stock_out` WHERE stock_out_id='$id'");
        while($Fetch = mysqli_fetch_assoc($select)){
        
        ?>
       <tr>
       <label for="">Date</label><br>
        <input type="date" value="<?=$Fetch['date']?>" name="date"><br>
        <label for="">Quantity</label><br>
        <input type="text" value="<?=$Fetch['quantity']?>" name="quantity" placeholder="quantity"><br>
        <input type="submit" value="Save" name="yes">

      <?php } ?>
    </form>

    <?php
include '../database/connection.php';

if (isset($_POST['yes'])) {
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $stmt = mysqli_query($db,"UPDATE `stock_out` SET `date`='$date',`quantity`='$quantity' WHERE `stock_out_id`='$id'");
    header('location:../page/stock_out.php');

}
?>
</body>
</html>

