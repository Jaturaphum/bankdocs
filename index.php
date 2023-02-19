<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="style_index.css">
</head>

<body>
    <div>
        <form method="post">
            <div class="section_area_grid">
                <h2>Home</h2>
                <div class="dropdown" style="float: right;">
                    <p id="dropbtn">username: <strong style="margin-right: 5px;"><?php echo $_SESSION['username']; ?></strong>
                    <p id="dropbtn">wallet: <strong style="margin-right: 5px;">
                            <?php
                            $errors = array();
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql = "SELECT * FROM users ";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($_SESSION['username'] == $row["username"]) {
                                        echo  $row["money"];
                                    }
                                }
                            }
                            mysqli_close($conn);
                            ?>
                        </strong> baht</p>
                    </p>
                    <div class="dropdown-content">
                    </div>
                </div>
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="index.php">Home</a>
                    <li><a href="deposit.php">deposit</a>
                    <li><a href="withdraw.php">withdraw</a>
                    <li><a href="list.php">list</a>
                    <li><a href="index.php?logout='1'" style="color: red; text-decoration:none;">Logout</a>
                </ul>
            </nav>
            <div class="img">
                <center>
                    <img src="img/money.jpg">
                </center>
            </div>
            <footer>
                <p class="main">
                    2023 © jaturaphum.s@ku.th | jaturaphum Suaprakhon | develop by <a href="https://github.com/Jaturaphum" target="_blank">Jaturaphum</a>
                </p>
            </footer>
        </form>
    </div>
</body>
<script src="js/index.js"></script>

</html>