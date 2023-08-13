<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'ithub_db');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $user_id = $_SESSION['user_id'];
        $text = $_POST['post-text'];

        if($text != null) {
            $query = "INSERT INTO user_feed (user_id, text) VALUES ('$user_id', '$text')";
            $result = mysqli_query($conn, $query);
        }
    }
?>


<div class="newsfeed">
    <div class="newsfeed-container">
        <div class="create-post">
            <form method="POST">
                <label class="post-label" for="post-text">Create a post</label><br>
                <input class="post-text" type="text" name="post-text" id="" placeholder="Create a post"><br>
                <input class="post-btn" type="submit">
            </form>
        </div>

        <?php 
            $query = "SELECT * FROM user_feed";
            $result = mysqli_query($conn, $query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {

                    $user_post = $row['user_id'];

                    $query_name = "SELECT CONCAT(firstname, ' ', lastname) as name FROM users WHERE id = $user_post";
                    $result_name = mysqli_query($conn, $query_name);

                    if ($result_name) {
                        $row_name = $result_name->fetch_assoc();
                        echo "
                            <div class='feed'>
                            <p class='user-name'>" . $row_name['name'] . "</p>
                            <p>" . $row['text'] . "</p>
                            <p class='date-posted'>" . $row['date_posted'] . "</p>
                            </div>
                        ";
                    }
                }
            }
        ?>

    </div>
</div>

<style>
    .newsfeed {
        background-color: #171616;
        height: 60em;
        color: white;
    }
    
    .create-post {
        background-color: white;
        width: 50em;
        margin: auto;
        color: black;
        text-align: center;
        border-radius: 1em;
        position: relative;
        top: 10em;
    }

    .post-label {
        font-weight: bold;
    }

    .create-post .post-text {
        padding-bottom: 3em;
        border-radius: 1em;
        border-color: black;
        width: 90%;
        padding: 1em;
    }

    .post-btn {
        padding: 1em;
        width: 10em;
        margin: 1em;
        background-color: #171616;
        color: white;
        font-weight: bold;
        cursor: pointer;
        border-radius: 1em;
    }

    .post-btn:hover {
        color: black;
        background-color: white;
        transition: 0.5s;
    }

    .feed {
        color: black;
        background-color: white;
        width: 30em;
        padding: 1em;
        margin: auto;
        border-radius: 1em;
        margin-top: 1em;
        position: relative;
        top: 10em;
    }

    .feed .user-name {
        font-weight: bold;
    }

    .feed .date-posted {
        color: gray;
    }
</style>