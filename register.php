<?php
session_start();
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="style_register.css">
</head>

<body>
    <form action="register_db.php" method="post">
        <h2>Create Users</h2>
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="section_area_grid">
            <div class="name">
                <label for="firstname">Firstname</label><br>
                <input type="text" name="firstname" placeholder="firstname">
            </div class="name">
            <div>
                <label for="lastname">Lastname</label><br>
                <input type="text" name="lastname" placeholder="lastname">
            </div>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="email">
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="username">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1" placeholder="password">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2" placeholder="confirm Password">
        </div>
        <p><a href="login.php" style="color: white; text-decoration: none; font-size: 24px">Sign in</a></p>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Sign Up</button>
        </div>
    </form>

</html>