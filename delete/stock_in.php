<?php
include '../database/connection.php';
$id=$_GET['id'];
$delete = mysqli_query($db,"DELETE FROM `stock_in` WHERE stock_in_id='$id';");
header('location:../page/stock_in.php');
?>
