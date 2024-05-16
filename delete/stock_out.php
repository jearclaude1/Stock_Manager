<?php
include '../database/connection.php';
$id=$_GET['id'];
$delete = mysqli_query($db,"DELETE FROM `stock_out` WHERE stock_out_id='$id';");
header('location:../page/stock_out.php');
?>