
<?php


if (isset($_POST["reg"])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password_U = htmlspecialchars(trim($_POST['password']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $password = htmlspecialchars(trim($_POST['dpassword']));
    if ($password_U === $password) {
        $hashed_password = password_hash($password_U, PASSWORD_DEFAULT);
        require("./conect.php");

        $get_email = "SELECT password_U FROM `users` WHERE Email_U='$email'";
        $result = mysqli_query($conn, $get_email);

        if (mysqli_fetch_assoc($result) > 0) {
            $_SESSION["valid_email"] = 1 ;
            header("location: /breif/regster.php");
            
        } else {
            $sql = "INSERT INTO `users` (`ID_U`, `Nom_U`, `Prenom_U`, `Email_U`, `D_Inscription`, `password_U`) 
    VALUES (NULL, '$username', '$prenom', '$email', CURRENT_DATE ,'$hashed_password')";
            $q = mysqli_query($conn, $sql);
            if ($q) {
                header("location: /breif/login.php");
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);

    } else { header("location: /breif/regster.php");}
    }






?>