<?php
include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}

$sql = "UPDATE studentTest set status='finsihed' where studentID=? and testID=?";
$stm = $conn->prepare($sql);
$stm->bindValue(1, $_COOKIE["id"]);
$stm->bindValue(2, $_COOKIE["tcode"]);
$stm->execute();


$sql = "DELETE from timer  where studentID=? and testID=?";
$stm = $conn->prepare($sql);
$stm->bindValue(1, $_COOKIE["id"]);
$stm->bindValue(2, $_COOKIE["tcode"]);
$stm->execute();


