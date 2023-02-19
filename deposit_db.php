<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if(isset($_POST['dp_user'])) {
        $banknumber = mysqli_real_escape_string($conn, $_POST['banknumber']);
        $bank = mysqli_real_escape_string($conn, $_POST['bank']);

    $stmt = $conn->prepare("INSERT INTO accounts (account_number, num_jobs) VALUES (?, ?)");

    $stmt->bind_param("si", $account_number, $num_jobs);

    $account_number = '';
    $num_jobs = '';

    $stmt->execute();

    $stmt->close();
    $conn->close();
    }
?>