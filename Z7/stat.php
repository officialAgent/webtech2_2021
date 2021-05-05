<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/css2.css">
    <link rel="stylesheet" href="css/css4.css" type="text/css">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js.js"></script>

</body>

</html>
