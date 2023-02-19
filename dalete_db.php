<?php
session_start();
include('server.php');

    $errors = array();

    if (isset($_POST['delete_user'])) {
        // Connect to the database
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_SESSION['id'];
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            echo "User data deleted successfully";
        } else {
            echo "Error deleting user data: " . $conn->error;
        } 
    
        $stmt->close();
        $conn->close();
    }
?>