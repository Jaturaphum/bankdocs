<?php 
    session_start();
    include('conDB/server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $idstudent = mysqli_real_escape_string($conn, $_POST['idstudent']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($firstname)) {
            array_push($errors, "firstname is required");
            $_SESSION['error'] = "firstname is required";
        }
        if (empty($lastname)) {
            array_push($errors, "Lastname is required");
            $_SESSION['error'] = "Lastname is required";
        }
        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($idstudent)) {
            array_push($errors, "IDstudent is required");
            $_SESSION['error'] = "IDstudent is required";
        }
        if (empty($email)) {
            array_push($errors, "email is required");
            $_SESSION['error'] = "email is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
        }
        
        if (count($errors) == 0) {
            $password = md5($password_1);
            $idstudent = md5($idstudent);

            $sql = "INSERT INTO users (firstname, lastname, idstudent, email, username, password) VALUES ('$firstname', '$lastname', '$idstudent', '$email', '$username', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: login.php');
        } else {
            header("location: register.php");
        }
    }
