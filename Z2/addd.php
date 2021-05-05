<!DOCTYPE HTML>
<html lang="sk">
<title>Olympijske hry</title>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css2.css">
</head>

<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("config.php");

// Create connection
try {

    $conn = new PDO("mysql:host=$servername;dbname=z2web2", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}

$sql = "SELECT id AS oi, name,surname FROM osoby";

echo "<br>";
$stm = $conn->query($sql);


$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['placing']) && !empty($_POST['placing']) && isset($_POST['discipline']) && !empty($_POST['discipline'])  )
{
    $sql = "INSERT INTO uimestnenia (person_id,oh_id,placing,discipline )
         VALUES (?,?,?,?)";
    $stm= $conn->prepare($sql);
    $stm->bindValue(1,$_POST["person"]);

    $stm->bindValue(2,$_POST["oh"]);

    $stm->bindValue(3,$_POST["placing"]);
    $stm->bindValue(4,$_POST["discipline"]);

    $stm->execute();

    $succes=1;


}
else{
    $succes= 0;

}

?>

<div >
    <form method="post">


        <h1>Add Discipline</h1>


        <div class="question">
            <select name="person" id="person">
                <?php

                foreach ($rows as $row) {


                    ?>
                    <option id="person" name="person" value="<?php echo $row["oi"]    ?>"><?php  echo $row["name"]; echo " "; echo $row["surname"];       ?></option>

                <?php
                }
                ?>

            </select>
            <label class="sellable">Person</label>
        </div>
        <div class="question">
            <select name="oh" id="oh">
                <?php

                $sql = "SELECT id, year, city, country FROM oh ";

                echo "<br>";
                $stm = $conn->query($sql);


                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach ($rows as $row) {


                    ?>
                    <option id="oh" name="oh" value="<?php echo $row["id"]    ?>"><?php echo $row["id"]; echo $row["year"]; echo " "; echo $row["city"];echo " "; echo $row["country"];       ?></option>

                    <?php
                }
                ?>

            </select>
            <label class="sellable">Olimpia</label>
        </div>

        <div class="question">
            <input  type="number" min="1" name="placing"  >
            <label class="sellable">Placing</label>
        </div>
        <div class="question">
            <input type="text" name="discipline"  >
            <label>Discipline</label>
        </div>


        <?php
        if ($succes==1){
            echo "<h1 style='text-align: center'>ADDED</h1>";
        }

        ?>
        <button type="submit" name="save">Save</button>
    </form>
    <?php


    ?>


</div>

<br>
<div style="text-align:center;">
    <a href='index.php'><button class="btn draw-border" >Home</button></a>
</div>
</body>
</html>