<nav>
    <label for="logo">IT HUB</label>
    <ul>
        <li><a href="?action=login">LOGIN</a></li>
        <p style="color: white;">|</p>
        <li><a href="?action=register">REGISTER</a></li>
    </ul>    
</nav>

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
    nav {
        background: black;
        padding: 1em 5em 1em 5em;
    }

    nav  label {
        color: white;
        font-size: 20px;
        font-weight: bold;
    }

    nav ul {
        float: right;
        display: flex;
        gap: 1em;
    }

    nav ul li a {
        color: white;
    }

    nav ul li a:hover { 
        font-weight: bold;
        border-bottom: solid white;
    }

    .homepage {
        height: 57em;
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