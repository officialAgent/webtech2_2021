<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=z6", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}





        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['day'] ) && isset($_GET['co'] ) && isset($_GET['mo'] ) ) {


            $sql2 ="SELECT id FROM days
            WHERE day = ? and month=?";
            $stm2 = $conn->prepare($sql2);
            $stm2->bindValue(1,$_GET['day']);
            $stm2->bindValue(2,$_GET['mo']);


            $stm2->execute();
            $dayid = $stm2->fetch(PDO::FETCH_ASSOC);





            $sql = "select value from records JOIN days d on records.day_id = d.id where day_id=? AND country_id=?;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$dayid['id']);
            $stmt->bindValue(2,$_GET['co']);
            $stmt->execute();


            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $kons=0;
              foreach ($rows as $row) {
                  $myarray[''. $kons .''] = $row['value'];

                  $kons++;

              }
            $myarray['hossz'] = $kons;

            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);

            /*echo json_encode( $data, JSON_UNESCAPED_UNICODE);*/
        }
        else  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['value'] ) && isset($_GET['co'] )  ) {

            $sql = "select day_id from records  where value=? AND country_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$_GET['value']);
            $stmt->bindValue(2,$_GET['co']);
            $stmt->execute();


            $rows = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql2 ="SELECT day, month FROM days
            WHERE id = ?";
            $stm2 = $conn->prepare($sql2);
            $stm2->bindValue(1,$rows['day_id']);
            $stm2->execute();
            $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);



            $myarray['nap'] = $dayMonth['day'];
            $myarray['honap'] = $dayMonth['month'];
            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);


        }


        else  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['skunnep'] )   ) {


            $sql = "select value, day_id from records  where type=? AND country_id=?;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,'holiday');
            $stmt->bindValue(2,4);
            $stmt->execute();


            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);







            $kons=0;
            foreach ($rows as $row) {

                $sql2 ="SELECT day, month FROM days
            WHERE id = ?";
                $stm2 = $conn->prepare($sql2);
                $stm2->bindValue(1,$row['day_id']);
                $stm2->execute();
                $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);

                $myarray2['nap'] = $dayMonth['day'];
                $myarray2['honap'] = $dayMonth['month'];
                $myarray2['unnep'] = $row['value'];
                $myarray[''. $kons .''] = $myarray2;

                $kons++;

            }
            $myarray['hossz'] = $kons;

            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);


        }

        else  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['czunnep'] )   ) {


            $sql = "select value, day_id from records  where type=? AND country_id=?;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,'holiday');
            $stmt->bindValue(2,6);
            $stmt->execute();


            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);







            $kons=0;
            foreach ($rows as $row) {

                $sql2 ="SELECT day, month FROM days
            WHERE id = ?";
                $stm2 = $conn->prepare($sql2);
                $stm2->bindValue(1,$row['day_id']);
                $stm2->execute();
                $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);

                $myarray2['nap'] = $dayMonth['day'];
                $myarray2['honap'] = $dayMonth['month'];
                $myarray2['unnep'] = $row['value'];
                $myarray[''. $kons .''] = $myarray2;

                $kons++;

            }
            $myarray['hossz'] = $kons;

            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);


        }

        else  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['sknap'] )   ) {


            $sql = "select value, day_id from records  where type=? AND country_id=?;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,'memorial');
            $stmt->bindValue(2,4);
            $stmt->execute();


            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);







            $kons=0;
            foreach ($rows as $row) {

                $sql2 ="SELECT day, month FROM days
            WHERE id = ?";
                $stm2 = $conn->prepare($sql2);
                $stm2->bindValue(1,$row['day_id']);
                $stm2->execute();
                $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);

                $myarray2['nap'] = $dayMonth['day'];
                $myarray2['honap'] = $dayMonth['month'];
                $myarray2['unnep'] = $row['value'];
                $myarray[''. $kons .''] = $myarray2;

                $kons++;

            }
            $myarray['hossz'] = $kons;

            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);


        }


        else  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['value'] ) && isset($_GET['nap'] ) && isset($_GET['honap'] ) ) {


            $sql2 ="SELECT id FROM days
            WHERE day = ? and month=?";
            $stm2 = $conn->prepare($sql2);
            $stm2->bindValue(1,$_GET['nap']);
            $stm2->bindValue(2,$_GET['honap']);


            $stm2->execute();
            $dayid = $stm2->fetch(PDO::FETCH_ASSOC);


            if (empty($dayid)){
                $sql = "INSERT INTO days (day,month)
                VALUES (?,?)";
                $stm= $conn->prepare($sql);
                $stm->bindValue(1,$_GET['nap']);

                $stm->bindValue(2,$_GET['honap']);
                $stm->execute();

                $sql2 ="SELECT id FROM days
                WHERE day = ? and month=?";
                $stm2 = $conn->prepare($sql2);
                $stm2->bindValue(1,$_GET['nap']);
                $stm2->bindValue(2,$_GET['honap']);


                $stm2->execute();
                $dayid = $stm2->fetch(PDO::FETCH_ASSOC);

            }

            $sql = "INSERT INTO records (day_id,country_id,type,value )
                VALUES (?,?,?,?)";
            $stm= $conn->prepare($sql);
            $stm->bindValue(1,$dayid['id']);

            $stm->bindValue(2,5);
            $stm->bindValue(3,'name');
            $stm->bindValue(4,$_GET['value']);
            $stm->execute();


            echo json_encode('Added',JSON_UNESCAPED_UNICODE);


        }
        ?>
