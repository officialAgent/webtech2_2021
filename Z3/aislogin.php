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
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
include_once("config.php");
try {

    $conn = new PDO("mysql:host=$servername;dbname=z3", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();


}

if (isset($_POST['xname']) && !empty($_POST['xname']) ){

    $ldapuid = $_POST['xname'];
    $ldappass = $_POST['password'];

    $dn  = 'ou=People, DC=stuba, DC=sk';
    $ldaprdn  = "uid=$ldapuid, $dn";



    $ldapconn= ldap_connect("ldap.stuba.sk")
    or die("Could not connect to LDAP server");
    $set = ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    if ($ldapconn){
        $ldapbind = ldap_bind($ldapconn,$ldaprdn, $ldappass);

        if ($ldapbind){


            $results=ldap_search($ldapconn,$dn,"uid=$ldapuid",array("givenname","employeetype","surname","mail","faculty","cn","uisid","uid"),0,5);
            $info=ldap_get_entries($ldapconn,$results);

            $i=0;


            $sql = "SELECT id,name,surname,email,login   FROM users
            WHERE email=? ";
            $stm= $conn->prepare($sql);
            $stm->bindValue(1,$info[$i]['mail'][0]);
            $stm->execute();
            $rows = $stm->fetch(PDO::FETCH_ASSOC);

            if (!empty($rows)) {
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
                $stm3->bindValue(3,"AIS");
                $stm3->execute();
                header("location: index.php");

            } else {

                $sql = "INSERT INTO users  (login, name, surname,  email)
                VALUES (?,?,?,?)";
                $stm= $conn->prepare($sql);
                $i=0;
                $stm->bindValue(1,$info[$i]['cn'][0]);
                $stm->bindValue(2,$info[$i]['givenname'][0]);
                $stm->bindValue(3,$info[$i]['sn'][0]);
                $stm->bindValue(4,$info[$i]['mail'][0]);
                $stm->execute();

                $sql = "SELECT id,name,surname,email,login   FROM users
                WHERE email=? ";
                $stm= $conn->prepare($sql);
                $stm->bindValue(1,$info[$i]['mail'][0]);
                $stm->execute();
                $rows = $stm->fetch(PDO::FETCH_ASSOC);

                if (!empty($rows)) {
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
                    $stm3->bindValue(3,"AIS");
                    $stm3->execute();

                    header("location: index.php");

                }


            }


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

    echo "<br>";








}

   ?>



<form method="post"  id="twofac">
        <div class="heading">AIS Login:</div>
        <br /><br /><br />

        <label for="code">Ais name:</label> <br />
        <input required type="text" name="xname" id="codeinput" /> <br /><br /><br />
    <label for="code">Password</label> <br />
    <input required type="password" name="password" id="codeinput" /> <br /><br /><br />
        <input id="codecheck" type="submit" value="Login" />
        <a class="register" href="login.php" >
    Back to Login
</a>
    </form>







<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<script src="js.js"></script>





</body>

</html>
