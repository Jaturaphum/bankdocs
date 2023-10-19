<?php
include('conDB/server.php');
session_start();

if (isset($_POST['dlt_dd'])) {

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $sql = "DELETE FROM users WHERE user_id = $user_id AND username = '$username'";

    if (mysqli_query($conn, $sql)) {
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        // การลบไม่สำเร็จ
        echo "เกิดข้อผิดพลาดในการลบผู้ใช้: " . mysqli_error($conn);
    }
}
?>
