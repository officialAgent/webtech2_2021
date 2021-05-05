<?php



/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
session_start();

if (!isset($_SESSION['email'])){
    $_SESSION['email']= $_COOKIE["session"];


}

if (isset($_SESSION['email']) && !empty($_SESSION['email'])){
    include_once("config.php");

    setcookie('session',$_SESSION['email'],time() + (86400 * 30));


    try {

        $conn = new PDO("mysql:host=$servername;dbname=z3", $username, $password);

        /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

    } catch (PDOException $e) {
        echo "failed connection" . $e->getMessage();
    }

    $sql = "SELECT id,name,surname,email ,login   FROM users
        WHERE email  = ? ";




    /* echo $sql;
                 echo "<br>";*/

    $stm = $conn->prepare($sql);
    ;

    $stm->bindValue(1,$_SESSION['email']);


    $stm->execute();



    $row = $stm->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $row['id'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css2.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    </head>
    <section style="text-align: center">
        <!--for demo wrap-->
        <h1>Hello &nbsp <?php echo $row["login"]; echo "           ";?>  &nbsp    AKA  &nbsp       <?php  echo " "; echo $row["name"] ?>  <?php echo $row["surname"] ?> </h1>
        <h1>Email:   <?php echo $row["email"] ?></h1>
        <h1>Welcome ></h1>

    </section>

    <a href="statistic.php">
    <button style="position: absolute; top: 255px; left: 46%;">Statistic</button>
    </a>
    <a href="logout.php">
        <button style="position: absolute; top: 380px; left: 46%;">Logout</button>
    </a>

    <!-- follow me template -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="js.js"></script>





    </body>

    </html>

    <?php
}
else{
    header("location: login.php");
}