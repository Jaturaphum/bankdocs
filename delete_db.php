<?php
include('conDB/server.php');
$errors = array();
session_start();

if (isset($_POST['delete'])) {
    $id = $_SESSION['id'];

    $sql = "DELETE FROM users WHERE id ='$id';";

    if ($conn->query($sql) === TRUE) {
        echo "user deleted successfully";
    } else {
        echo "error deleting user:" . $conn->error;
    }

    session_destroy();
    header('Location: index.php');
    exit();
}