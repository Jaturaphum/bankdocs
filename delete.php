<?php
include('server.php');
$errors = array();
session_start();

if (isset($_POST['dps_bb'])) {
$id=$_GET["id"];

$sql="DELETE FROM users WHERE id=$id";
$conn->query($sql);
header( "location: login.php" );
}
?>