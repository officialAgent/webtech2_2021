<?php
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
/*$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));*/

/*var_dump($_FILES);*/

/*echo '<br>';
var_dump($_POST);
echo '<br>';*/
/*array(1) { ["fileToUpload"]=> array(5) { ["name"]=> string(5) "2.jpg" ["type"]=> string(10) "image/jpeg" ["tmp_name"]=> string(14) "/tmp/phpRB1c5D" ["error"]=> int(0) ["size"]=> int(201647) } }
File is an image - image/jpeg.The file 2.jpg has been uploaded.*/
// Check if image file is a actual image or fake image

/*array(1) { ["fileToUpload"]=> array(5) { ["name"]=> string(14) "app-iPhone.png" ["type"]=> string(9) "image/png" ["tmp_name"]=> string(14) "/tmp/phpZwD3zU" ["error"]=> int(0) ["size"]=> int(180169) } }*/
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
$rossz = 0;

if (!empty($_POST["name"])) {

    $nev = $_POST["name"];
    function replaceAccents($str)
    {

        $search = explode(",", "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,ø,Ø,Å,Á,À,Â,Ä,È,É,Ê,Ë,Í,Î,Ï,Ì,Ò,Ó,Ô,Ö,Ú,Ù,Û,Ü,Ÿ,Ç,Æ,Œ");

        $replace = explode(",", "c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,o,O,A,A,A,A,A,E,E,E,E,I,I,I,I,O,O,O,O,U,U,U,U,Y,C,AE,OE");

        return str_replace($search, $replace, $str);
    }


    $str = replaceAccents($nev);

    $nev = $str;


    $filename = $_FILES["fileToUpload"]["name"];
    $szam = strrpos($filename, ".");
    $szam2 = strlen($filename);
    $ertek = (int)$szam2 - (int)$szam;
    $vegzodes = substr($filename, -$ertek);  // returns ".jpg stb"
    $_FILES["fileToUpload"]["name"] = $nev . $vegzodes;


}

$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// Check if file already exists
if (file_exists($target_file)) {


    $filename = $_FILES["fileToUpload"]["name"];


    $szam = strrpos($filename, ".");
    $szam2 = strlen($filename);
    $ertek = (int)$szam2 - (int)$szam;
    $newFileName = substr($filename, 0, (strrpos($filename, ".")));
    $vegzodes = substr($filename, -$ertek);  // returns ".jpg stb"


//$newFileName will now be abc.def
    $date = date('Y-m-d H:i:s');
    $nev = $newFileName . "-" . $date;
    $_FILES["fileToUpload"]["name"] = $nev . $vegzodes;

}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 20000000) {
    $message = "Sorry, your file is too large. MAX upload size is 2MB";
    $uploadOk = 0;
}
/*
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    /* $message= "Sorry, your file was not uploaded.";*/
    $rossz = 1;
// if everything is ok, try to upload file


    /*move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/upload/{$file_name}.mp4");*/

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $message = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";


    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="succes.css">
</head>

<body>


<?php if ($rossz == 1) { ?>


    <div class='error-message'>
        <span class='error-text'><?php $message ?></span>
        <p>Rediriect in 5 sec...</p>
    </div>
<?php } else { ?>

    <div class='success-message'>
        <svg viewBox='0 0 76 76' class='success-message__icon icon-checkmark'>
            <circle cx='38' cy='38' r='36'/>
            <path fill='none' stroke='#FFFFFF' stroke-width='5' stroke-linecap='round' stroke-linejoin='round'
                  stroke-miterlimit='10' d='M17.7,40.9l10.9,10.9l28.7-28.7'/>
        </svg>
        <h1 class='success-message__title'>File Uploaded</h1>
        <div class='success-message__content'>
            <p><?php $message ?></p>


            <p>Rediriect in 5 sec...</p>
        </div>
    </div>

    <?php

}
 header( "refresh:10;url=index.php" );
?>


<script src="succes.js"></script>
</body>

</html>