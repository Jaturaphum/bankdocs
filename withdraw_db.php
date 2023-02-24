<?php
include('conDB/server.php');

$errors = array();

session_start();

if (isset($_POST['wds_bb'])) {
	$username = $_SESSION['username'];
	$withdraw = (int) $_POST['withdraw'];

	if ($withdraw > 0) {
		$sql = "SELECT * FROM users WHERE username='$username';";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$user_id = $row["id"];
			$balance = (int) $row["money"];
			$sum = $balance - $withdraw;

			if ($sum < 0) {
				$errors[] = "Insufficient balance for user $username";
			} else {
				$sql_update = "UPDATE users SET money ='$sum', withdraw ='$withdraw' WHERE id=$user_id AND username='$username';";

				if ($conn->query($sql_update) === TRUE) {
					echo "Data updated successfully for user: $username";
				} else {
					echo "Error updating data: " . $conn->error;
				}
				
				header('Location: withdraw.php');
				exit();
			}
		} else {
			$errors[] = "User $username not found";
		}
	} else {
		$errors[] = "Withdrawal amount must be greater than 0";
	}
	header('Location: withdraw.php');
	exit();
}
?>