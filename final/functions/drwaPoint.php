<?php
include_once("config.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {

    $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}

$sql="SELECT point from studentTest where studentID=? and testID=?";
$stm = $conn->prepare($sql);
$stm->bindValue(2,intval($_POST["testID"]) );
$stm->bindValue(1, $_POST["id"]);
$stm->execute();

$k=$stm->fetch();



$sql = "UPDATE studentTest set point=? where studentID=? and testID=?";
$stm = $conn->prepare($sql);
$stm->bindValue(1, $k['point'] + intval($_POST["data"]) );
$stm->bindValue(2, $_POST["id"]);
$stm->bindValue(3,intval($_POST["testID"]) );
$stm->execute();

$sql = "UPDATE draw set point=? where student_id=? and testCode=?";
$stm = $conn->prepare($sql);
$stm->bindValue(1, intval($_POST["data"]) );
$stm->bindValue(2, $_POST["id"]);
$stm->bindValue(3,intval($_POST["testID"]) );
$stm->execute();