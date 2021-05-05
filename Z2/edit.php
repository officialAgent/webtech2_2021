<!DOCTYPE HTML>
<html lang="sk">
<title>Olympijske hry</title>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css2.css">
</head>

<body>

<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

include_once("config.php");
$todisplay=$_GET['edit'];
// Create connection
try {

    $conn = new PDO("mysql:host=$servername;dbname=z2web2", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}
if (isset($_POST['name']) && !empty($_POST['name']) )
{
    $sql = "UPDATE osoby SET name=?, surname=?, birth_day=?, birth_place=?, birth_country=?,death_day=?,death_place=?,death_country=?
                WHERE id=?";
    $stm = $conn->prepare($sql);
    $stm->bindValue(1,$_POST["name"]);

    $stm->bindValue(2,$_POST["surname"]);
    $stm->bindValue(3,$_POST["birth_day"]);
    $stm->bindValue(4,$_POST["birth_place"]);
    $stm->bindValue(5,$_POST["birth_country"]);
    $stm->bindValue(6,$_POST["death_day"]);
    $stm->bindValue(7,$_POST["death_place"]);
    $stm->bindValue(8,$_POST["death_country"]);
    $stm->bindValue(9,$_POST["id"]);

    $stm->execute();

    // use exec() because no results are returned

    $succes=1;

}
else{
    $succes=0;
}




if (isset($todisplay) && !empty($todisplay)){
$sql = "SELECT osoby.id,name,surname,birth_place,city,country,birth_day,birth_place, birth_country,death_day,death_place,death_country FROM osoby
        INNER JOIN uimestnenia ON osoby.id=uimestnenia.person_id
        INNER JOIN oh ON oh.id=uimestnenia.oh_id
        WHERE uimestnenia.id=?  ";

  echo "<br>";
$stm = $conn->prepare($sql);


$stm->bindValue(1,$todisplay,PDO::PARAM_INT);


$stm->execute();

$row = $stm->fetchAll(PDO::FETCH_ASSOC);

/*var_dump($row);

echo $row[0]["id"];*/




if ( !empty( $row[0]["id"])){

?>

<div >
    <form  method="post">



        <h1>Edit Data for <?php echo $row[0]["name"]; ?> </h1>
        <div class="question">
            <input type="hidden" id="id" name="id" value= <?php echo $row[0]["id"]; ?> >

        </div>

        <div class="question">
            <input type="text" id="name" name="name" value= <?php echo $row[0]["name"]; ?> >
            <label>First Name</label>
        </div>
        <div class="question">
            <input type="text" name="surname" value= <?php echo $row[0]["surname"]; ?> >
            <label>Last Name</label>
        </div>
        <div class="question">
            <input type="text" name="birth_day" value= <?php echo $row[0]["birth_day"]; ?> >
            <label>Birth Day</label>
        </div>
        <div class="question">
            <input type="text" name="birth_place" value= <?php echo $row[0]["birth_place"]; ?> >
            <label>Birth Place</label>
        </div>
        <div class="question">
            <input type="text" name="birth_country" value= <?php echo $row[0]["birth_country"]; ?> >
            <label>Birth Country</label>
        </div>
        <div class="question">
            <input type="text" name="death_day" value= <?php echo $row[0]["death_day"]; ?> >
            <label>death Day</label>
        </div>
        <div class="question">
            <input type="text" name="death_place" value= <?php echo $row[0]["death_place"]; ?> >
            <label>death Place</label>
        </div>
        <div class="question">
            <input type="text" name="death_country" value= <?php echo $row[0]["death_country"]; ?> >
            <label>death Country</label>
        </div>





        <button type="submit" name="save">Save</button>
        <?php
        if ($succes==1){
            echo "<h1 style='text-align: center'>Updated</h1>";
        }

        ?>
    </form>
        <?php
        }else{
            echo "<h1>No Person found</h1>";
        }
        }
        else{
            echo "<h1>No Person found</h1>";
        }


    ?>

</div>

<br>
<div style="text-align:center;">
    <a href='index.php'><button class="btn draw-border" >Home</button></a>
</div>
</body>
</html>