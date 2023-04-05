<?php
session_start();
include('conDB/server.php');

if (!isset($_SESSION['username'])) {
    $_SESSION = "You are not logged in";
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
    <link rel="stylesheet" href="style/style_index.css">
</head>
<form method="post" action="index_db.php">
    <body>
        <div class="menu-main">
            <body onLoad="initClock()">
                <div id="timedate">
                    <a id="h">12</a>:
                    <a id="m">00</a>:
                    <a id="s">00</a><br>
                    <a id="mon">January</a>
                    <a id="d">1</a>
                    <a id="y">0</a>
                </div>
            </body>
            <ul class="ul-menu">
                <li><a href="index.php">Home</a>
                <li><a href="deposit.php">deposit</a>
                <li><a href="withdraw.php">withdraw</a>
                <li><a href="listbank.php">list</a>
            </ul>
            <nav class="nav-logout">
                <ul>
                    <li><a href="index.php?logout='1'" style="color: red; text-decoration:none;">Logout</a>
                </ul>
            </nav>
        </div>
    </body>
</form>
<nav class="nav-user">
    <div class="section_area_grid">
        <div class="dropdown" style="float: right;  margin: 0 20px;">
            <p id="dropbtn">username: <strong style="margin-right: 5px;"><?php echo $_SESSION['username'] ?></strong></p>
            <!--<button type="submit" name="dlt_dd" onclick="<?php echo "return confirmdelete()" ?>" class="btn-dlt">delete<button> -->
        </div>
    </div>
</nav>
<script src="js/index.js"></script>
<script>
    Number.prototype.pad = function(n) {
        for (var r = this.toString(); r.length < n; r = 0 + r);
        return r;
    };

    function updateClock() {
        var now = new Date();
        var sec = now.getSeconds(),
            min = now.getMinutes(),
            hou = now.getHours(),
            mo = now.getMonth(),
            dy = now.getDate(),
            yr = now.getFullYear();
        var months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
        var tags = ["mon", "d", "y", "h", "m", "s", ],
            corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2), ];
        for (var i = 0; i < tags.length; i++)
            document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
    }

    function initClock() {
        updateClock();
        window.setInterval("updateClock()", 1);
    }
</script>

</html>