<?php
   include '../database/connection.php';
   if (isset($_POST['yes'])) {
      $product = $_POST['product'];
      $date = $_POST['date'];
      $quantity = $_POST['quantity'];
      print_r($_POST);
      $insert = mysqli_query($db,"INSERT INTO `stock_out`(`product_id`, `date`, `quantity`, `stock_out_id`) 
      VALUES ('$product','$date','$quantity','')");
      header('location:../page/stock_out.php');
   }
?>