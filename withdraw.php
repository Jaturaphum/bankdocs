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
    <title>withdraw</title>
    <link rel="stylesheet" href="withdraw.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
</head>
<body>
    <div>
    <form method="post">
    <div class="section_area_grid">
        <h2>withdraw</h2>
        <div class="dropdown" style="float: right;">
  <p id="dropbtn">username: <strong style="margin-right: 5px;"><?php echo $_SESSION['username']; ?></strong><p id="dropbtn">wallet: 100.00 baht</p></p>
  <div class="dropdown-content">
        </div>
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
