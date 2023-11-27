<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./index.css">
</head>

<style>
    .main_index {
        background-color: #555;
        color: #fff;
        font-weight: bold;
    }

    @media (max-width:480px) {
        form {
            width: 100%;

        }

        #nom,
        #email,
        #telephone,
        #no {
            width: 250px;
        }

        #h3 {
            font-size: 18px;
        }
    }
    .pp {
        color: red;
        font-size: 22px;
        display: none;
    }
</style>

<body>
    <?php
    require("./header.php");
    ?>
    <?php
    ?>
    <main class="main_index">
        <div class="contenr">
            <h3 id="h3">Créer un nouveau contact</h3>
            <form method="POST" class="center-flex-culom" action="./aficher.php">
                <label for="nom">Nom :</label>
                <input class="valid" type="text" id="nom" name="nom">
                <p class="pp">enter 3 character ou plusieur</p>
                <label for="email">E-mail :</label>
                <input class="valid" type="email" id="email" name="email">
                <p class="pp">please enter email</p>
                <label for="telephone">Téléphone :</label>
                <input class="valid" type="tel" id="telephone" name="telephone">
                <p class="pp">enter nimero de telephone</p>
                <label for="no">Address</label>
                <input class="valid" type="text" id="no" name="address">
                <p class="pp">enter 3 character ou plusieur</p>
                <input class="valid" type="submit" value="add user" name="insert" class="submit">
            </form>
        </div>
    </main>


    <?php
    require("./footer.php");
    ?>

    <script src="./main.js"></script>
</body>

</html>