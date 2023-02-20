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
    <title>withdraw</title>
    <link rel="stylesheet" href="style_withdraw.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
</head>

<body>
    <form method="post" action="withdraw_db.php">
        <div class="section_area_grid">
            <h2>withdraw</h2>
            <div class="dropdown" style="float: right;">
                <p id="dropbtn">username: <strong style="margin-right: 5px;"><?php echo $_SESSION['username']; ?></strong>
                <p id="dropbtn">wallet: <strong>
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
        <div class="column">
            <div class="bon">
                <label for="withdraw">กรอกจำนวนเงินถอน</label><br>
                <input type="text" name="withdraw" placeholder="">
                <br><br>
                <div class="input-group">
                    <button type="submit" name="wds_bb" class="btn" onclick="confirmWithdraw()">Withdraw</button>
                    <script>
                        function confirmWithdraw() {
                            if (confirm("ยันยืนเพื่อทำการถอนไหม?")) {
                                // user clicked OK
                                alert("ได้ยันยืนการถอนออกจากระบบเเล้ว");
                            } else {
                                // user clicked Cancel
                                alert("ได้ยกเลิกการถอนออกจากระบบเเล้ว!");
                            }
                        }
                    </script>
                </div>
                <div>
                    <asp:Button class="input-group" runat="server" Text="Select" Onclientclick="return btn_Click();" CssClass="cssbutton" />
                </div>
            </div>
            <div>
            </div>
            <footer>
                <p class="main">
                    2023 © jaturaphum.s@ku.th | jaturaphum Suaprakhon | develop by <a href="https://github.com/Jaturaphum" target="_blank">Jaturaphum</a>
                </p>
            </footer>
    </form>
</body>
<script src="js/index.js"></script>

</html>