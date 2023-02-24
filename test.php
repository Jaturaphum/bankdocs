<?php
require("connect_db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_SESSION['username'];
  $sql = "SELECT account FROM username ='username';";
  $result = $conn->query($sql);
  if (isset($_POST["deposit"])) {
      $amount = $_POST["amount"];
      $query = "UPDATE account SET deposit = deposit, balance = balance + '$amount' WHERE username = '$username'";
      mysqli_query($conn, $query);
  } else if (isset($_POST["withdraw"])) {
      $amount = $_POST["amount"];
      $query = "UPDATE account SET withdraw = withfraw ,balance = balance - '$amount' WHERE username = '$username'";
      mysqli_query($conn, $query);
  }
}