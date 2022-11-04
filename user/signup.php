<?php
    include '../db.php';

    if(isset($_POST['submit'])){
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $user_telp = mysqli_real_escape_string($conn, $_POST['user_telp']);
        $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);

        $insert = mysqli_query($conn, "INSERT INTO tb_user VALUES (
            null,
            '".$user_name."',
            '".$username."',
            '".md5($password)."',
            '".$user_telp."',
            '".$user_email."',
            '".$user_address."'
                )");
            header('location:login_user.php');
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="box-register">
        <form action="" method="post" class="r">
            <h3>USER REGISTER</h3>
            <input type="text" name="user_name" require placeholder="enter your name">
            <input type="text" name="username" require placeholder="enter your username">
            <input type="password" name="password" require placeholder="enter your password">
            <input type="tel" name="user_telp" require placeholder="enter your phone number">
            <input type="email" name="user_email" require placeholder="enter your email">
            <input type="text" name="user_address" require placeholder="enter your address">
            <input style="background:#b89068" type="submit" name="submit" value="Register Now" class="btn">
            <p>already have an account? <a href="login_user.php">Login</a></p>
        </form>
    </div>
</body>
</html>