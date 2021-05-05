<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/css2.css">
</head>

<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("config.php");
;
$todisplay=$_GET['id'];
try {

    $conn = new PDO("mysql:host=$servername;dbname=z7", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}


if (isset($todisplay)){

    $sql = "SELECT  users.visited as uv, users.*,countries.*
FROM users
INNER JOIN countries
ON users.coID = countries.id where coID = ?  ";
    $stm = $conn->prepare($sql);
    $stm->bindValue(1,$todisplay);
    $stm->execute();

    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);


    if ( !empty( $rows[0]["id"])){

        ?>


        <section>
            <!--for demo wrap-->
            <h1>INFO about:</h1>
            <h1><?php

                echo $rows[0]['name'];
                ?></h1>

            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                    <tr>
                        <th>IP</th>
                        <th>LAT</th>
                        <th>LON</th>
                        <th>City</th>
                        <th>Visited</th>
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

                                echo $row["ip"];
                                ?></td>
                            <td><?php
                                echo $row["lat"];
                                ?> </td>
                            <td><?php
                                echo $row["lon"];
                                ?></td>
                            <td><?php
                                echo $row["city"];
                                ?></td>
                            <td><?php
                                echo $row["uv"];
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
        echo "<h1>Error</h1>";
    }

}
else{
    echo "<h1>Error</h1>";
}
?>

<div style="text-align:center;">
    <a href='stat.php'><button class="btn draw-border" >Home</button></a>
</div>

</body>

</html>

