<?php
   include '../database/connection.php';
   if (isset($_POST['save'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $insert = mysqli_query($db,"INSERT INTO `user`(`user_id`, `username`, `password`) 
      VALUES ('','$username','$password')");
      header('location:../page/dashboard.php');
   }
?>