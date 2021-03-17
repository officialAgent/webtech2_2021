<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>

<body>

<!--<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>-->


<?php
if (isset($_GET["path"])) {
    $dir = "files/" . $_GET["path"] . "/";
    $szam = 5;
    $rend = 1;
} else {
    $dir = "files/";
    $szam = 0;
    $rend = 0;
}

?>


<h1><span class="blue">&lt;</span>DATA IN SERVER-Tibor Ládi<span class="blue">&gt


<table class="container sortable ">
    <thead>
    <tr>
        <th><h1>Name</h1></th>
        <th><h1>Size</h1></th>
        <th><h1>Date</h1></th>

    </tr>
    </thead>
    <tbody>
<?php

$adresar = scandir($dir);


foreach ($adresar as $polozka) {


    $link = "?path=" . $polozka;

    if ($rend == 1 && $szam == 5) {
        echo "<tr><td><a href='http://147.175.98.97/Z1/'>{$polozka}</a></td></tr>";
        $szam = 0;
        $rend = 0;
    }

    $szam++;
    if ($szam >= 3) {
        if (is_dir("files/" . $polozka)) {


            /* echo "<a href='".$link."'>{$polozka}</a>";
             echo "<br>";*/

            echo "<tr><td><a href='" . $link . "'>{$polozka}</a></td></tr>";


        } else {
            /* echo  $polozka. "<br>";
             echo  filesize("files/".$polozka). "<br>";*/
            echo "<tr><td>$polozka</td><td>" . filesize($dir . $polozka) . "</td><td>" . date("F d Y H:i:s.", filemtime($dir . $polozka)) . "</td></tr>";


        }
    }
}


?>
    </tbody>
</table>

  <a class="button circle" href="http://147.175.98.97/Z1/upsite.php">ADD FILE</a>



<script src="sortable.js"></script>
</body>

</html>












