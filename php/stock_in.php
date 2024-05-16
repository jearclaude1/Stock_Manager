<?php
include '../database/connection.php';

if (isset($_POST['yes'])) {
    $product = $_POST['product'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total= $quantity * $price;
    $stmt = mysqli_query($db,"INSERT INTO `stock_in`(`product_id`, `date_in`, `quantity_in`, `unit_price`, `toatal_price`)VALUES ('$product','$date','$quantity','$price','$total')");
    header('location:../page/stock_in.php');

}
?>
