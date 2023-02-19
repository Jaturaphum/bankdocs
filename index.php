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
<<<<<<< HEAD
    <div>
    <form method="post">
    <div class="section_area_grid">
        <h2>Home</h2>
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
=======
        <h1 style="font-size:400%; text-align:center;">Home</h1>
           <p style="color: white; font-size:200%;text-decoration:none;"><strong><?php echo "ชื่อบัญชี: ".$_SESSION['username']; ?></strong></p><br>
           <p style="color: white; font-size:200%; text-decoration:none;"><?php echo "ยอดเงินที่ใช้ได้ :" . $_SESSION['money']; ?></strong></p><br>
   <nav>
		<menu >
        
            
				
			
         <menuitem id="demo1">
         
             <a style="text-align:center;">Menu</a>
		<menu>
             <menuitem id="demo" >    
             <a style="text-align:center; text-decoration: none;"href="deposit.php">ฝาก</a>
         
              </menuitem>

             <menuitem>
             <a style="text-align:center;  text-decoration: none; "href="withdraw.php">ถอน</a>
                 
             </menuitem>

			 <menuitem>
             <p><a href="index.php?logout='1'" style="color: white;  text-decoration:none">Logout</a></p>
            </menuitem>
					
            
		</menu>
	</nav>
>>>>>>> 69ebfa6b142343537eabb03f30f49a5729d03821
</body>
<script src="js/index.js"></script>
</html>
