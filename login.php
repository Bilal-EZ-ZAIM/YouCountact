<?php
session_start();
$_SESSION["glob_ID"] = null;
$_SESSION["in_valid"] = false;
$_SESSION["id_user"] = null;
?>

<?php
require("./conect.php");


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./includs/style.css">
</head>
<style>
    .main_index {
        background-color: #333;
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
            margin: 0 auto;

        }

        #email,
        #password {
            width: 250px;
        }
    }
</style>

<body>




    <?php
    require("./header.php");
    ?>

    <?php
    if (isset($_POST["login"])) {
        $email = htmlspecialchars(trim($_POST['email']));
        $password_U = htmlspecialchars(trim($_POST['password']));

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT password_U , Nom_U , ID_U FROM `users` WHERE Email_U='$email'";
        $result = mysqli_query($conn, $sql);
        $as = mysqli_fetch_assoc($result);

        if ($as) {
            $stored_hashed_password = "$as[password_U]";
        } else {
            $_SESSION["in_valid"] = true;
        }


        if (mysqli_num_rows($result) > 0) {
            if (password_verify($password_U, $stored_hashed_password)) {

                $_SESSION["glob_ID"] = "$as[Nom_U]";
                $_SESSION["id_user"] = "$as[ID_U]";
                header("location: http://localhost/server/breif/index.php");


            } else {
                $_SESSION["in_valid"] = true;
            }
        }

        mysqli_close($conn);
    }

    ?>

    <main class="main_index">
        <div class="contenr">
            <form method="post" class="center-flex-culom">
                <label for="email">E-mail</label>
                <input class="valid" type="email" id="email" name="email" required>
                <p class="pp">please enter email</p>
                <?php
                if ($_SESSION["in_valid"]) {
                    echo '<p class="p"> email in valide</p>';
                }
                ?>
                <label for="password">Mot de passe :</label>
                <input class="valid" type="password" id="password" name="password" required>
                <p class="pp">enter 8 character ou plusieur</p>
                <?php
                if ($_SESSION["in_valid"]) {
                    echo '<p class="p"> password in valide</p>';
                }
                ?>
                <input class="valid" type="submit" value="log in" class="submit" name="login" id="submit">
                <?php
                if ($_SESSION["in_valid"]) {
                    echo ' <a href="#" class="p"> for get password </a>';
                }
                ?>
            </form>
        </div>
    </main>
    <?php
    include("./footer.php");
    ?>

    <script src="./main.js"></script>
</body>

</html>