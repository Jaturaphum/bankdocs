<?php
include('conDB/server.php');

$errors = array();

session_start();

if (isset($_POST['dps_bb'])) {
    $username = $_SESSION['username'];

    if (isset($_POST['deposit'])) {
        $deposit = (int) $_POST['deposit'];

        if ($deposit > 0) {
            $stmt = $conn->prepare("UPDATE users SET balance = balance + ? WHERE username = ?");
            $stmt->bind_param("is", $deposit, $username);

            if ($stmt->execute()) {
                $insertStmt = $conn->prepare("INSERT INTO listbanks (IDstudent, username, balance, deposit, withdraw) SELECT IDstudent, username, balance, ?, 0 FROM users WHERE username = ?");
                $insertStmt->bind_param("is", $deposit, $username);
                if ($insertStmt->execute()) {
                    header('Location: deposit.php');
                    exit();
                } else {
                    $errors[] = "Error inserting data into listbank: " . $insertStmt->error;
                }
                $insertStmt->close();
            } else {
                $errors[] = "Error updating user balance: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $errors[] = "Deposit amount must be greater than 0";
        }
    } else {
        $errors[] = "Please enter the deposit amount";
    }
}

if (!empty($errors)) {

}
