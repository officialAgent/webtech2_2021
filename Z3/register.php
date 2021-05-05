<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css.css">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
</head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("config.php");
require_once 'GoogleAuthenticator-master/PHPGangsta/GoogleAuthenticator.php';
session_start();

try {

    $conn = new PDO("mysql:host=$servername;dbname=z3", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();

}
$factor=0;
if (isset($_POST['name']) && !empty($_POST['name']) ){

    $sql = "INSERT INTO users  (login, name, surname, password, email, googleCode)
         VALUES (?,?,?,?,?,?)";
    $stm= $conn->prepare($sql);
    $stm->bindValue(1,$_POST["login"]);

    $stm->bindValue(2,$_POST["name"]);
    $stm->bindValue(3,$_POST["surname"]);
    $passHash = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $stm->bindValue(4,$passHash);
    $stm->bindValue(5,$_POST["email"]);


    $sql2 ="SELECT id, login FROM users
        WHERE email=?";
    $stm2 = $conn->prepare($sql2);
    $stm2->bindValue(1,$_POST["email"]);



    $stm2->execute();
    $rows = $stm2->fetch(PDO::FETCH_ASSOC);
    if (!empty($rows["id"])){
        if ($_POST["login"] != $rows['login']) {
            echo "<h1 style='text-align: center; color: white'>This person is already in database <br> TRY AGAIN </h1>";
        }
        else{
            $factor=1;
        }
    }
    else{

     $factor=1;


    }

}
?>




<div>



        <?php

        if ($factor==0){

        ?>
        <form method="post" action="" id="login-form">
    <div class="heading">Login to Everdwell</div>
    <div class="left">
        <label for="email">Email</label> <br />
        <input required type="email" name="email" id="email" /> <br />

        <label for="password">Password</label> <br />
        <input required type="password" name="password" id="pass" /> <br />

        <label for="name">Name</label> <br />
        <input required type="text" name="name" id="pass" /> <br />

        <label for="surname">Surname</label> <br />
        <input  required type="text" name="surname" id="pass" /> <br />

        <label for="login">Login name</label> <br />
        <input required type="text" name="login" id="pass" /> <br />


        <input type="submit" value="Register" />

    </div>
    <div class="right">
        <a href=" login.php" class="register  " id="regbutton"> LOGIN </a>
            <!--       <span class="fontawesome-google-plus"></span> -->
    </div>
        </form>
<?php
}
        else {

            ?>

             <div id="twofac"

                <?php


            $ga = new PHPGangsta_GoogleAuthenticator();
            $secret = $ga->createSecret();
            $qrCodeUrl = $ga->getQRCodeGoogleUrl('WebZ3', $secret);
            echo "<h3 style='color: #e9544f'>Your Two-Factor Authentication QR code:  </h3>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<p>Scan this code:</p>";
            echo "<img id='qr' src=$qrCodeUrl>";
            echo "<br>";
            echo "<br>";
            echo "<p>1 - Open the Authenticator app on your device.</p>";
            echo "<br>";
            echo "<p>2 - tap + and read QR code</p>";
            echo "<br>";

            $stm->bindValue(6,$secret);
            $stm->execute();






?>
        <a href=" index.php" class="register  " id="regbutton2"> Continue </a>
        <br>
        <br>
        </div>
        <?php
        }
        ?>







<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<script src="js.js"></script>





</body>

</html>
