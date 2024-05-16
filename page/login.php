<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location:../page/dashboard.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>World | LogIn</title>
</head>
<body>
    <div class="form">
        <form action="../php/login.php" method="post">
            <p>LogIn</p>
            <label for="">UserName</label><br>
            <input type="text" name="username"><br>
            
            <label for="">Password</label><br>
            <input type="password" name="password"><br>

            <input type="submit" value="Go" name="save">
            <label for=""><a href="./signup.html">signup</a></label>
    </form>
    </div>
</body>
</html>