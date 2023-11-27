<?php
require("./conect.php");
session_start();
if (!$_SESSION["glob_ID"]) {
    header("location: /breif/login/");
}
$Id_User = $_SESSION["id_user"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="../includs/style.css">
</head>
<style>
    main {
        height: 80vh;
        background-color: #555;
    }

    main .contenr {
        display: flex;
        align-items: center;

    }

    main .contenr .updit {
        width: 600px;
        height: 400px;

        display: flex;
        flex-direction: column;
        gap: 10px;

    }

    main .contenr .updit input {
        width: 100%;
        padding: 10px 20px;
        outline: none;
        font-size: 18px;
        border-radius: 8px;
        color: white;
        background-color: #000;
    }

    main .contenr .updit label {
        font-size: 22px;
        font-weight: bold;
        color: #fff;
    }

    main .contenr .updit .submit {
        background-color: rgb(95, 95, 252);
        font-weight: bold;
        width: 100px;
        cursor: pointer;
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

        #nom,
        #pre,
        #email {
            width: 250px;
        }
    }
</style>

<body>
    <?php
    include("./header.php");

    ?>

    <main>
        <div class="contenr">


            <?php

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $Id_User = $_SESSION["id_user"];
            $sql = "SELECT Nom_U , Prenom_U , Email_U  FROM users WHERE ID_U = $Id_User";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $info_user = mysqli_fetch_assoc($result);

                echo "
        <form method='POST' class='updit'>
            <label for='nom'>Nom :</label>
            <input  class='valid' type='text' name='nom' id='nom' value='$info_user[Nom_U]'>
            <p class='pp'>enter 3 character ou plusieur</p>
            <label for='nom'>Prenom :</label>
            <input  class='valid' type='text' ' name='prenom' id='pre'  value='$info_user[Prenom_U]'>
            <p class='pp'>enter 3 character ou plusieur</p>
            <label  for='email'>E-mail :</label>
            <input class='valid' type='email'  name='email' id='email' value='$info_user[Email_U]'>
            <p class='pp'>please enter email</p>
            <input type='submit' value='modifer' name='updit'  class='submit'>
        </form>


        
        ";

            } else {
                echo "<h1> no users  </h1>";
            }
            mysqli_close($conn);


            ?>
        </div>
    </main>

    <?php

    if (isset($_POST["updit"])) {
        $nom = htmlspecialchars(trim($_POST['nom']));
        $email = htmlspecialchars(trim($_POST['email']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $_SESSION["glob_ID"] = $nom;
        require("./conect.php");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE users SET Nom_U='$nom' , Prenom_U='$prenom' , Email_U='$email'  WHERE ID_U=$Id_User";
        $updit = mysqli_query($conn, $sql);
        if ($updit) {
            header("location: /breif/profile.php");
        }
        mysqli_close($conn);
    }

    ?>

    <?php
    require("./footer.php");
    ?>
    <script src="./main.js"></script>
</body>

</html>