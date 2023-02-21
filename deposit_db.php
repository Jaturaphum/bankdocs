<?php
include('server.php');

$errors = array();

session_start();

if (isset($_POST['dps_bb'])) {
	$username = $_SESSION['username'];

	if (isset($_POST['deposit'])) {
		$deposit = (int) $_POST['deposit'];

		if ($deposit > 0) {
			$sql = "SELECT * FROM users WHERE username='$username';";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$user_id = $row["id"];
				$balance = (int) $row["money"];
				$sum = $balance + $deposit;

				$sql_update = "UPDATE users SET money ='$sum', deposit ='$deposit' WHERE id=$user_id;";

				if ($conn->query($sql_update) === TRUE) {
					echo "Data updated successfully for user: $username";
				} else {
					echo "Error updating data: " . $conn->error;
				}

				header('Location: deposit.php');
				exit();
			} else {
				$errors[] = "User $username not found";
			}
		} else {
			$errors[] = "Deposit amount must be greater than 0";
		}
	} else {
		$errors[] = "Please enter the deposit amount";
	}
}

if (!empty($errors)) {
	header('Location: deposit.php');
	exit();
}

