<?php
require("./conect.php");
session_start();
$Id_User = $_SESSION["id_user"];
if (!$_SESSION["glob_ID"]) {
    header("location: /breif/login.php");
}
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
    .afficher .contenr {
        position: relative;
    }

    .supreme {
        width: 300px;
        height: 250px;
        background-color: #fff;
        box-shadow: 0 0 22px gainsboro;
        display: none;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .supreme form {
        display: flex;
        justify-content: space-around;
        width: 100%;
    }

    .supreme p {
        font-size: 18px;
        font-weight: bold;
    }

    .supreme form input {
        background-color: red;
        color: #fff;
        font-size: 18px;
        padding: 10px;
        cursor: pointer;
        border-radius: 10px;
    }

    #nu {
        display: none;
    }

    .afficher {
        padding-bottom: 40px;
    }

    .logOut {
        padding: 5px 20px;
        background-color: red;
        cursor: pointer;
        font-size: 20px;
        color: #fff;
        border-radius: 5px;
        width: 100%;
    }

    .profiel {
        background-color: #9999;
        width: 100%;
        border-radius: 0 0 10px 10px;
    }

    .profiel .contenr {
        display: flex;
        align-items: center;
        gap: 40px;
        min-height: 60vh;
    }

    .profiel .contenr .image_Profile {
        width: 350px;
        height: 350px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }

    .profiel .contenr .image_Profile img {
        width: 100%;
        height: 300px;
        border-radius: 10px;
    }

    #file {
        display: none;
    }

    #label_files {
        padding: 10px 50px;
        border-radius: 10px;
        background-color: rgb(95, 95, 252);
        font-weight: bold;
        font-size: 20px;
        color: #fff;
        cursor: pointer;
    }

    .profiel .contenr .informtion_user {
        height: auto;
        line-height: 2;
        font-size: 22px;
        font-weight: bold;
    }

    .profiel .contenr .informtion_user button {
        background-color: rgb(95, 95, 252);
        padding: 10px 20px;
        cursor: pointer;
        color: #fff;
        font-size: 18px;
        border-radius: 5px;
        width: 100%;
    }

    .profiel .contenr .informtion_user button a {
        color: #fff;
    }

    #updit {
        z-index: 88888;
    }

    @media (max-width:480px) {
        .profiel .contenr {
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .informtion_user {
            min-height: 20vh;
        }
    }

    input {
        outline: none;
    }

    .pp {
        color: red;
        font-size: 22px;
        display: none;
    }
</style>

<body>
    <?php

    if (isset($_POST["logout"])) {
        $_SESSION["glob_ID"] = null;
        if (!$_SESSION["glob_ID"]) {
            header("location: /breif/index.php");
        }

    }
    ?>
    <?php
    include("./header.php");
    ?>

    <?php


    $sql = "SELECT Nom_U , Prenom_U , Email_U FROM users WHERE ID_U = $Id_User ";
    $result = mysqli_query($conn, $sql);
    $info_user = mysqli_fetch_assoc($result);
    echo "
    
    <section class='profiel'>
        <div class='contenr'>
            <div class='image_Profile'>
                <img src='./ilyas.jpg'>
                <label for='file' id='label_files'>Modifer photo</label>
                <input type='file' id='file'>
            </div>
            <div class='informtion_user'>
                <p>$info_user[Nom_U]  $info_user[Prenom_U] </p>
                <p>$info_user[Email_U]</p>
                <button> <a href='/breif/editeProfiel.php'> Edite Profiel </a></button>
                <button> <a href='/breif/contact.php'>Add user</a></button>
                <form method='POST'>
                    <input class='logOut' name='logout' type='submit' value='log out'>
                </form>
            </div>
        </div>
    </section>
    
    ";
    ?>





   <?php
   require("./updit.php");
   ?>

    <?php

    if (isset($_POST["updit"])) {

        $nom = htmlspecialchars(trim($_POST['nom']));
        $email = htmlspecialchars(trim($_POST['email']));
        $telephone = htmlspecialchars(trim($_POST['telephone']));
        $number = htmlspecialchars(trim($_POST['number']));
        require("./con.php");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE contacts SET Nom_C='$nom' , Telephone='$telephone' , Email_C='$email'  WHERE ID_C=$number";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    ?>


    <?php

    if (isset($_POST["dle"])) {
        $numb = htmlspecialchars(trim($_POST['umber']));

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // sql to delete a record
        $sql = "DELETE  FROM contacts WHERE ID_C=$numb";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
    ?>

    <main class="afficher">
        <div class="contenr">
            <div id="supreme" class="supreme">
                <p>voulez faire supprimer</p>
                <form method="POST">
                    <input type="submit" value="Suppremer" id="dele" name="dle">
                    <input type="submit" value="pas supremer" id="pas">
                    <input id="nu" type="number" name="umber">
                </form>
            </div>
            <?php

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $Id_User = $_SESSION["id_user"];
            require("./con.php");
            $sql = "SELECT *  FROM contacts WHERE ID_US = $Id_User";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "

                <div class='cart'>
                      <div class='imag'>
                       <img src='./ilyas.jpg'>
                      </div>
                    <div  class='info'>
                       <h3>$row[Nom_C]</h3>
                       <h3>$row[Telephone]</h3>
                       <h3>$row[Email_C]</h3>
                       <h3>$row[D_Cree]</h3>
                       <button class='edit' value='$row[ID_C]' >Edite</button>
                       <button class='input' type='submit' name='delete' value='$row[ID_C]' > delete </button>
                    </div>
                </div>      
                    ";
                }
            } else {
                echo "<h1> no users  </h1>";
            }
            mysqli_close($conn);

            ?>
        </div>


    </main>
    <?php
    require("./footer.php");
    ?>
   
    <script src="./main.js"></script>
</body>

</html>