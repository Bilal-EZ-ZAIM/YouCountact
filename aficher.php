<?php
require("./conect.php");
session_start();
if (!$_SESSION["glob_ID"]) {
    header("location: /breif/login.php");
}
$Id_User = $_SESSION["id_user"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../index.css">
</head>
<body>


<?php
if (isset($_POST["insert"])) {
    require("./conect.php");
    $id = $_SESSION["id_user"];


    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $address = htmlspecialchars(trim($_POST['address']));
    
    $sql = "INSERT INTO `contacts` (`ID_C`, `Nom_C`, `Telephone`, `Email_C`, `D_Cree`, `Address`, `ID_US`) 
    VALUES (NULL, '$nom', '$telephone', '$email', CURRENT_DATE ,'$address', $id)";
    $q = mysqli_query($conn , $sql) ;
    if ($q) {
        header("location: /breif/profile.php");
        echo "fffffffffff";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("/breif/profile.php");
    }

    mysqli_close($conn);

}


?>

 
</body>
</html>