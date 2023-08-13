<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'ithub_db');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $user_id = $_SESSION['user_id'];
        $text = $_POST['post-text'];

        $query = "INSERT INTO user_feed (user_id, text) VALUES ('$user_id', '$text')";
        $result = mysqli_query($conn, $query);
    }
?>


<div class="newsfeed">
    <div class="create-post">
        <form method="POST">
            <label for="post-text">Create a post</label>
            <input class="post-text" type="text" name="post-text" id="" placeholder="Create a post">
            <input type="submit">
        </form>
    </div>

    <?php 
        echo "
            
        ";
    ?>

    <div class="feed">
        <p>Johnzyll Jimeno</p>
        <p>sadfdsasafdsafasds</p>
        <p>data 12341</p>
    </div>
</div>

<style>
    .newsfeed {
        background-color: #171616;
        height: 60em;
        color: white;
    }

    .create-post {
        padding-top: 5em;
    }

    .create-post .post-text {
        padding-bottom: 3em;
    }

    .feed {
        color: black;
        background-color: white;
        width: 30em;
        padding: 1em;
    }
</style>