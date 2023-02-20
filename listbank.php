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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>list</title>
  <link rel="stylesheet" href="style_listbank.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet" />
</head>

<body>
  <form method="post" action="deposit_db.php">
    <div class="section_area_grid">

      <body onLoad="initClock()">
        <div id="timedate">
          <a id="h">12</a>: <a id="m">00</a>: <a id="s">00</a><br />
          <a id="mon">January</a>
          <a id="d">1</a>
          <a id="y">0</a>
        </div>
      </body>
      <h2>list</h2>
      <div class="dropdown" style="float: right">
        <p id="dropbtn">
          username:
          <strong style="margin-right: 5px"><?php echo $_SESSION['username']; ?></strong>
        </p>
      </div>
    </div>
    <nav class="nav">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="deposit.php">deposit</a></li>
        <li><a href="withdraw.php">withdraw</a></li>
        <li><a href="listbank.php">list</a></li>
        <li>
          <a href="index.php?logout='1'" style="color: red; text-decoration: none">Logout</a>
        </li>
      </ul>
    </nav>
    <div style=" width:820px; height:425px; overflow: auto; margin: auto; margin-top: 15px;">
      <?php
      include('server.php');

      $username = $_SESSION['username'];
      $sql = "SELECT * FROM users WHERE username='$username';";

      $result = $conn->query($sql);
      ?>
      <table id="mytable">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Wallet</th>
            <th>Deposit</th>
            <th>Withdraw</th>
            <th>Datatime</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['money']; ?></td>
              <td></td>
              <td>-500.00</td>
              <td><?php echo $row['datatime']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <footer>
      <p class="main">
        2023 © jaturaphum.s@ku.th | jaturaphum Suaprakhon | develop by
        <a href="https://github.com/Jaturaphum" target="_blank">Jaturaphum</a>
      </p>
    </footer>
  </form>
</body>
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
    var tags = ["mon", "d", "y", "h", "m", "s"],
      corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2)];
    for (var i = 0; i < tags.length; i++)
      document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
  }

  function initClock() {
    updateClock();
    window.setInterval("updateClock()", 1);
  }
</script>

</html>