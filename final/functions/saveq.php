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


if(isset($_POST['data']) ){
    //$_POST['data'] contain the value that you sent via ajax
    //Do something

    $data = json_decode($_POST['data'],true);




var_dump($data);


    $in=0;
   foreach ($data as  $d ){
     $type= $d['type'];



       $sql = "INSERT INTO test (code,teacherID,time,status) 
         VALUES (?,?,?,?)";
       $stm= $conn->prepare($sql);
       $stm->bindValue(1,$_POST["code"]);
       $stm->bindValue(2,$_POST["tID"]);
       $stm->bindValue(3,intval($_POST["time"]));
       $stm->bindValue(4,"false");

       $stm->execute();


       $testID=$conn->lastInsertId();

       $sql = "INSERT INTO question (testID,questionPosition,questionType,question,point) 
         VALUES (?,?,?,?,?)";
       $stm= $conn->prepare($sql);
       $stm->bindValue(1,intval($testID));
       $stm->bindValue(2,$in);
       $in++;
       $stm->bindValue(3,$type);
       $stm->bindValue(4,$d["question"]);
       $stm->bindValue(5,$d['point']);

       $stm->execute();
       $qID=$conn->lastInsertId();

    if ($type == 'text'){





        $sql = "INSERT INTO text (questionID,answer) 
         VALUES (?,?)";
        $stm= $conn->prepare($sql);
        $stm->bindValue(1,$qID);
        $stm->bindValue(2,$d['ans']);


        $stm->execute();

    }
   }



}


