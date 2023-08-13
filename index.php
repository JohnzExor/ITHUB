<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>IT HUB</title>
</head>
<body>
    <nav>
        <label for="logo">IT HUB</label>
        <ul>
            <?php
                session_start();
                if(isset($_SESSION['email'])){

                    echo "
                    <li><a>" . $_SESSION['email'] . " </a></li>;
                    <li><a href='logout.php'>Logout</a></li>;
                    ";

                } else {
                    echo "
                    <li><a href='?action=login'>LOGIN</a></li>
                    <p style='color: white;'>|</p>
                    <li><a href='?action=register'>REGISTER</a></li>
                    ";
                }
            ?>
        </ul>    
    </nav>
    <div class="background"></div>
    <div class="container">
        <?php 
            if(!isset($_SESSION['email'])){
                include 'homepage.php';
            } else include 'newsfeed.php';
        ?>
    </div>
    <div class="background-color"></div>
</body>
</html>

<style>
    .background {
        background-color: #121211;
        height: 60.1em;
        position: fixed;
        width: 100%;
        z-index: -1;
    }
</style>