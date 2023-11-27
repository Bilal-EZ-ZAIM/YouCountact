
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="./index.css">
<style>
    a {
        color: rgb(197, 197, 255);
        font-weight: bold;
    }

    header div .btn {
        font-size: 22px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: #fff;
        padding: 5px 20px;
        border-radius: 5px;
        background-color: rgb(95, 95, 252);
    }

    header {
        height: 10vh;
        width: 100%;
        background: #222;
    }
    @media (max-width:480px) {
        header div .btn {
        font-size: 16px;
        padding: 5px;
        border-radius: 2px;
        background-color: rgb(95, 95, 252);
    }
    #logo{
        font-size: 20px;
    }
    }
</style>
<header>
    <div class="contenr sp-flex-row">
        <div id="logo"> <a href="/breif/index.php"> YouCountact</a></div>
        <div>
            <?php
            $nom = $_SESSION["glob_ID"];

            if ($_SESSION["glob_ID"] !== null) {
                echo "
                <a class='btn' href='/breif/profile.php'>$nom</a>
                ";

            } else {
                echo "
                <a class='btn' href='/breif/login.php'>Sing in</a>
                <a class='btn' href='/breif/regster.php'>Regester</a>
                ";
            }
            ?>


        </div>

    </div>

</header>