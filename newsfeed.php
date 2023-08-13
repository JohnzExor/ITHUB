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

        <?php 
        if(isset($_GET['action']) && $_GET['action'] == "write") {
            echo "
            <div class='create-post'>
                <form method='POST'>
                    <a class='close-btn'; href='?'>x</a>
                    <label class='post-label' for='post-text'>Create a post</label><br>
                    <textarea class='text-area' name='post-text' id='' cols='30' rows='10' placeholder='Share something..'></textarea><br>
                    <input class='post-btn' type='submit'>
                </form>
            </div>
            ";
        }

            $query = "SELECT * FROM user_feed ORDER BY date_posted DESC";
            $result = mysqli_query($conn, $query);

            if ($result->num_rows >= 1) {
                while ($row = $result->fetch_assoc()) {

                    $user_post = $row['user_id'];

                    $query_name = "SELECT CONCAT(firstname, ' ', lastname) as name FROM users WHERE id = $user_post";
                    $result_name = mysqli_query($conn, $query_name);

                    if ($result_name) {
                        $row_name = $result_name->fetch_assoc();
                        echo "
                            <div class='feed'>
                                <p class='user-name'>" . $row_name['name'] . "</p>
                                <p class='feed-text'>" . $row['text'] . "</p>
                                <p class='date-posted'>" . $row['date_posted'] . "</p>
                            </div>
                        ";
                    }
                }
            } else echo "<div class='feed'>No posts</div>";
        ?>

    </div>
</div>

<style>

    .newsfeed-container {
        padding-top: 5em;
    }

    .create-post {
        position: sticky;
        width: 30em;
        margin: auto;
        background-color: white;
        padding: 1em;
        border-radius: 1em;
        text-align: center;
    }

    .create-post .post-label {
        font-size: 20px;
        font-weight: bold;
    }

    .create-post .text-area {
        margin-top: 1em;
        width: 100%;
        border-radius: 1em;
        padding: 1em;
    }

    .create-post .post-btn {
        width: 20em;
        height: 3em;
        border-radius: 1em;
        background-color: black;
        color: white;
        cursor: pointer;
    }

    .create-post .post-btn:hover {
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
    }
    
    .feed .user-name {
        font-weight: bold;
    }

    .feed .date-posted {
        color: gray;
    }
</style>