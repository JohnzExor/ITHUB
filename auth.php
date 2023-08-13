<?php 
    session_start();

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'ithub_db';

    $conn = mysqli_connect($hostname, $username, $password, $database) or die("Connect Error:" . mysqli_connect_error());

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        $email = $_GET['email'];
        $password = $_GET['password'];

        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password'])){
                echo "logged in";
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $email;
                header('location: index.php');
            } else echo "wrong password";
        } else echo "username not found";

    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO users (firstname, lastname, birthdate, email, password) VALUES ('$firstname', '$lastname', '$birthdate', '$email', '$password')";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "Registration Compelete";
        } else echo "Error";
    }

    mysqli_close($conn);
?>