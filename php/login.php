<?php
  session_start();
   include '../database/connection.php';
   if (isset($_POST['save'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $insert = mysqli_query($db,"SELECT * FROM `user` WHERE username='$username' AND password='$password'");
      $Select = mysqli_fetch_assoc($insert);
      $_SESSION['username']=$Select['username'];
      header('location:../page/dashboard.php');
   }
?>