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
$tcode=$_GET["data"];
$sql = "select * from studentTest where testID='$tcode' ;";
$stmt = $conn->prepare($sql);
$stmt->execute();


$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


$kons=0;
foreach ($rows as $row) {

    $sql2 ="SELECT fname,lname,secret FROM users
            WHERE secret = ?";
    $stm2 = $conn->prepare($sql2);
    $stm2->bindValue(1,$row['studentID']);
    $stm2->execute();
    $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);

    $myarray2['name'] = $dayMonth['fname'];
    $myarray2['lastname'] = $dayMonth['lname'];
    $myarray2['studentID'] = $dayMonth['secret'];
    $myarray2['testID'] = $row['testID'];
    $myarray2['status'] = $row['status'];
    $myarray[''. $kons .''] = $myarray2;

    $kons++;

}
$myarray['hossz'] = $kons;

echo json_encode($myarray,JSON_UNESCAPED_UNICODE);