<?php
include('server.php');
$sql = "SELECT * FROM users";
$errors = array();
$result = $conn->query($sql);

if (isset($_POST['dps_bb'])) {
	$deposit = (int) $_POST['deposit'];
	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$balance = (int) $row["money"];
			$sum = $balance + $deposit;

			$sql_update = "UPDATE users SET money ='$sum'  WHERE id=" . $row["id"];

			if ($conn->query($sql_update) === TRUE) {
				echo "Data updated successfully for id: " . $row["id"];
			} else {
				echo "Error updating data: " . $conn->error;
			}
		}

		header('Location: deposit.php');
		exit();
	} else {
		$errors[] = "Failed to retrieve user's deposit balance";
	}
}

if (!empty($errors)) {
	header('Location: deposit.php');
	exit();
}