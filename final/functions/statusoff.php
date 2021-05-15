<?php
include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}

$sql = "UPDATE test set status='false' where code=?";
$stm = $conn->prepare($sql);
$stm->bindValue(1, $_GET['data']);
$stm->execute();
