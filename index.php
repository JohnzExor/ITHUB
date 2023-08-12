<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>IT HUB</title>
</head>
<body>
    <?php 
    if(!isset($_SESSION['username'])){
        include 'homepage.php';
    } else include 'newsfeed.php';

    ?>
</body>
</html>