<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'config.php';

// Create connection
try {


    $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {

    echo "failed connection" . $e->getMessage();
    echo $servername;
}


if (isset($_GET['logemail']) && !empty($_GET['logemail']) && isset($_GET['logpassword'])&& !empty($_GET['logpassword'] ))
{


        $sql2 ="SELECT id, password, secret, role FROM users
        WHERE email=?";
        $stm2 = $conn->prepare($sql2);
        $stm2->bindValue(1,$_GET['logemail']);

        $stm2->execute();
        $rows = $stm2->fetch(PDO::FETCH_ASSOC);
        if (!empty($rows["id"] && password_verify($_GET["logpassword"],$rows["password"]))){
            unset($error2);
            setcookie('id', $rows['secret'], time() + (86400 * 30), "/"); // 86400 = 1 day

            if (intval($rows['role'])==1){
                header("location: student.php");
            }
            else{
                header("location: teacher.php");
            }

        }
        else{

           $error2='Failed Login ';
        }






}
