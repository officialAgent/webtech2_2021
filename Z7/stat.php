<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/css2.css">
    <link rel="stylesheet" href="css/css4.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
</head>

<body>
<?php
include_once ('menu.php');

?>

<?php
include_once("config.php");
include_once("func.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=z7", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}

$sql = "SELECT * FROM pages
        WHERE name=?  ";
$stm = $conn->prepare($sql);
$stm->bindValue(1,pathinfo(__FILE__, PATHINFO_FILENAME));
$stm->execute();
$row99 = $stm->fetch(PDO::FETCH_ASSOC);
$sql = "UPDATE pages SET visited=?
                WHERE id=?";
$stm = $conn->prepare($sql);
$stm->bindValue(1,$row99['visited']+1);
$stm->bindValue(2,$row99['id']);
$stm->execute();


?>

<section>
    <!--for demo wrap-->
    <h1>Visited </h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>

                <th>Name</th>
                <th>Flag</th>
                <th>Visited</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php


            $sql2 = "SELECT *   
FROM countries   ";
            $stm2 = $conn->query($sql2);

            $rows2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows2 as $row) {

                ?>


                <tr>
                    <td>
                        <a href='info.php?id=<?php echo $row["id"]?>'><?php  echo $row["name"];?></a>
                    </td>
                    <td>

                    <img style="width: 50px;height: 50px" src=<?php echo $row["img"]  ?>>
                    </td>
                    <td><?php
                        echo $row["visited"];
                        ?></td>

                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</section>


<section>
    <!--for demo wrap-->
    <h1>Visited Pages</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>

                <th>Name</th>
                <th>Visited</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $sql = "SELECT * FROM pages ";
            $stm = $conn->prepare($sql);
            $stm->execute();
            $row99 = $stm->fetchAll(PDO::FETCH_ASSOC);

            foreach ($row99 as $row) {

                ?>


                <tr>

                    <td><?php
                        echo $row["name"];
                        ?></td>
                    <td><?php
                        echo $row["visited"];
                        ?></td>

                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</section>

<section>
    <!--for demo wrap-->
    <h1>Visited Hours</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>

                <th>6:00-15:00</th>
                <th>15:00-21:00</th>
                <th>21:00-24:00,</th>
                <th>24:00-6:00</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php

            $sql = "SELECT time FROM users ";
            $stm = $conn->prepare($sql);
            $stm->execute();
            $row99 = $stm->fetchAll(PDO::FETCH_ASSOC);


            $first=0;
            $second=0;
            $third=0;
            $fourth=0;
            foreach ($row99 as $row) {

                $dtime=$row['time'];
                $dtime=substr($dtime, 11, -12);

                if (intval($dtime)>=6 && intval($dtime)<=15){
                    $first++;
                }
                elseif (intval($dtime)>=15 && intval($dtime)<=21){
                    $second++;
                }
                elseif (intval($dtime)>=21 && intval($dtime)<=24){
                    $third++;
                }
                elseif (intval($dtime)>=24 && intval($dtime)<=6){
                    $fourth++;
                }

            }

                ?>


                <tr>

                    <td><?php
                        echo $first;
                        ?></td>

                    <td><?php
                        echo $second;
                        ?></td>

                    <td><?php
                        echo $third;
                        ?></td>
                    <td><?php
                        echo $fourth;
                        ?></td>
                </tr>
            <?php  ?>

            </tbody>
        </table>
    </div>
</section>


    <div style="height: 1000px; width: 80%;margin-left: 10%; margin-right: 10%; margin-bottom: 300px" id="mapid"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="js.js"></script>


<script>


    var mymap = L.map('mapid').setView([51.505, -0.09], 3);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);
</script>
    <?php



    $sql = "SELECT ip, lat, lon FROM users ";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $row99 = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach ($row99 as $row) {

        echo '<script>

  L.marker(['.$row["lat"].', '.$row["lon"].']).addTo(mymap)
        .bindPopup("'.$row["ip"].'")
        .openPopup();

</script>';

    }



    ?>




</body>

</html>
