<?php

include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}
$sql = "select * from cheat  ;";
$stmt = $conn->prepare($sql);
$stmt->execute();


$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


$kons = 0;
foreach ($rows as $row) {

    $sql2 = "SELECT fname,lname FROM users
            WHERE secret = ?";
    $stm2 = $conn->prepare($sql2);
    $stm2->bindValue(1, $row['studentID']);
    $stm2->execute();
    $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);

    $myarray2['name'] = $dayMonth['fname'];
    $myarray2['lastname'] = $dayMonth['lname'];
    $myarray2['status'] = $row['text'];
    $myarray['' . $kons . ''] = $myarray2;

    $kons++;

}
$myarray['hossz'] = $kons;

echo json_encode($myarray, JSON_UNESCAPED_UNICODE);