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
        $sql = "INSERT INTO osoby  (name, surname, birth_day, birth_place, birth_country,death_day,death_place,death_country)
         VALUES (?,?,?,?,?,?,?,?)";
        $stm= $conn->prepare($sql);
        $stm->bindValue(1,$_POST["name"]);

        $stm->bindValue(2,$_POST["surname"]);
        $stm->bindValue(3,$_POST["birth_day"]);
        $stm->bindValue(4,$_POST["birth_place"]);
        $stm->bindValue(5,$_POST["birth_country"]);
        $stm->bindValue(6,$_POST["death_day"]);
        $stm->bindValue(7,$_POST["death_place"]);
        $stm->bindValue(8,$_POST["death_country"]);

        $sql2 ="SELECT id FROM osoby
        WHERE name = ? && surname=?";
        $stm2 = $conn->prepare($sql2);
        $stm2->bindValue(1,$_POST["name"]);
        $stm2->bindValue(2,$_POST["surname"]);


        $stm2->execute();
        $rows = $stm2->fetch(PDO::FETCH_ASSOC);
        if (!empty($rows["id"])){
            echo "<h1 style='text-align: center'>This person is already in database <br> No changes made <br> TRY AGAIN </h1>";
        }
        else{
            $stm->execute();
            $succes=1;
        }




    }else{
        $succes=0;
    }




?>

<div >
    <form method="post">


        <h1>Add New Person</h1>


        <div class="question">
            <input type="text" name="name"  >
            <label>First Name</label>
        </div>
        <div class="question">
            <input type="text" name="surname"  >
            <label>Last Name</label>
        </div>
        <div class="question">
            <input type="text" name="birth_day">
            <label>Birth Day</label>
        </div>
        <div class="question">
            <input type="text" name="birth_place" >
            <label>Birth Place</label>
        </div>
        <div class="question">
            <input type="text" name="birth_country" >
            <label>Birth Country</label>
        </div>
        <div class="question">
            <input type="text" name="death_day" >
            <label>death Day</label>
        </div>
        <div class="question">
            <input type="text" name="death_place" v >
            <label>death Place</label>
        </div>
        <div class="question">
            <input type="text" name="death_country"  >
            <label>death Country</label>
        </div>





        <button type="submit" name="save">Save</button>
        <?php
        if ($succes==1){
            echo "<h1 style='text-align: center'>ADDED</h1>";
        }

        ?>
    </form>


</div>

<br>
<div style="text-align:center;">
    <a href='index.php'><button class="btn draw-border" >Home</button></a>
</div>
</body>
</html>