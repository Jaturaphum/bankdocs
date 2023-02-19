<<<<<<< HEAD
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
    <title>deposit</title>
    <link rel="stylesheet" href="deposit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
</head>
<body>
    <form action="deposit_db.php" method="post">
    <div class="section_area_grid">
        <h2>deposit</h2>
        <div class="dropdown" style="float: right;">
  <p id="dropbtn">username: <strong style="margin-right: 5px;"><?php echo $_SESSION['username']; ?></strong><p id="dropbtn">wallet: <strong style="margin-right: 5px;"><?php echo $_GET['money']; ?></strong> baht</p></p>
    </div>
</div>
    <nav class="nav">
	<ul>
		<li><a href="index.php">Home</a>
    <li><a href="deposit.php">deposit</a>
		<li><a href="withdraw.php">withdraw</a>
		<li><a href="index.php?logout='1'" style="color: red; text-decoration:none;">Logout</a>
	</ul>
</nav>
<div>
<div class="group">
        <label>banknumber</label>
        <input type="" name="" required="">
        <input type="button" onclick="alert('ได้ทำการฝากเงินเข้าระบบเเล้ว')" value="Deposit" >
    </div>
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
=======
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money888</title>

    <link rel="stylesheet" href="style_index.css">
    </head>
    <body>
        <h3>ฝากเงิน</h3>
        
        <form action="showdeposit.php">
        ระบุจำนวนเงินฝาก :<input type="text" name="name"> บาท <br>
        <input type="Submit" value="ยืนยัน"> <br>
        <menuitem><a style = "background-color: white" href="index.php">ย้อนกลับ</a></menuitem>

    </form>
        
    </body>
</html>
>>>>>>> 69ebfa6b142343537eabb03f30f49a5729d03821
