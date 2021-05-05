<?php


include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=zap", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}



if (isset($_POST['uid']) && !empty($_POST['uid']) ){

    $id=$_POST['uid'];
    $pass=$_POST['passid'];
    $sql="SELECT * from users WHERE id = '$id'  and password = '$pass'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();


$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {

    echo $row['id'];
    echo "<br>";
    echo $row['name'];
    echo "<br>";
    echo $row['password'];
    echo "<br>";
}


}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SQL Injection form error example</title>
    <meta name="description" content="Twitter Bootstrap Version2.0 form error example from w3resource.com."> <!--<link href="http://twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">--><style type="text/css">body{margin: 30px}:invalid { border-color:
                #e88;-webkit-box-shadow: 0 0 5px
        rgba(255, 0, 0, .8);-moz-box-shadow: 0 0 5px rbba(255, 0, 0, .8);-o-box-shadow: 0 0 5px rbba(255, 0, 0, .8);-ms-box-shadow: 0 0 5px rbba(255, 0, 0, .8);box-shadow:0 0 5px
        rgba(255, 0, 0, .8);}:required {border-color:
                #88a;-webkit-box-shadow: 0 0 5px
        rgba(0, 0, 255, .5);-moz-box-shadow: 0 0 5px
        rgba(0, 0, 255, .5);-o-box-shadow: 0 0 5px
        rgba(0, 0, 255, .5);-ms-box-shadow: 0 0 5px
        rgba(0, 0, 255, .5);box-shadow: 0 0 5px
        rgba(0, 0, 255, .5);}form {width:300px;margin: 20px auto;}input {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;border:1px solid
        #ccc;font-size:20px;width:300px;min-height:30px;display:block;margin-bottom:15px;margin-top:5px;outline: none;-webkit-border-radius:5px;-moz-border-radius:5px;-o-border-radius:5px;-ms-border-radius:5px;border-radius:5px;}input[type=submit] {background:
                #066923;padding:10px;color:
                #fff;}</style>
</head>
<body>
<form action="" method="POST"><label>User ID:</label><input type="text" id="uid" name="uid" placeholder="User ID" required><label>Password:</label><input type="password" id="passid" name="passid" required><input type="submit" value="Submit" />
</form>
</body>
</html>
