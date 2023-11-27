
<?php
session_start();
if(!$_SESSION["glob_ID"]){
    header("location: /breif/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<style>
    .j {
        background-color: #333;
    }

    .p {
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

    }

    button {
        padding: 10px 30px;
        width: 300px;
        font-size: 26px;
        background-color: rgb(67, 67, 255);
        color: #fff;
        font-weight: bold;
        border-radius: 8px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./includs/style.css">
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <?php
    require("./header.php");
    ?>

    <main class="main_index j">
        <div class="contenr">
            <p class="p">Bonjour , soyez la bienvenue sur votre site</p>
            <button>YouCountact</button>
        </div>
    </main>
    <?php
    require("./footer.php");
    ?>
</body>

</html>