<?php
include('conDB/server.php');

$errors = array();

session_start();

if (isset($_POST['wds_bb'])) {
    $username = $_SESSION['username'];

    if (isset($_POST['withdraw'])) {
        $withdraw = (int) $_POST['withdraw'];

        if ($withdraw > 0) {
            $stmt = $conn->prepare("SELECT balance FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($balance);
            $stmt->fetch();
            $stmt->close();

            if ($withdraw <= $balance) {
                $stmt = $conn->prepare("UPDATE users SET balance = balance - ? WHERE username = ?");
                $stmt->bind_param("is", $withdraw, $username);

                if ($stmt->execute()) {
                    $insertStmt = $conn->prepare("INSERT INTO listbanks (IDstudent, username, balance, deposit, withdraw) SELECT IDstudent, username, balance, 0, ? FROM users WHERE username = ?");
                    $insertStmt->bind_param("is", $withdraw, $username);
                    if ($insertStmt->execute()) {
                        header('Location: withdraw.php');
                        exit();
                    } else {
                        $errors[] = "Error inserting data into listbank: " . $insertStmt->error;
                    }
                    $insertStmt->close();
                } else {
                    $errors[] = "Error updating user balance: " . $stmt->error;
                }
                $stmt->close();
            }
        } else {
            $errors[] = "Withdraw amount must be greater than 0";
        }
    } else {
        $errors[] = "Please enter the withdraw amount";
    }
}
