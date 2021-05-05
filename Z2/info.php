<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>

<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("config.php");
;
$todisplay=$_GET['oi'];
try {

    $conn = new PDO("mysql:host=$servername;dbname=z2web2", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}


if (isset($todisplay)){

$sql = "SELECT osoby.id, name,surname,birth_day,birth_place,birth_country,death_day,death_place,death_country,city,country,type,discipline,placing, year FROM osoby
        INNER JOIN uimestnenia ON osoby.id=uimestnenia.person_id
        INNER JOIN oh ON oh.id=uimestnenia.oh_id
        WHERE osoby.id= ?  ";




/* echo $sql;
             echo "<br>";*/

$stm = $conn->prepare($sql);
;

$stm->bindValue(1,$todisplay,PDO::PARAM_INT);


$stm->execute();



$rows = $stm->fetchAll(PDO::FETCH_ASSOC);


if ( !empty( $rows[0]["id"])){

?>


<section>
    <!--for demo wrap-->
    <h1>INFO about:</h1>
    <h1><?php

        echo $rows[0]["name"]; echo " "; echo $rows[0]["surname"];
        ?></h1>
    <h1><?php
        echo "Birth data:";
        echo "<br>";
        echo $rows[0]["birth_day"]; echo ", "; echo $rows[0]["birth_place"]; echo ", "; echo $rows[0]["birth_country"];
        ?></h1>
    <h1><?php
        echo "Death data:";
        echo "<br>";
        if ( !empty($rows[0]["death_day"])){
        echo $rows[0]["death_day"]; echo ", "; echo $rows[0]["death_place"]; echo ", "; echo $rows[0]["death_country"];
        }
        else{
            echo "Not dead yet";
        }
        ?></h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Type</th>
                <th>Year</th>
                <th>City</th>
                <th>Country</th>
                <th>Discipline</th>
                <th>Placing</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
<?php
foreach ($rows as $row) {


    ?>

                <tr>
                    <td><?php

                        echo $row["type"];
                        ?></td>
                    <td><?php
                        echo $row["year"];
                        ?> </td>
                    <td><?php
                        echo $row["city"];
                        ?></td>
                    <td><?php
                        echo $row["country"];
                        ?></td>
                    <td><?php
                        echo $row["discipline"];
                        ?></td>
                    <td><?php
                        echo $row["placing"];
                        ?></td>


                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</section>
<?php
}
else{
    echo "<h1>No Person found</h1>";
}
}
else{
    echo "<h1>No Person found</h1>";
}
?>

<div style="text-align:center;">
    <a href='index.php'><button class="btn draw-border" >Home</button></a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js.js"></script>
</body>

</html>

