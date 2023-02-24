<?php
include('conDB/server.php');
$errors = array();
session_start();

if (isset($_POST['dlt_dd'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id ='$id';";
    $result = $conn->query($sql);

    if($result) {
        if (isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['success']);
        }
        
        $_SESSION['success_msg'] =
        header('Location: login.php');
        
    exit();
    } else {
        $_SESSION['error_msg'] =
        header('Location: index.php');
        exit();
    }
}
