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


if (isset($_POST['fname']) && !empty($_POST['fname']) )
{


    if (!isset($_POST['lname']) && empty($_POST['lname'])){

        $error="Error in last name";

    }

    if (!isset($_POST['email']) && empty($_POST['email'])){

        $error="Error in email";
    }

    if (!isset($_POST['password']) && empty($_POST['password'])){

        $error="Error in password";
    }

    if (!isset($_POST['uid']) && empty($_POST['uid'])){

        $error="Error in uid";
    }
    if (!isset($_POST['role']) && empty($_POST['role'])){

        $error="Error in Role";
    }
    if ($_POST['role'] != "1" && $_POST['role'] != "2" ){
        $error="Error in Role";
    }


   else if (isset($_POST['uid']) && !empty($_POST['uid']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email'])&& isset($_POST['lname']) && !empty($_POST['lname']) && isset($_POST['role']) && !empty($_POST['role'])  ){


        $sql = "INSERT INTO users  (email,password,fname,lname,uid,role,secret)
         VALUES (?,?,?,?,?,?,?)";
        $stm= $conn->prepare($sql);
        $stm->bindValue(1,$_POST["email"]);
        $passHash = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $stm->bindValue(2,$passHash);
        $stm->bindValue(3,$_POST["fname"]);
        $stm->bindValue(4,$_POST["lname"]);
        $stm->bindValue(5,$_POST["uid"]);
        $stm->bindValue(6,$_POST["role"]);
        $stm->bindValue(7,"none");

        $sql2 ="SELECT id FROM users
        WHERE uid = ? && lname=?";
        $stm2 = $conn->prepare($sql2);
        $stm2->bindValue(1,$_POST["uid"]);
        $stm2->bindValue(2,$_POST["lname"]);

        $stm2->execute();
        $rows = $stm2->fetch(PDO::FETCH_ASSOC);
        if (!empty($rows["id"])){
            $error=' This person is already in database';
        }
        else{

            $stm->execute();
            $secret=$conn->lastInsertId();
            $sql = "UPDATE users set secret=? where id=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, hash('ripemd160',$secret ));
            $stm->bindValue(2, $secret);
            $stm->execute();

            unset($error);

        }


    }



}
