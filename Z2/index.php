<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>

<body>

<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=z2web2", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}

$todel=$_GET['del'];
if ($_GET['del'])
{

    $stm3 = $conn->prepare("DELETE FROM osoby WHERE id=?");


    $stm3->bindValue(1,$todel);


    $stm3->execute();




}

$sql = "SELECT osoby.id AS oi, osoby.name, osoby.surname,uimestnenia.id, uimestnenia.placing,uimestnenia.discipline,oh.type,oh.year,oh.city,oh.country   FROM osoby,oh,uimestnenia  WHERE osoby.id = uimestnenia.person_id and oh_id=oh.id and uimestnenia.placing=1 ";


$order = isset($_GET['order']) ? $_GET['order'] : 'id';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'ASC';

$sort = ($sort == 'ASC') ? 'DESC' : 'ASC';



?>


<section>
    <!--for demo wrap-->
    <h1>Webtech Z2 - Tibor Ládi </h1>
    <h1>našich olympijských víťazov</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th onclick=" ">Name</th>
                <th><a href="?order=surname&sort=<?php echo $sort; ?>">Surname</th>
                <th><a href="?order=year&sort=<?php echo $sort; ?>">Year</th>
                <th>City</th>
                <th>Country</th>
                <th><a href="?order=type&sort=<?php echo $sort; ?>">Type</th>
                <th>Discipline</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php






            if (isset( $_GET['order']) &&   $_GET['order']== 'type'){

                $sql .= " ORDER BY type,year $sort";
            } elseif (isset( $_GET['order']) && $_GET['order'] == 'year') {

                $sql .= "ORDER BY $order $sort";
            } elseif (isset( $_GET['order']) && $_GET['order'] == 'surname') {
                $sql .= "ORDER BY $order $sort";
            } else {
                $sql .= " ORDER BY osoby.name";

            }

            /* echo $sql;
             echo "<br>";*/
            $stm = $conn->query($sql);


            $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {


                ?>


                <tr>
                    <td>
                        <a href='info.php?oi=<?php echo $row["oi"]?>'><?php  echo $row["name"];?></a>
                        </td>
                    <td><?php
                        echo $row["surname"];
                        ?> </td>
                    <td><?php
                        echo $row["year"];
                        ?></td>
                    <td><?php
                        echo $row["city"];
                        ?></td>
                    <td><?php
                        echo $row["country"];
                        ?></td>
                    <td><?php
                        echo $row["type"];
                        ?></td>
                    <td><?php
                        echo $row["discipline"];
                        ?></td>
                    <td><a href='edit.php?edit=<?php echo $row["id"]?>'><button class="btn draw-border">EDIT</button></a></td>
                    <td><a href='index.php?del=<?php echo $row["oi"]?>'><button class="btn draw-border" >DELETE</button></a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</section>


<section>
    <!--for demo wrap-->
    <h1>10 najúspešnejších olympionikov <br> podľa počtu získaných zlatých medailí </h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>

                <th>Name</th>
                <th>Surname</th>
                <th>Medals</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php


            $sql2 = "SELECT     osoby.id AS oi,  osoby.name,osoby.surname,uimestnenia.person_id,
                    SUM(CASE WHEN uimestnenia.placing=1 THEN 1 ELSE 0 END )  AS medals
                     FROM    osoby, uimestnenia WHERE osoby.id = uimestnenia.person_id
                    GROUP BY uimestnenia.person_id
                     ORDER BY medals DESC
                        LIMIT    10;
";


            $stm2 = $conn->query($sql2);


            $rows2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows2 as $row) {

                ?>


                <tr>
                    <td>
                        <a href='info.php?oi=<?php echo $row["oi"]?>'><?php  echo $row["name"];?></a>
                    </td>
                    <td><?php
                        echo $row["surname"];
                        ?> </td>
                    <td><?php
                        echo $row["medals"];
                        ?></td>

                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</section>
<div style="text-align:center;">
    <a href='addp.php'><button class="btn draw-border" >ADD Person </button></a>
    <a href='addd.php'><button class="btn draw-border" >ADD Discipline </button></a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
<script src="js.js"></script>
</body>

</html>



