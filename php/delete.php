<?php
include '../database/connection.php';
$id=$_GET['id'];
$delete = mysqli_query($db,"DELETE FROM `product` WHERE productin_id='$id';");
header('location:../page/dashboard.php');
?>
