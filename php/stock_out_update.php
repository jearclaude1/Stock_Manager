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

