<?php
session_start();
include('server.php');

if (isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <img src="img/KU_SubLogo_Thai.png">
        <form action="login_db.php" method="post">
            <div id="font">
                <h2>Login</h2>
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
                <div class="form-control">
                    <input type="text" name="username" required="">
                    <label>
                        <span style="transition-delay:0ms">U</U></span>
                        <span style="transition-delay:50ms">s</U></span>
                        <span style="transition-delay:100ms">e</U></span>
                        <span style="transition-delay:150ms">r</U></span>
                        <span style="transition-delay:200ms">n</U></span>
                        <span style="transition-delay:250ms">a</U></span>
                        <span style="transition-delay:300ms">m</U></span>
                        <span style="transition-delay:350ms">e</U></span>
                    </label>
                    <div class="form-control">
                        <input type="password" name="password" required="">
                        <label>
                            <span style="transition-delay:0ms">P</U></span>
                            <span style="transition-delay:50ms">a</U></span>
                            <span style="transition-delay:100ms">s</U></span>
                            <span style="transition-delay:150ms">s</U></span>
                            <span style="transition-delay:200ms">w</U></span>
                            <span style="transition-delay:250ms">o</U></span>
                            <span style="transition-delay:300ms">r</U></span>
                            <span style="transition-delay:350ms">l</U></span>
                            <span style="transition-delay:400ms">d</U></span>
                        </label>
                    </div>
                </div>
                <p><a href="register.php" style="color: white; text-decoration: none; font-size: 20px;">Sign Up</a></p>
                <div class="input-group">
                    <button type="submit" name="login_user" class="btn">Login</button>
                </div>
        </form>
    </div>
</body>

</html>