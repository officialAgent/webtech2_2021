<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}
if(isset($_POST['data']) ) {



    $sql = "INSERT INTO cheat (studentID,text,testID) 
         VALUES (?,?,?)";
    $stm = $conn->prepare($sql);
    $stm->bindValue(1, $_COOKIE["id"]);
    $stm->bindValue(2, $_POST['data']);
    $stm->bindValue(3, $_COOKIE["tcode"]);

    $stm->execute();
}