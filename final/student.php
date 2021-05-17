
<?php
//die("Hello");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/student.css" type="text/css">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>


<?php

                            include_once("config.php");

                            try {

                                $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);

                                /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

                            } catch (PDOException $e) {
                                echo "failed connection" . $e->getMessage();
                            }


if (isset($_GET['examID']) && !empty($_GET['examID'])){

    $sql = "SELECT * from test    WHERE code= ? and status='true'  ";

    $stm = $conn->prepare($sql);

    $stm->bindValue(1,$_GET['examID']);
    $stm->bindValue(1,$_GET['examID']);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);

    if (empty($row)){

        $codeERROR='Wrong code or test is offline';
    }
    else{

        $sql = "SELECT * from studentTest   WHERE testID= ? and studentID=?  ";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1,$_GET['examID']);
        $stm->bindValue(2,$_COOKIE['id']);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);

        if (empty($row)){
        setcookie('tcode',$_GET['examID'], time() + (86400 * 30), "/"); // 86400 = 1 day
        $tempcookie=$_GET['examID'];

        $sql = "INSERT INTO studentTest (studentID,testID,status) 
         VALUES (?,?,?)";
        $stm= $conn->prepare($sql);
        $stm->bindValue(1,$_COOKIE["id"]);
        $stm->bindValue(2,$tempcookie);
        $stm->bindValue(3,"working");

        $stm->execute();
        echo '<script>window.location="test.php"</script>';
        }
        else{
            $codeERROR='You completed this test already';
        }
    }
}


?>
<body class="profile-page">
<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg "  color-on-scroll="100"  id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html" target="_blank">Profile </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <script>
                    function logout()
                    {document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });



                    }</script>
                <li class="nav-item">
                    <a class="nav-link" href="index.php" onclick="logout()">
                        <i class="material-icons">logout</i>Logout
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="page-header header-filter" data-parallax="true" style="    font-family: 'Lato', sans-serif;
    font-weight: 400;
    font-size: 16px;
    line-height: 1.7;
    background: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuMCIgeTE9IjAuNSIgeDI9IjEuMCIgeTI9IjAuNSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzI3MjgzOCIvPjxzdG9wIG9mZnNldD0iMzMuMzMzMzMlIiBzdG9wLWNvbG9yPSIjMmIyZDQxIi8+PHN0b3Agb2Zmc2V0PSI2Ni42NjY2NyUiIHN0b3AtY29sb3I9IiMzOTM1NDkiLz48c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM0MzM1NDUiLz48L2xpbmVhckdyYWRpZW50PjwvZGVmcz48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyYWQpIiAvPjwvc3ZnPiA=');
    background: -webkit-gradient(linear, 0% 50%, 100% 50%, color-stop(0%, #272838), color-stop(33.33333%, #2b2d41), color-stop(66.66667%, #393549), color-stop(100%, #433545));
    background: -moz-linear-gradient(left, #272838, #2b2d41, #393549, #433545);
    background: -webkit-linear-gradient(left, #272838, #2b2d41, #393549, #433545);
    background: linear-gradient(to right, #272838, #2b2d41, #393549, #433545);
background-size: contain"></div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik00MjkuNjYzLDIyMC41MTdjMC0wLjA0OCwwLjAwNi0wLjA5NiwwLjAwNi0wLjE0NUM0MjkuNjY5LDE5MC44NzEsMzUxLjkxNSwwLDI1NiwwICBTODIuMzMxLDE5MC44NzEsODIuMzMxLDIyMC4zNzJjMCwwLjA0OCwwLjAwNiwwLjA5NiwwLjAwNiwwLjE0NWMwLDAuMDQ1LTAuMDA2LDAuMDkxLTAuMDA2LDAuMTM2ICBjMCwyNy40ODEsMTE3LjA5NywxNzEuOTQ5LDE3My42NjksMTcxLjk0OWM1NS4zNTYsMCwxNzMuNjY5LTE0NC40NjgsMTczLjY2OS0xNzEuOTQ5YzAtMC4wNDctMC4wMDYtMC4wOTQtMC4wMDYtMC4xNCAgQzQyOS42NjMsMjIwLjUxNCw0MjkuNjYzLDIyMC41MTUsNDI5LjY2MywyMjAuNTE3eiIgZmlsbD0iIzEzNTM3MCIgZGF0YS1vcmlnaW5hbD0iIzEzNTM3MCI+PC9wYXRoPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPHBhdGggc3R5bGU9IiIgZD0iTTM3Mi4wMzksMjE2LjYxMWgtMTkuNzI0di01Ny4yMDJoMTkuNzI0YzEwLjE2NCwwLDE4LjQwNCw4LjI0LDE4LjQwNCwxOC40MDR2MjAuMzk0ICAgQzM5MC40NDMsMjA4LjM3MiwzODIuMjAzLDIxNi42MTEsMzcyLjAzOSwyMTYuNjExeiIgZmlsbD0iI2Y0Yzg5MiIgZGF0YS1vcmlnaW5hbD0iI2Y0Yzg5MiI+PC9wYXRoPgoJPHBhdGggc3R5bGU9IiIgZD0iTTEzOS45NjEsMjE2LjYxMWgxOS43MjR2LTU3LjIwMmgtMTkuNzI0Yy0xMC4xNjQsMC0xOC40MDQsOC4yNC0xOC40MDQsMTguNDA0djIwLjM5NCAgIEMxMjEuNTU3LDIwOC4zNzIsMTI5Ljc5NiwyMTYuNjExLDEzOS45NjEsMjE2LjYxMXoiIGZpbGw9IiNmNGM4OTIiIGRhdGEtb3JpZ2luYWw9IiNmNGM4OTIiPjwvcGF0aD4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPHBhdGggc3R5bGU9IiIgZD0iTTMyMy4xODYsMzE4LjQ3NWwtMTIuNDQyLTIuNTAxYy04LjgyOC0xLjc3NC0xNS4xOC05LjUyOS0xNS4xOC0xOC41MzR2LTE3LjkyNmgtODEuMzgydjE4LjM3OSAgIGMwLDkuMDA1LTYuMzUxLDE2Ljc2LTE1LjE4LDE4LjUzNGwtMTAuMTg5LDIuMDQ4djY4LjQzMmgxMzQuMzcydi02OC40MzJIMzIzLjE4NnoiIGZpbGw9IiNmZWQ5YTgiIGRhdGEtb3JpZ2luYWw9IiNmZWQ5YTgiPjwvcGF0aD4KCTxwYXRoIHN0eWxlPSIiIGQ9Ik0yNTYsMjkzLjAwN0wyNTYsMjkzLjAwN2MtNTguNzU0LDAtMTA2LjM4NC00Ny42My0xMDYuMzg0LTEwNi4zODR2LTI5Ljg5NyAgIGMwLTU4Ljc1NCw0Ny42My0xMDYuMzg0LDEwNi4zODQtMTA2LjM4NGwwLDBjNTguNzU0LDAsMTA2LjM4NCw0Ny42MywxMDYuMzg0LDEwNi4zODR2MjkuODk3ICAgQzM2Mi4zODQsMjQ1LjM3NywzMTQuNzU0LDI5My4wMDcsMjU2LDI5My4wMDd6IiBmaWxsPSIjZmVkOWE4IiBkYXRhLW9yaWdpbmFsPSIjZmVkOWE4Ij48L3BhdGg+CjwvZz4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMjU2LDUwLjM0MkwyNTYsNTAuMzQyYy05LjYwMSwwLTE4LjkwMiwxLjI3OS0yNy43NSwzLjY2NCAgYzQ1LjI5NiwxMi4yMDcsNzguNjM0LDUzLjU2Nyw3OC42MzQsMTAyLjcydjI5Ljg5N2MwLDQ5LjE1My0zMy4zMzgsOTAuNTEyLTc4LjYzNCwxMDIuNzJjOC44NDgsMi4zODQsMTguMTQ5LDMuNjY0LDI3Ljc1LDMuNjY0bDAsMCAgYzU4Ljc1NCwwLDEwNi4zODQtNDcuNjMsMTA2LjM4NC0xMDYuMzg0di0yOS44OTdDMzYyLjM4NCw5Ny45NzIsMzE0Ljc1NCw1MC4zNDIsMjU2LDUwLjM0MnoiIGZpbGw9IiNmNGNlOWYiIGRhdGEtb3JpZ2luYWw9IiNmNGNlOWYiPjwvcGF0aD4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMjU2LDE1OS44ODNjOTUuNzU3LDAsMTczLjQwOSwzMy4xNzksMTczLjY2Myw2MC42MzRjMC0wLjA0OCwwLjAwNi0wLjA5NiwwLjAwNi0wLjE0NSAgQzQyOS42NjksMTkwLjg3MSwzNTEuOTE1LDAsMjU2LDBTODIuMzMxLDE5MC44NzEsODIuMzMxLDIyMC4zNzJjMCwwLjA0OCwwLjAwNiwwLjA5NiwwLjAwNiwwLjE0NSAgQzgyLjU5MSwxOTMuMDYyLDE2MC4yNDMsMTU5Ljg4MywyNTYsMTU5Ljg4M3oiIGZpbGw9IiMxZTYwOGIiIGRhdGEtb3JpZ2luYWw9IiMxZTYwOGIiIGNsYXNzPSIiPjwvcGF0aD4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMjU2LDBjLTguNDQ1LDAtMTYuNzQ5LDEuNDg2LTI0Ljg3Miw0LjIwNUMyOTMuMDcxLDI0Ljk0LDM0NC40NiwxMTcuNzM0LDM2Ny4yNTksMTc1Ljk4ICBjMzguMDI1LDEyLjEyNSw2Mi4yNjIsMjkuMjIxLDYyLjQwNCw0NC41MzdjMC0wLjA0OCwwLjAwNi0wLjA5NiwwLjAwNi0wLjE0NUM0MjkuNjY5LDE5MC44NzEsMzUxLjkxNSwwLDI1NiwweiIgZmlsbD0iIzEzNTM3MCIgZGF0YS1vcmlnaW5hbD0iIzEzNTM3MCI+PC9wYXRoPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik00OTAuNTEsNTAwLjM4OGMtNC42MjUtMzQuMDEtMjMuNDIzLTEzMi42My04Ny45ODktMTU4LjUzOGwtNzMuNjQzLTIyLjk2MUgxODMuMTIyTDEwOS40OCwzNDEuODUgIGMtNjQuNTY2LDI1LjkwOC04My4zNjUsMTI0LjUyNy04Ny45OSwxNTguNTM4QzIwLjY1NCw1MDYuNTM0LDI1LjQ0Nyw1MTIsMzEuNjUsNTEyaDQ0OC43ICBDNDg2LjU1Myw1MTIsNDkxLjM0Niw1MDYuNTM0LDQ5MC41MSw1MDAuMzg4eiIgZmlsbD0iIzFlNjA4YiIgZGF0YS1vcmlnaW5hbD0iIzFlNjA4YiIgY2xhc3M9IiI+PC9wYXRoPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik00OTAuNTEsNTAwLjM4OGMtNC42MjUtMzQuMDEtMjMuNDIzLTEzMi42My04Ny45ODktMTU4LjUzOGwtNzMuNjQzLTIyLjk2MWgtNTYuNzAzbDczLjY0MywyMi45NjEgIEM0MjQuMjI0LDM3My4zMTIsNDM1LjEzOSw1MTIsNDM1LjEzOSw1MTJoNDUuMjExQzQ4Ni41NTMsNTEyLDQ5MS4zNDYsNTA2LjUzNCw0OTAuNTEsNTAwLjM4OHoiIGZpbGw9IiMxMzUzNzAiIGRhdGEtb3JpZ2luYWw9IiMxMzUzNzAiPjwvcGF0aD4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNNDAxLjU5NiwzMTUuMTYzSDExMC40MDRjLTkuNjY0LDAtMTcuNDk4LDcuODM0LTE3LjQ5OCwxNy40OThWNDk4LjU5aDMyNi4xODlWMzMyLjY2MSAgQzQxOS4wOTQsMzIyLjk5Nyw0MTEuMjYsMzE1LjE2Myw0MDEuNTk2LDMxNS4xNjN6IiBmaWxsPSIjY2ZjZmNmIiBkYXRhLW9yaWdpbmFsPSIjY2ZjZmNmIj48L3BhdGg+CjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3R5bGU9IiIgZD0iTTQwMS41OTcsMzE1LjE2M2gtNTUuNWM5LjY2NCwwLDE3LjQ5OCw3LjgzNCwxNy40OTgsMTcuNDk4VjQ5OC41OWg1NS41VjMzMi42NjEgIEM0MTkuMDk0LDMyMi45OTcsNDExLjI2LDMxNS4xNjMsNDAxLjU5NywzMTUuMTYzeiIgZmlsbD0iI2MyYzRjNiIgZGF0YS1vcmlnaW5hbD0iI2MyYzRjNiI+PC9wYXRoPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik00MjkuNjIxLDQ4NS41NzVIODIuMzc5Yy02LjU4NSwwLTExLjkyMyw1LjMzOC0xMS45MjMsMTEuOTIzdjIuNTc5ICBjMCw2LjU4NSw1LjMzOCwxMS45MjMsMTEuOTIzLDExLjkyM2gzNDcuMjQyYzYuNTg1LDAsMTEuOTIzLTUuMzM4LDExLjkyMy0xMS45MjN2LTIuNTc5ICBDNDQxLjU0NCw0OTAuOTEzLDQzNi4yMDYsNDg1LjU3NSw0MjkuNjIxLDQ4NS41NzV6IiBmaWxsPSIjOWM5ZGEwIiBkYXRhLW9yaWdpbmFsPSIjOWM5ZGEwIj48L3BhdGg+CjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3R5bGU9IiIgZD0iTTQyOS42MjEsNDg1LjU3NUgzODUuN1Y1MTJoNDMuOTIxYzYuNTg1LDAsMTEuOTIzLTUuMzM4LDExLjkyMy0xMS45MjN2LTIuNTc5ICBDNDQxLjU0NCw0OTAuOTEzLDQzNi4yMDYsNDg1LjU3NSw0MjkuNjIxLDQ4NS41NzV6IiBmaWxsPSIjOGQ4ZjkzIiBkYXRhLW9yaWdpbmFsPSIjOGQ4ZjkzIj48L3BhdGg+CjxjaXJjbGUgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBjeD0iMjU2IiBjeT0iNDA3LjMzIiByPSIyNC40ODIiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiNmZmZmZmYiPjwvY2lyY2xlPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPHBhdGggc3R5bGU9IiIgZD0iTTI4Mi41MDEsMTg3Ljk3OGMtMTkuMjQxLTcuMTMzLTMzLjU5Ny03LjE5My01My4wMDIsMGwwLDBjMS4zODYsMi44MjgsMi4wNzgsNC4yNDMsMy40NjQsNy4wNzEgICBjMC4zOTEsMC43OTksMC44MjgsMS41NywxLjI4MSwyLjMzMWMxNi41MzYtNS42NywyNy4xMDMtNS42NTYsNDMuNjI1LDAuMDU1QzI3OS43MjEsMTkzLjY1MywyODAuNjQ4LDE5MS43NjEsMjgyLjUwMSwxODcuOTc4eiIgZmlsbD0iIzRkNGQ0ZCIgZGF0YS1vcmlnaW5hbD0iIzRkNGQ0ZCI+PC9wYXRoPgoJPHBhdGggc3R5bGU9IiIgZD0iTTM2Mi4zODQsMTg2LjYyM3YtNS41NjRoLTM2LjU2NWwwLDB2Ny44NzRjMCwwLjg5LDAuMDQ4LDEuNzc0LDAuMTE4LDIuNjU3aDM2LjMzMSAgIEMzNjIuMzQyLDE4OS45NDQsMzYyLjM4NCwxODguMjg5LDM2Mi4zODQsMTg2LjYyM3oiIGZpbGw9IiM0ZDRkNGQiIGRhdGEtb3JpZ2luYWw9IiM0ZDRkNGQiPjwvcGF0aD4KCTxwYXRoIHN0eWxlPSIiIGQ9Ik0xNDkuNjE2LDE4MS4wNnY1LjU2NGMwLDEuNjY2LDAuMDUyLDMuMzIsMC4xMjgsNC45NjdoMzYuNDM3VjE4MS4wNkgxNDkuNjE2eiIgZmlsbD0iIzRkNGQ0ZCIgZGF0YS1vcmlnaW5hbD0iIzRkNGQ0ZCI+PC9wYXRoPgoJPHBhdGggc3R5bGU9IiIgZD0iTTIyNS40ODUsMjE1LjI5OWgtMzkuNDA2Yy00LjM0MSwwLTcuODYtMy41MTktNy44Ni03Ljg2di0yMi40MzNjMC00LjM0MSwzLjUxOS03Ljg2LDcuODYtNy44NiAgIGg0OS4xMThjNC4zNDEsMCw3Ljg2LDMuNTE5LDcuODYsNy44NnYxMi43MjFDMjQzLjA1NywyMDcuNDMyLDIzNS4xOSwyMTUuMjk5LDIyNS40ODUsMjE1LjI5OXoiIGZpbGw9IiM0ZDRkNGQiIGRhdGEtb3JpZ2luYWw9IiM0ZDRkNGQiPjwvcGF0aD4KCTxwYXRoIHN0eWxlPSIiIGQ9Ik0yODYuNTE1LDIxNS4yOTloMzkuNDA2YzQuMzQxLDAsNy44Ni0zLjUxOSw3Ljg2LTcuODZ2LTIyLjQzM2MwLTQuMzQxLTMuNTE5LTcuODYtNy44Ni03Ljg2ICAgaC00OS4xMThjLTQuMzQxLDAtNy44NiwzLjUxOS03Ljg2LDcuODZ2MTIuNzIxQzI2OC45NDMsMjA3LjQzMiwyNzYuODEsMjE1LjI5OSwyODYuNTE1LDIxNS4yOTl6IiBmaWxsPSIjNGQ0ZDRkIiBkYXRhLW9yaWdpbmFsPSIjNGQ0ZDRkIj48L3BhdGg+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxwYXRoIHN0eWxlPSIiIGQ9Ik0zMjUuOTIxLDE3Ny4xNDVoLTQ3LjcxM3YzNi4wNjZjMi40NzQsMS4zMyw1LjMwMSwyLjA4OCw4LjMwNywyLjA4OGgzOS40MDYgICBjNC4zNDEsMCw3Ljg2LTMuNTE5LDcuODYtNy44NnYtMjIuNDMzQzMzMy43ODEsMTgwLjY2NSwzMzAuMjYyLDE3Ny4xNDUsMzI1LjkyMSwxNzcuMTQ1eiIgZmlsbD0iIzM1MzUzNSIgZGF0YS1vcmlnaW5hbD0iIzM1MzUzNSI+PC9wYXRoPgoJPHBhdGggc3R5bGU9IiIgZD0iTTIzNS4xOTcsMTc3LjE0NWgtNDcuNzM5djM4LjE1NGgzOC4wMjdjOS43MDUsMCwxNy41NzItNy44NjcsMTcuNTcyLTE3LjU3MnYtMTIuNzIxICAgQzI0My4wNTcsMTgwLjY2NSwyMzkuNTM4LDE3Ny4xNDUsMjM1LjE5NywxNzcuMTQ1eiIgZmlsbD0iIzM1MzUzNSIgZGF0YS1vcmlnaW5hbD0iIzM1MzUzNSI+PC9wYXRoPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" />                        </div>
                        <div class="name">
                            <?php
                            $sql = "SELECT * from users    WHERE secret= ? and role=1 ";

                            $stm = $conn->prepare($sql);

                            $stm->bindValue(1,$_COOKIE["id"]);
                            $stm->execute();
                            $row = $stm->fetch(PDO::FETCH_ASSOC);

                            if (empty($row)){
                                echo "<script>window.location.replace('index.php')</script>";
                            }

                            if(preg_match('/(Chrome|CriOS)\//i',$_SERVER['HTTP_USER_AGENT'])
                                && !preg_match('/(Aviator|ChromePlus|coc_|Dragon|Edge|Flock|Iron|Kinza|Maxthon|MxNitro|Nichrome|OPR|Perk|Rockmelt|Seznam|Sleipnir|Spark|UBrowser|Vivaldi|WebExplorer|YaBrowser)/i',$_SERVER['HTTP_USER_AGENT'])){
                                // Browser might be Google Chrome
                            }
                            else{
                                echo "<script>alert('Use Google Chrome on Windows because your browser is not fully supported')</script>";
                            }
                            ?>
                            <h3 class="title"><?php echo $row["fname"];echo "&nbsp  ";echo $row["lname"]    ?></h3>
                            <h6>Student</h6>

                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p>May God make the exam easier for you! Don’t be nervous because I am sure you will be able to answer every question! My prayers are with you. I wish you the best for your exam. </p>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                        <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                    <i class="material-icons">language</i>
                                    Join to exam
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                    <i class="material-icons">quiz</i>
                                    My Exams
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>



            <div class="tab-content tab-space">
                <div class="tab-pane active text-center gallery" id="studio">
                    <div class="row  justify-content-center">
                        <div class="form__group field">

                            <form method="get" action="">
                            <input type="input" class="form__field" placeholder="Name" name="examID" id='examID' required />
                            <label for="name" class="form__label">
                                <?php

                                if (isset($codeERROR)){
                                    echo $codeERROR;
                                }
                                else{
                                    echo "Exam Code:";
                                }
                                ?>

                                </label>
                            <button type="submit" class="btn btn-warning" >Join</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane text-center gallery" id="works">
                    <div class="row">

                        <div class="container">
                            <div class="row"  style="margin-top: 50px;">
                                <div class="col-md-12 text-center">
                                    <div class="outer-form">
                                        <table class="table-striped table table-bordered vertical">
                                            <thead style="color: white; font-weight: normal; background-color: black;" >
                                            <tr>
                                                <th  style="color: orangered"  class="head">Test Code.</th>
                                                <th   style="color: orangered" class="head">Points</th>
                                                <th   style="color: orangered" class="head">Details</th>
                                            </tr>
                                            </thead>

                                            <tbody class="text-center" style="border:1px solid transparent; background-color:#242424; color:#A1A6AB; text-align: left;">



                                            <?php


                                            $sql = "SELECT  * from studentTest where studentID=?";

                                            $stm = $conn->prepare($sql);

                                            $stm->bindValue(1,$_COOKIE["id"]);
                                            $stm->execute();
                                            $rows2 = $stm->fetchAll(PDO::FETCH_ASSOC);


                                            foreach ($rows2 as $key=> $row) {

                                                ?>


                                                <tr>

                                                    <td><?php echo $row["testID"] ?></td>


                                                    <td><?php echo $row["point"] ?></td>


                                                    <td>
                                                        <a href="http://147.175.98.97/final/functions/review.php?studentID=<?php echo $_COOKIE['id']?>&testID=<?php echo $row["testID"] ?>">Details</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<footer style="    font-family: 'Lato', sans-serif;
    background: -webkit-gradient(linear, 0% 50%, 100% 50%, color-stop(0%, #272838), color-stop(33.33333%, #2b2d41), color-stop(66.66667%, #393549), color-stop(100%, #433545));
    background: -moz-linear-gradient(left, #272838, #2b2d41, #393549, #433545);
    background: -webkit-linear-gradient(left, #272838, #2b2d41, #393549, #433545);
    background: linear-gradient(to right, #272838, #2b2d41, #393549, #433545);
background-size: contain" class="footer text-center ">
</footer>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script src="js/student.js"></script>



</body>



</html>
