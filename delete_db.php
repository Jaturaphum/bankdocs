<?php
include('conDB/server.php');
$errors = array();
session_start();

if (isset($_POST['delete'])) {
    $id = $_SESSION['id'];
    $sql = "DELETE FROM users WHERE id ='$id';";
    $result = $conn->query($sql);

    if ($result) {
        session_destroy();
        header('Location: login.php');
        exit();
    } else {
        array_push($errors, "Error deleting user: " . $conn->error);
    }
}
?>