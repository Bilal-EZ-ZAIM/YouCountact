<?php
session_start();
$_SESSION["glob_ID"] = null;

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./style.css">
</head>
<style>
    .main_index {
        background-color: #333;
    }

    #main {
        height: 90vh;
    }

    .contenr {
        display: flex;
        flex-direction: row;
        color: #fff;
        font-weight: bold;
    }

    .p {
        color: red;
        font-size: 22px;
    }

    .pp {
        color: red;
        font-size: 22px;
        display: none;
    }

    @media (max-width:480px) {
        form {
            width: 100%;

        }

        #username,
        #pre,
        #email,
        #password {
            width: 250px;
        }
    }

    .com{
        background-color: red;
        width: 250px;
        height: 10vh;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body>
    <?php
    require("./header.php");
    ?>


    <main id="main" class="main_index">
        <div class="contenr">
            <form method="post" class="center-flex-culom" action="./rege.php">
                <label for="username">Nom</label>
                <input class="valid" type="text" id="username" name="username" required>
                <p class="pp">enter 3 character ou plusieur</p>
                <label for="pre">Prenom</label>
                <input class="valid" type="text" id="pre" name="prenom" required>
                <p class="pp">enter 3 character ou plusieur</p>
                <label for="email">E-mail</label>
                <input class="valid" type="email" id="email" name="email" required>
                <p class="pp">please enter email</p>
                <label for="password">Mot de passe :</label>
                <input class="valid" type="password" id="password" name="password" required>
                <p class="pp">enter 8 character ou plusieur</p>
                <label for="password">Mot de passe :</label>
                <input class="valid" type="password" id="password" name="dpassword" required>
                <p class="pp">
                    le password ne pas équivalent
                </p>
                <input class="valid" type="submit" value="regester" class="submit" name="reg">
            </form>
        </div>

    </main>


    <?php
    require("./footer.php");
    ?>

    <script src="./main.js"></script>
</body>

</html>