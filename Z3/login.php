<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
</head>

<?php
session_start();

require_once 'google api/vendor/autoload.php';

include_once("config.php");
try {

    $conn = new PDO("mysql:host=$servername;dbname=z3", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();

}


// init configuration
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
$clientID = '858683866717-uppcn4sjoc5vrcm5k5uvtqsmv8ap5uqu.apps.googleusercontent.com';
$clientSecret = 'bEHwDdQgvZbG94KnxBgxMSOi';
$redirectUri = 'http://wt97.fei.stuba.sk/Z3/login.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $email =  $google_account_info->email;
    $namef =  $google_account_info->givenName;
    $namel =  $google_account_info->familyName;
    $name =  $google_account_info->name;



    $sql = "SELECT id FROM users
        WHERE  email=? ";
    $stm= $conn->prepare($sql);
    $stm->bindValue(1,$email);
    $stm->execute();
    $rows = $stm->fetch(PDO::FETCH_ASSOC);

    if (!empty($rows)){
        $_SESSION["email"] = $email;
        $_SESSION["namef"] = $namef;
        $_SESSION["namel"] = $namel;
        $_SESSION["username"] = $name;


        $sql =   "INSERT into logs (LOGIN_ID,log_date , TYPE)  VALUE (? , ?,?)";
        $stm3= $conn->prepare($sql);
        $stm3->bindValue(1,$rows['id']);
        date_default_timezone_set('Europe/Bratislava');
        $date = date('m/d/Y h:i:s a', time());
        $stm3->bindValue(1,$rows['id']);
        $stm3->bindValue(2,$date);
        $stm3->bindValue(3,"Google");
        $stm3->execute();

      header("location: index.php");
    }
    else{

        $sql = "INSERT INTO users  (login, name, surname,  email)
         VALUES (?,?,?,?)";
        $stm= $conn->prepare($sql);
        $stm->bindValue(1,$name);

        $stm->bindValue(2,$namef);
        $stm->bindValue(3,$namel);
        $stm->bindValue(4,$email);
        $stm->execute();

        $_SESSION["email"] = $email;
        $_SESSION["namef"] = $namef;
        $_SESSION["namel"] = $namel;
        $_SESSION["username"] = $name;

        $sql = "SELECT id FROM users
        WHERE  email=? ";
        $stm= $conn->prepare($sql);
        $stm->bindValue(1,$email);
        $stm->execute();
        $rows = $stm->fetch(PDO::FETCH_ASSOC);


        $sql =   "INSERT into logs (LOGIN_ID,log_date , TYPE)  VALUE (? , ?,?)";
        $stm3= $conn->prepare($sql);
        $stm3->bindValue(1,$rows['id']);
        date_default_timezone_set('Europe/Bratislava');
        $date = date('m/d/Y h:i:s a', time());
        $stm3->bindValue(1,$rows['id']);
        $stm3->bindValue(2,$date);
        $stm3->bindValue(3,"Google");
        $stm3->execute();

        header("location: index.php");

    }










    // now you can use this profile info to create account in your website and make user logged in.
} else {
    echo "<a href='".$client->createAuthUrl()."'>   </a>";
}
?>




<?php
if (isset($_POST['email']) && !empty($_POST['email']) ){

    $sql = "SELECT id, password FROM users
        WHERE  email=?";
    $stm= $conn->prepare($sql);
    $stm->bindValue(1,$_POST["email"]);
    $stm->execute();
    $rows = $stm->fetch(PDO::FETCH_ASSOC);
if (!empty($rows["id"] && password_verify($_POST["password"],$rows["password"]))){

    ?>
    <form method="post"  id="twofac">
        <div class="heading">Code:</div>
        <br /><br /><br />

        <input type="hidden" name="id" value="<?php echo $rows["id"] ?>">
        <label for="code">Code:</label> <br />
        <input required type="text" name="code" id="codeinput" /> <br /><br /><br />
        <input id="codecheck" type="submit" value="Submit" />
        <a class="register" href="login.php" >
            Back to Login
        </a>
    </form>
        <?php
}
else{



    ?>

    <form method="post"  id="twofac">
        <div class="heading">Wrong data try again</div>
        <br /><br /><br />

        <a class="register" href="login.php" >
            Back to Login
        </a>
        <br /><br /><br />
    </form>



<?php
}
}
else{

    ?>

<body>




<form method="post"  id="login-form">
    <div class="heading">Login </div>
    <div class="left">
        <label for="email">Email</label> <br />
        <input required type="email" name="email" id="email" /> <br />
        <label for="password">Password</label> <br />
        <input required type="password" name="password" id="pass" /> <br />
        <input type="submit" value="Login" />
        <a class="register" href="register.php" >
            Register
        </a>
    </div>
    <div class="right">
        <div class="connect">Connect with</div>
        <a style="margin: 0 0 0 0; padding: 0 0 0 0; " href="aislogin.php" >
            <!--       <span class="fontawesome-facebook"></span> -->
            <img id="stu"  src="img/stu_800-removebg-preview.png">
        </a> <br />

        <?php
        echo "<a href='".$client->createAuthUrl()."'>"; ?>
        <!--       <span class="fontawesome-google-plus"></span> -->
        <div class="google-btn">
            <div class="google-icon-wrapper">
                <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
            </div>
            <p class="btn-text"><b>Sign in with google</b></p>
        </div>
        </a>
    </div>
</form>


<?php


}
if (isset($_POST['code']) && !empty($_POST['code']) ){

    $sql = "SELECT id,name,surname,email,googleCode,login   FROM users
        WHERE id = ? ";
    $stm= $conn->prepare($sql);
    $stm->bindValue(1,$_POST["id"]);
    $stm->execute();
    $rows = $stm->fetch(PDO::FETCH_ASSOC);
    require_once 'GoogleAuthenticator-master/PHPGangsta/GoogleAuthenticator.php';

    $ga = new PHPGangsta_GoogleAuthenticator();
    $checkResult = $ga->verifyCode($rows["googleCode"], $_POST['code'], 2);
    // 2 = 2*30sec clock tolerance
    ////Every otp is valid for 30 sec.
    // If somebody provides OTP at 29th sec, by the time it reaches the server OTP is expired.
    //So we can give tolerance =1, it will check current  & previous OTP.
// tolerance =2, verifies current and last two OTPS
    if ($checkResult) {
        $_SESSION["email"] = $rows["email"];
        $_SESSION["namef"] =  $rows["name"];
        $_SESSION["namel"] =  $rows["surname"];
        $_SESSION["username"] =  $rows["login"];


        $sql =   "INSERT into logs (LOGIN_ID,log_date , TYPE)  VALUE (? , ?,?)";
        $stm3= $conn->prepare($sql);
        $stm3->bindValue(1,$rows['id']);
        date_default_timezone_set('Europe/Bratislava');
        $date = date('m/d/Y h:i:s a', time());
        $stm3->bindValue(1,$rows['id']);
        $stm3->bindValue(2,$date);
        $stm3->bindValue(3,"Login");
        $stm3->execute();

        header("location: index.php");
    } else {

        echo 'FAILED';
    }

}

   ?>








<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="js.js"></script>





</body>

</html>
