<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
    <link rel="stylesheet" type="text/css" href="css2.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans"/>
</head>

<section>
    <!--for demo wrap-->
    <h1>Logs</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Log Date</th>
                <th>Type</th>

            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
            session_start();
            include_once("config.php");

            try {

                $conn = new PDO("mysql:host=$servername;dbname=z3", $username, $password);

                /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

            } catch (PDOException $e) {
                echo "failed connection" . $e->getMessage();
            }

            $sql = "SELECT log_date,type   FROM logs
        WHERE login_id  = ? ";
            $stm = $conn->prepare($sql);

            $stm->bindValue(1, $_SESSION['id']);

            $stm->execute();

            $rows = $stm->fetchAll(PDO::FETCH_ASSOC);


            foreach ($rows as $row) {


                ?>


                <tr>
                    <td>
                        <?php echo $row["log_date"] ?>
                    </td>
                    <td><?php
                        echo $row["type"];
                        ?> </td>

                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</section>

<?php

$sql = "SELECT COUNT(id)
FROM logs where type = 'Google';";
$stm = $conn->prepare($sql);

$stm->execute();

$row4 = $stm->fetch(PDO::FETCH_ASSOC);

$google= intval($row4['COUNT(id)']);

$sql = "SELECT COUNT(id)
FROM logs where type = 'AIS';";
$stm = $conn->prepare($sql);

$stm->execute();

$row4 = $stm->fetch(PDO::FETCH_ASSOC);

$ais= intval($row4['COUNT(id)']);

$sql = "SELECT COUNT(id)
FROM logs where type = 'Login';";
$stm = $conn->prepare($sql);

$stm->execute();

$row4 = $stm->fetch(PDO::FETCH_ASSOC);

$login= intval($row4['COUNT(id)']);


$countall= $login+$ais+$google;

$googleGraph= round($google/$countall,2) ;
$aisGraph=round( $ais/$countall,2)  ;
$loginGraph=round($login/$countall,2) ;



?>

<table id="column-example-1" class="charts-css column">
    <h1>Statistic from logs:</h1>
    <caption> Column Example #1</caption>
    <tbody>
    <tr>
        <td style="--size:<?php echo $loginGraph?>;--color:#DB4437"> Login <br> <?php echo $login; ?> times </td>
    </tr>
    <tr>
        <td style="--size:<?php echo $googleGraph?>;--color: #4285F4 ">Google<br> <?php echo $google; ?> times </td>
    </tr>
    <tr>
        <td style="--size:<?php echo $aisGraph?>;--color:#631212 ">AIS<br> <?php echo $ais; ?> times</td>
    </tr>

    </tbody>
</table>

<a href="index.php">
    <button style="position: absolute; top: 830px; left: 46%;">back</button>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>

<script src="js.js"></script>


</body>

</html>