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
    $data = json_decode($_POST['data'],true);

    //$_POST['data'] contain the value that you sent via ajax
    //Do something









    $in=1;

    $sql = "INSERT INTO test (code,teacherID,time,status) 
         VALUES (?,?,?,?)";
    $stm= $conn->prepare($sql);
    $stm->bindValue(1,$_POST["code"]);
    $stm->bindValue(2,$_POST["tID"]);
    $stm->bindValue(3,intval($_POST["time"]));
    $stm->bindValue(4,"false");

    $stm->execute();


    $testID=$conn->lastInsertId();
   foreach ($data as  $d ){
     $type= $d['type'];




       $sql = "INSERT INTO question (testID,questionPosition,questionType,question,point) 
         VALUES (?,?,?,?,?)";
       $stm1= $conn->prepare($sql);
       $stm1->bindValue(1,intval($testID));
       $stm1->bindValue(2,$in);
       $in++;
       $stm1->bindValue(3,$type);
       $stm1->bindValue(4,$d["question"]);
       $stm1->bindValue(5,$d['point']);

       $stm1->execute();
       $qID=$conn->lastInsertId();

    if ($type == 'text'){





        $sql = "INSERT INTO text (questionID,answer) 
         VALUES (?,?)";
        $stm2= $conn->prepare($sql);
        $stm2->bindValue(1,$qID);
        $stm2->bindValue(2,$d['ans']);


        $stm2->execute();

    }
    elseif ($type == 'check'){
        $questionData = $d["q2dat"];

        foreach ($questionData as $qdata){
            $stm3 = $conn->prepare("INSERT INTO checkbox (questionID, checked, answer) VALUES (?,?,?)");
            $stm3->bindValue(1, $qID);
            $converted_res = $qdata["checked"]? 'true' : 'false';
            $stm3->bindValue(2, $converted_res);
            $stm3->bindValue(3, $qdata["ans"]);
            $stm3->execute();
        }
    }
    elseif ($type == 'drag'){
        $questionData = $d["q3dat"];

        foreach ($questionData as $qdata){
            $stm4 = $conn->prepare("INSERT INTO drag (questionID, data1, data2) VALUES (?,?,?)");
            $stm4->bindValue(1, $qID);
            $stm4->bindValue(2, $qdata["data1"]);
            $stm4->bindValue(3, $qdata["data2"]);
            $stm4->execute();
        }
    }



   }



}


