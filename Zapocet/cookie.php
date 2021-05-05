<!doctype html>

<?php
setcookie('name','Tibor',0);

$cookie_name = "password";
$cookie_value = "admin123";

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=zap", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head>
<body>
<?php


if (isset($_POST['area'])){
    $sql = "INSERT INTO cookie (text) VALUES (?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_POST["area"]]);


}


?>
<h1>Používatel Admin</h1>
<div class="container">
    <form method="post" action=""  >
        <div class="form-group">
            <textarea id="area" name="area" class="form-control status-box" rows="3" placeholder="Enter your comment here..."></textarea>
        </div>

    <div class="button-group pull-right">
        <p class="counter">250</p>
        <button type="submit" class="btn btn-primary">Post</button>
    </div>
    </form>
    <ul class="posts">
        <?php


        $sql2 = "SELECT  text from cookie";


        $stm2 = $conn->query($sql2);


        $rows2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows2 as $row) {

        ?>

        <li> <?php echo $row['text']  ?></li>

        <?php } ?>

    </ul>
</div>



<script>
    var main = function() {
       /* $('.btn').click(function() {
            var post = $('.status-box').val();

            $('.status-box').val('');
            $('.counter').text('250');
            $('.btn').addClass('disabled');
        });*/
        $('.status-box').keyup(function() {
            var postLength = $(this).val().length;
            var charactersLeft = 250 - postLength;
            $('.counter').text(charactersLeft);
            if (charactersLeft < 0) {
                $('.btn').addClass('disabled');
            } else if (charactersLeft === 250) {
                $('.btn').addClass('disabled');
            } else {
                $('.btn').removeClass('disabled');
            }
        });
    }
    $('.btn').addClass('disabled');
    $(document).ready(main)

</script>
</body>
</html>