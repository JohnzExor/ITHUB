<div class='homepage'>
    <?php 
        if(isset($_GET['action']) && $_GET['action'] == 'login'){
            include 'login.php';
        }

        if(isset($_GET['action']) && $_GET['action'] == 'register'){
            include 'register.php';
        }
    ?>
    <h1>IT HUB</h3>
    <p>The Home of IT in Palawan State University.</p>
</div>

<style>
    .homepage {
        height: 60.1em;
        padding: 20em;
        background-image: url('images/homepage.jpg');
        color: white;
    }

    .homepage h1 {
        font-size: 100px;
    }

    .homepage p {
        font-size: 30px;
    }

</style>