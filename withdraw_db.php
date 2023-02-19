<?php
include('server.php');
$sql = "SELECT * FROM users";
$errors = array();
$result = $conn->query($sql);

if (isset($_POST['wds_bb'])) {
	$withdraw = (int) $_POST['withdraw'];
	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$balance = (int) $row["money"];
			$sum = $balance - $withdraw;

			if ($sum < 0) {
				$errors[] = "Insufficient balance for user with ID " . $row["id"];
			} else {
				$sql_update = "UPDATE users SET money ='$sum'  WHERE id=" . $row["id"];

				if ($conn->query($sql_update) === TRUE) {
					echo "Data updated successfully for id: " . $row["id"];
				} else {
					echo "Error updating data: " . $conn->error;
				}
			}
		}

		if (!empty($errors)) {
			$_SESSION['errors'] = $errors;
			header('Location: withdraw.php');
			exit();
		} else {
			header('Location: withdraw.php');
			exit();
		}
	} else {
		$errors[] = "Failed to retrieve user's deposit balance";
	}
}

if (!empty($errors)) {

	$_SESSION['errors'] = $errors;
	header('Location: withdraw.php');
	exit();
}

?>