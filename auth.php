<?php 

    $hostname = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'ithub_db';

    $conn = mysqli_connect($hostname, $usernamem, $password, $database) or die("Connect Error:" . mysqli_connect_error());

    if($_SERVER['REQIEST_METHOD'] == 'GET') {

        $username = $_GET['username'];
        $password = $_GET['password'];

        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password'])){
                echo "logged in";
            } else echo "wrong password";
        } else echo "username not found";

    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthdate = $_POST['birthdate'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
?>