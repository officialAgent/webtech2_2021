<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('qrcode/qrlib.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/teacher.css" type="text/css">
    <link rel="stylesheet" href="css/student.css" type="text/css">
    <link rel="stylesheet" href="css/test.css" type="text/css">
    <title>test</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
          href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet"
          href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body class="profile-page">
<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100"
     id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="" target="_blank">Profile </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">


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
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik00MjkuNjYzLDIyMC41MTdjMC0wLjA0OCwwLjAwNi0wLjA5NiwwLjAwNi0wLjE0NUM0MjkuNjY5LDE5MC44NzEsMzUxLjkxNSwwLDI1NiwwICBTODIuMzMxLDE5MC44NzEsODIuMzMxLDIyMC4zNzJjMCwwLjA0OCwwLjAwNiwwLjA5NiwwLjAwNiwwLjE0NWMwLDAuMDQ1LTAuMDA2LDAuMDkxLTAuMDA2LDAuMTM2ICBjMCwyNy40ODEsMTE3LjA5NywxNzEuOTQ5LDE3My42NjksMTcxLjk0OWM1NS4zNTYsMCwxNzMuNjY5LTE0NC40NjgsMTczLjY2OS0xNzEuOTQ5YzAtMC4wNDctMC4wMDYtMC4wOTQtMC4wMDYtMC4xNCAgQzQyOS42NjMsMjIwLjUxNCw0MjkuNjYzLDIyMC41MTUsNDI5LjY2MywyMjAuNTE3eiIgZmlsbD0iIzEzNTM3MCIgZGF0YS1vcmlnaW5hbD0iIzEzNTM3MCI+PC9wYXRoPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPHBhdGggc3R5bGU9IiIgZD0iTTM3Mi4wMzksMjE2LjYxMWgtMTkuNzI0di01Ny4yMDJoMTkuNzI0YzEwLjE2NCwwLDE4LjQwNCw4LjI0LDE4LjQwNCwxOC40MDR2MjAuMzk0ICAgQzM5MC40NDMsMjA4LjM3MiwzODIuMjAzLDIxNi42MTEsMzcyLjAzOSwyMTYuNjExeiIgZmlsbD0iI2Y0Yzg5MiIgZGF0YS1vcmlnaW5hbD0iI2Y0Yzg5MiI+PC9wYXRoPgoJPHBhdGggc3R5bGU9IiIgZD0iTTEzOS45NjEsMjE2LjYxMWgxOS43MjR2LTU3LjIwMmgtMTkuNzI0Yy0xMC4xNjQsMC0xOC40MDQsOC4yNC0xOC40MDQsMTguNDA0djIwLjM5NCAgIEMxMjEuNTU3LDIwOC4zNzIsMTI5Ljc5NiwyMTYuNjExLDEzOS45NjEsMjE2LjYxMXoiIGZpbGw9IiNmNGM4OTIiIGRhdGEtb3JpZ2luYWw9IiNmNGM4OTIiPjwvcGF0aD4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPHBhdGggc3R5bGU9IiIgZD0iTTMyMy4xODYsMzE4LjQ3NWwtMTIuNDQyLTIuNTAxYy04LjgyOC0xLjc3NC0xNS4xOC05LjUyOS0xNS4xOC0xOC41MzR2LTE3LjkyNmgtODEuMzgydjE4LjM3OSAgIGMwLDkuMDA1LTYuMzUxLDE2Ljc2LTE1LjE4LDE4LjUzNGwtMTAuMTg5LDIuMDQ4djY4LjQzMmgxMzQuMzcydi02OC40MzJIMzIzLjE4NnoiIGZpbGw9IiNmZWQ5YTgiIGRhdGEtb3JpZ2luYWw9IiNmZWQ5YTgiPjwvcGF0aD4KCTxwYXRoIHN0eWxlPSIiIGQ9Ik0yNTYsMjkzLjAwN0wyNTYsMjkzLjAwN2MtNTguNzU0LDAtMTA2LjM4NC00Ny42My0xMDYuMzg0LTEwNi4zODR2LTI5Ljg5NyAgIGMwLTU4Ljc1NCw0Ny42My0xMDYuMzg0LDEwNi4zODQtMTA2LjM4NGwwLDBjNTguNzU0LDAsMTA2LjM4NCw0Ny42MywxMDYuMzg0LDEwNi4zODR2MjkuODk3ICAgQzM2Mi4zODQsMjQ1LjM3NywzMTQuNzU0LDI5My4wMDcsMjU2LDI5My4wMDd6IiBmaWxsPSIjZmVkOWE4IiBkYXRhLW9yaWdpbmFsPSIjZmVkOWE4Ij48L3BhdGg+CjwvZz4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMjU2LDUwLjM0MkwyNTYsNTAuMzQyYy05LjYwMSwwLTE4LjkwMiwxLjI3OS0yNy43NSwzLjY2NCAgYzQ1LjI5NiwxMi4yMDcsNzguNjM0LDUzLjU2Nyw3OC42MzQsMTAyLjcydjI5Ljg5N2MwLDQ5LjE1My0zMy4zMzgsOTAuNTEyLTc4LjYzNCwxMDIuNzJjOC44NDgsMi4zODQsMTguMTQ5LDMuNjY0LDI3Ljc1LDMuNjY0bDAsMCAgYzU4Ljc1NCwwLDEwNi4zODQtNDcuNjMsMTA2LjM4NC0xMDYuMzg0di0yOS44OTdDMzYyLjM4NCw5Ny45NzIsMzE0Ljc1NCw1MC4zNDIsMjU2LDUwLjM0MnoiIGZpbGw9IiNmNGNlOWYiIGRhdGEtb3JpZ2luYWw9IiNmNGNlOWYiPjwvcGF0aD4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMjU2LDE1OS44ODNjOTUuNzU3LDAsMTczLjQwOSwzMy4xNzksMTczLjY2Myw2MC42MzRjMC0wLjA0OCwwLjAwNi0wLjA5NiwwLjAwNi0wLjE0NSAgQzQyOS42NjksMTkwLjg3MSwzNTEuOTE1LDAsMjU2LDBTODIuMzMxLDE5MC44NzEsODIuMzMxLDIyMC4zNzJjMCwwLjA0OCwwLjAwNiwwLjA5NiwwLjAwNiwwLjE0NSAgQzgyLjU5MSwxOTMuMDYyLDE2MC4yNDMsMTU5Ljg4MywyNTYsMTU5Ljg4M3oiIGZpbGw9IiMxZTYwOGIiIGRhdGEtb3JpZ2luYWw9IiMxZTYwOGIiIGNsYXNzPSIiPjwvcGF0aD4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMjU2LDBjLTguNDQ1LDAtMTYuNzQ5LDEuNDg2LTI0Ljg3Miw0LjIwNUMyOTMuMDcxLDI0Ljk0LDM0NC40NiwxMTcuNzM0LDM2Ny4yNTksMTc1Ljk4ICBjMzguMDI1LDEyLjEyNSw2Mi4yNjIsMjkuMjIxLDYyLjQwNCw0NC41MzdjMC0wLjA0OCwwLjAwNi0wLjA5NiwwLjAwNi0wLjE0NUM0MjkuNjY5LDE5MC44NzEsMzUxLjkxNSwwLDI1NiwweiIgZmlsbD0iIzEzNTM3MCIgZGF0YS1vcmlnaW5hbD0iIzEzNTM3MCI+PC9wYXRoPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik00OTAuNTEsNTAwLjM4OGMtNC42MjUtMzQuMDEtMjMuNDIzLTEzMi42My04Ny45ODktMTU4LjUzOGwtNzMuNjQzLTIyLjk2MUgxODMuMTIyTDEwOS40OCwzNDEuODUgIGMtNjQuNTY2LDI1LjkwOC04My4zNjUsMTI0LjUyNy04Ny45OSwxNTguNTM4QzIwLjY1NCw1MDYuNTM0LDI1LjQ0Nyw1MTIsMzEuNjUsNTEyaDQ0OC43ICBDNDg2LjU1Myw1MTIsNDkxLjM0Niw1MDYuNTM0LDQ5MC41MSw1MDAuMzg4eiIgZmlsbD0iIzFlNjA4YiIgZGF0YS1vcmlnaW5hbD0iIzFlNjA4YiIgY2xhc3M9IiI+PC9wYXRoPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik00OTAuNTEsNTAwLjM4OGMtNC42MjUtMzQuMDEtMjMuNDIzLTEzMi42My04Ny45ODktMTU4LjUzOGwtNzMuNjQzLTIyLjk2MWgtNTYuNzAzbDczLjY0MywyMi45NjEgIEM0MjQuMjI0LDM3My4zMTIsNDM1LjEzOSw1MTIsNDM1LjEzOSw1MTJoNDUuMjExQzQ4Ni41NTMsNTEyLDQ5MS4zNDYsNTA2LjUzNCw0OTAuNTEsNTAwLjM4OHoiIGZpbGw9IiMxMzUzNzAiIGRhdGEtb3JpZ2luYWw9IiMxMzUzNzAiPjwvcGF0aD4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNNDAxLjU5NiwzMTUuMTYzSDExMC40MDRjLTkuNjY0LDAtMTcuNDk4LDcuODM0LTE3LjQ5OCwxNy40OThWNDk4LjU5aDMyNi4xODlWMzMyLjY2MSAgQzQxOS4wOTQsMzIyLjk5Nyw0MTEuMjYsMzE1LjE2Myw0MDEuNTk2LDMxNS4xNjN6IiBmaWxsPSIjY2ZjZmNmIiBkYXRhLW9yaWdpbmFsPSIjY2ZjZmNmIj48L3BhdGg+CjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3R5bGU9IiIgZD0iTTQwMS41OTcsMzE1LjE2M2gtNTUuNWM5LjY2NCwwLDE3LjQ5OCw3LjgzNCwxNy40OTgsMTcuNDk4VjQ5OC41OWg1NS41VjMzMi42NjEgIEM0MTkuMDk0LDMyMi45OTcsNDExLjI2LDMxNS4xNjMsNDAxLjU5NywzMTUuMTYzeiIgZmlsbD0iI2MyYzRjNiIgZGF0YS1vcmlnaW5hbD0iI2MyYzRjNiI+PC9wYXRoPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik00MjkuNjIxLDQ4NS41NzVIODIuMzc5Yy02LjU4NSwwLTExLjkyMyw1LjMzOC0xMS45MjMsMTEuOTIzdjIuNTc5ICBjMCw2LjU4NSw1LjMzOCwxMS45MjMsMTEuOTIzLDExLjkyM2gzNDcuMjQyYzYuNTg1LDAsMTEuOTIzLTUuMzM4LDExLjkyMy0xMS45MjN2LTIuNTc5ICBDNDQxLjU0NCw0OTAuOTEzLDQzNi4yMDYsNDg1LjU3NSw0MjkuNjIxLDQ4NS41NzV6IiBmaWxsPSIjOWM5ZGEwIiBkYXRhLW9yaWdpbmFsPSIjOWM5ZGEwIj48L3BhdGg+CjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3R5bGU9IiIgZD0iTTQyOS42MjEsNDg1LjU3NUgzODUuN1Y1MTJoNDMuOTIxYzYuNTg1LDAsMTEuOTIzLTUuMzM4LDExLjkyMy0xMS45MjN2LTIuNTc5ICBDNDQxLjU0NCw0OTAuOTEzLDQzNi4yMDYsNDg1LjU3NSw0MjkuNjIxLDQ4NS41NzV6IiBmaWxsPSIjOGQ4ZjkzIiBkYXRhLW9yaWdpbmFsPSIjOGQ4ZjkzIj48L3BhdGg+CjxjaXJjbGUgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBjeD0iMjU2IiBjeT0iNDA3LjMzIiByPSIyNC40ODIiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiNmZmZmZmYiPjwvY2lyY2xlPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPHBhdGggc3R5bGU9IiIgZD0iTTI4Mi41MDEsMTg3Ljk3OGMtMTkuMjQxLTcuMTMzLTMzLjU5Ny03LjE5My01My4wMDIsMGwwLDBjMS4zODYsMi44MjgsMi4wNzgsNC4yNDMsMy40NjQsNy4wNzEgICBjMC4zOTEsMC43OTksMC44MjgsMS41NywxLjI4MSwyLjMzMWMxNi41MzYtNS42NywyNy4xMDMtNS42NTYsNDMuNjI1LDAuMDU1QzI3OS43MjEsMTkzLjY1MywyODAuNjQ4LDE5MS43NjEsMjgyLjUwMSwxODcuOTc4eiIgZmlsbD0iIzRkNGQ0ZCIgZGF0YS1vcmlnaW5hbD0iIzRkNGQ0ZCI+PC9wYXRoPgoJPHBhdGggc3R5bGU9IiIgZD0iTTM2Mi4zODQsMTg2LjYyM3YtNS41NjRoLTM2LjU2NWwwLDB2Ny44NzRjMCwwLjg5LDAuMDQ4LDEuNzc0LDAuMTE4LDIuNjU3aDM2LjMzMSAgIEMzNjIuMzQyLDE4OS45NDQsMzYyLjM4NCwxODguMjg5LDM2Mi4zODQsMTg2LjYyM3oiIGZpbGw9IiM0ZDRkNGQiIGRhdGEtb3JpZ2luYWw9IiM0ZDRkNGQiPjwvcGF0aD4KCTxwYXRoIHN0eWxlPSIiIGQ9Ik0xNDkuNjE2LDE4MS4wNnY1LjU2NGMwLDEuNjY2LDAuMDUyLDMuMzIsMC4xMjgsNC45NjdoMzYuNDM3VjE4MS4wNkgxNDkuNjE2eiIgZmlsbD0iIzRkNGQ0ZCIgZGF0YS1vcmlnaW5hbD0iIzRkNGQ0ZCI+PC9wYXRoPgoJPHBhdGggc3R5bGU9IiIgZD0iTTIyNS40ODUsMjE1LjI5OWgtMzkuNDA2Yy00LjM0MSwwLTcuODYtMy41MTktNy44Ni03Ljg2di0yMi40MzNjMC00LjM0MSwzLjUxOS03Ljg2LDcuODYtNy44NiAgIGg0OS4xMThjNC4zNDEsMCw3Ljg2LDMuNTE5LDcuODYsNy44NnYxMi43MjFDMjQzLjA1NywyMDcuNDMyLDIzNS4xOSwyMTUuMjk5LDIyNS40ODUsMjE1LjI5OXoiIGZpbGw9IiM0ZDRkNGQiIGRhdGEtb3JpZ2luYWw9IiM0ZDRkNGQiPjwvcGF0aD4KCTxwYXRoIHN0eWxlPSIiIGQ9Ik0yODYuNTE1LDIxNS4yOTloMzkuNDA2YzQuMzQxLDAsNy44Ni0zLjUxOSw3Ljg2LTcuODZ2LTIyLjQzM2MwLTQuMzQxLTMuNTE5LTcuODYtNy44Ni03Ljg2ICAgaC00OS4xMThjLTQuMzQxLDAtNy44NiwzLjUxOS03Ljg2LDcuODZ2MTIuNzIxQzI2OC45NDMsMjA3LjQzMiwyNzYuODEsMjE1LjI5OSwyODYuNTE1LDIxNS4yOTl6IiBmaWxsPSIjNGQ0ZDRkIiBkYXRhLW9yaWdpbmFsPSIjNGQ0ZDRkIj48L3BhdGg+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxwYXRoIHN0eWxlPSIiIGQ9Ik0zMjUuOTIxLDE3Ny4xNDVoLTQ3LjcxM3YzNi4wNjZjMi40NzQsMS4zMyw1LjMwMSwyLjA4OCw4LjMwNywyLjA4OGgzOS40MDYgICBjNC4zNDEsMCw3Ljg2LTMuNTE5LDcuODYtNy44NnYtMjIuNDMzQzMzMy43ODEsMTgwLjY2NSwzMzAuMjYyLDE3Ny4xNDUsMzI1LjkyMSwxNzcuMTQ1eiIgZmlsbD0iIzM1MzUzNSIgZGF0YS1vcmlnaW5hbD0iIzM1MzUzNSI+PC9wYXRoPgoJPHBhdGggc3R5bGU9IiIgZD0iTTIzNS4xOTcsMTc3LjE0NWgtNDcuNzM5djM4LjE1NGgzOC4wMjdjOS43MDUsMCwxNy41NzItNy44NjcsMTcuNTcyLTE3LjU3MnYtMTIuNzIxICAgQzI0My4wNTcsMTgwLjY2NSwyMzkuNTM4LDE3Ny4xNDUsMjM1LjE5NywxNzcuMTQ1eiIgZmlsbD0iIzM1MzUzNSIgZGF0YS1vcmlnaW5hbD0iIzM1MzUzNSI+PC9wYXRoPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4="/>
                        </div>
                        <div class="name">
                            <?php

                            include_once("config.php");

                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);
                            } catch (PDOException $e) {
                                echo "failed connection" . $e->getMessage();
                            }

                            $sql = "SELECT * from studentTest   WHERE testID= ? and studentID=? and status='finsihed'  ";

                            $stm = $conn->prepare($sql);

                            $stm->bindValue(1,$_COOKIE['tcode']);
                            $stm->bindValue(2,$_COOKIE['id']);
                            $stm->execute();
                            $row = $stm->fetch(PDO::FETCH_ASSOC);

                            if (!empty($row)){
                                echo '<script>window.location="student.php"</script>';
                            }





                            $sql = "SELECT * from users WHERE secret= ?  ";

                            $stm = $conn->prepare($sql);

                            $stm->bindValue(1, $_COOKIE["id"]);
                            $stm->execute();
                            $row = $stm->fetch(PDO::FETCH_ASSOC);

                            ?>
                            <h3 class="title"><?php echo $row["fname"];
                                echo "&nbsp  ";
                                echo $row["lname"] ?></h3>

                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p>There are no mistakes, No coincidences. All events are blessings given to us to learn. A journey of a
                    thousand miles started with only one step. Good Luck.</p>
            </div>
            <div class="row">
                <div class="container">
                    <div class=" text-center mt-5 ">
                        <h1>Test </h1>
                        <div id="demo"></div>
                        <h1 id="code"></h1>
                    </div>
                    <div class="row ">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 " id="formBG">
                                <div class="card-body bg-transparent">
                                    <div class="container">
                                        <form id="contact-form2" method="get" action="" role="form">
                                            <div id="show" style="color: #ffffee" class="controls text-center">
                                                <?php

                                                $drawing_question_positions = [];

                                                $alldrag = 0;
                                                $alldrag2 = 0;
                                                $sql = "SELECT * FROM test JOIN question ON test.id = question.testID where code=?";

                                                $stm = $conn->prepare($sql);

                                                $stm->bindValue(1, $_COOKIE["tcode"]);
                                                $stm->execute();
                                                $rows2 = $stm->fetchAll(PDO::FETCH_ASSOC);

                                                ?>

                                                <input type='hidden' id="testID"
                                                       value='<?php echo $rows2[0]["testID"]; ?>'>

                                                <?php
                                                $ttime = $rows2[0]['time'];
                                                foreach ($rows2

                                                as $row) {

                                                if ($row['questionType'] === "text") {

                                                    $sql = "SELECT * FROM text where questionID=?";

                                                    $stm = $conn->prepare($sql);

                                                    $stm->bindValue(1, $row["id"]);
                                                    $stm->execute();
                                                    $rows3 = $stm->fetch(PDO::FETCH_ASSOC);

                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <h3><?php echo $row['questionPosition'] ?></h3>
                                                                <p style="color: #ffffee"><?php echo $row['question'] ?> </p>
                                                            </div>
                                                            <div class="form-group"><input
                                                                        id=<?php echo $row['questionPosition'] ?> name=<?php echo $row['questionPosition'] ?>
                                                                        type="text" class="form-control"
                                                                        placeholder="Please enter your ans "
                                                                         data-error="PLS fill out">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                if ($row['questionType'] === "check"){

                                                $sql = "SELECT * FROM checkbox where questionID=?";

                                                $stm = $conn->prepare($sql);

                                                $stm->bindValue(1, $row["id"]);
                                                $stm->execute();
                                                $rows4 = $stm->fetchAll(PDO::FETCH_ASSOC);
                                                ?>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h3><?php echo $row['questionPosition'] ?></h3>
                                                            <p style="color: #ffffee"><?php echo $row['question'] ?> </p>
                                                        </div>
                                                        <?php
                                                        foreach ($rows4 as $chbox) {
                                                            $new_str = str_replace(' ', '', $chbox['answer']);

                                                            ?>


                                                            <input type="hidden"
                                                                   id=<?php echo $chbox['answer'] ?> name="<?php echo $new_str ?>"
                                                                   value="0">
                                                            <div class="checkbox-inline"><label class="checkbox-inline"><input
                                                                            value="1" name="<?php echo $new_str ?>"
                                                                            type="checkbox"><span
                                                                            class="checkbox-decorator"><span
                                                                                class="check"></span></span>
                                                                    <div class="form-group"><input type="text"
                                                                                                   class="form-control"
                                                                                                   disabled
                                                                                                   placeholder="<?php echo $chbox['answer'] ?>">
                                                                    </div>
                                                                </label></div>


                                                            <?php
                                                        }
                                                        }
                                                        if ($row['questionType'] === "drag"){

                                                        $sql = "SELECT * FROM drag where questionID=?";

                                                        $stm = $conn->prepare($sql);

                                                        $stm->bindValue(1, $row["id"]);
                                                        $stm->execute();
                                                        $rows5 = $stm->fetchAll(PDO::FETCH_ASSOC);
                                                        ?>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <h3><?php echo $row['questionPosition'] ?></h3>
                                                                    <p style="color: #ffffee"><?php echo $row['question'] ?> </p>
                                                                </div>
                                                                <div class="dragndrop_container">
                                                                    <?php
                                                                    foreach ($rows5 as $dcount => $dbox) {
                                                                        ?>

                                                                        <div class="data1" ondrop="drop(event)"
                                                                             ondragover="allowDrop(event)"
                                                                             id="question.<?php echo $alldrag ?>"><?php echo $dbox['data1'] ?></div>

                                                                        <?php
                                                                        $alldrag++;
                                                                    }

                                                                    ?>
                                                                    <div id="br"></div>
                                                                    <div id="answer" ondrop="drop(event)"
                                                                         ondragover="allowDrop(event)">
                                                                        <?php

                                                                        foreach ($rows5 as $dcount => $dbox) {
                                                                            ?>

                                                                            <p style="color: orangered"
                                                                               class="dragNdrop data2" draggable="true"
                                                                               ondragstart="drag(event)"
                                                                               id="ans.<?php echo $alldrag2 ?>"><?php echo $dbox['data2'] ?></p>

                                                                            <?php
                                                                            $alldrag2++;
                                                                        }

                                                                        ?>

                                                                        <?php

                                                                        }
                                                                        if ($row['questionType'] === "draw") {
                                                                            array_push($drawing_question_positions, intval($row['questionPosition']));
                                                                            ?>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <h3><?php echo $row['questionPosition'] ?></h3>
                                                                                        <p style="color: #ffffee"><?php echo $row['question'] ?> </p>
                                                                                    </div>
                                                                                    <p style="color: #ffffee">Mobile
                                                                                        Photo</p>
                                                                                    <label class="switch">
                                                                                        <input id="<?php echo $row['questionPosition'] ?>"
                                                                                               onchange="logStatus(<?php echo $row['questionPosition'] ?>)"
                                                                                               type="checkbox">
                                                                                        <span class="slider round"></span>
                                                                                    </label>
                                                                                    <div id="rajz.<?php echo $row['questionPosition'] ?>">
                                                                                        <!--                                                                                        <canvas id="canvas" width="500"-->
                                                                                        <!--                                                                                                height="250"-->
                                                                                        <!--                                                                                                style="display: block;">-->
                                                                                        <!--                                                                                            Sorry, your browser is-->
                                                                                        <!--                                                                                            rubbish.-->
                                                                                        <!--                                                                                        </canvas>-->


                                                                                        <div class="col-md-12"><input
                                                                                                    type="button"
                                                                                                    id="saveC"
                                                                                                    class="btn btn-success btn-send pt-2 btn-block "
                                                                                                    value="Save picture"
                                                                                                    onclick="savedrawtodb()">
                                                                                        </div>

                                                                                    </div>
                                                                                    <div style="display: none"
                                                                                         id="qrcode.<?php echo $row['questionPosition'] ?>">
                                                                                        <?php


                                                                                        // SVG file format support


                                                                                        $test = $_COOKIE['tcode'];
                                                                                        $id = $_COOKIE['id'];
                                                                                        $questionID = $row['id'];


                                                                                        $link = "http://147.175.98.97/final/upload/upsite.php?testid=" . $test . "&" . "id=" . $id . "&row=" . $questionID;


                                                                                        $svgCode = QRcode::svg($link);

                                                                                        echo $svgCode;
                                                                                        ?>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        }
                                                                        ?></div>
                                                                    <input type="hidden" name="dcount" id="dcount"
                                                                           value=<?php echo $alldrag ?>>

                                                                    <?php
                                                                    if (!empty($drawing_question_positions)) { ?>
                                                                        <select id="select_position">
                                                                            <option value="please_select_a_position">
                                                                                Please select the question you wish to
                                                                                answer
                                                                            </option>
                                                                            <?php
                                                                            foreach ($drawing_question_positions as $position) {
                                                                                echo "<option value='$position' onchange=''>$position</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <canvas id="canvas" width="500"
                                                                                height="250"
                                                                                style="display: block;">
                                                                            Sorry, your browser is
                                                                            rubbish.
                                                                        </canvas>
                                                                        <button type="button" onclick="savePicture()">
                                                                            Save Picture
                                                                        </button>
                                                                        <button type="button" onclick="clearCanvas()">
                                                                            Clear Canvas
                                                                        </button>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <div onclick="checkDragNDrop(); " class="col-md-12">
                                                                <input type="submit" id="save"
                                                                       class="btn btn-success btn-send pt-2 btn-block "
                                                                       value="Save test">
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="cdata" id="cdata">

                                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- /.8 -->
                        </div> <!-- /.row-->
                    </div>
                </div>
                <?php
                date_default_timezone_set('Europe/Vienna');
                $minfortest = intval($ttime);

                //$currentime=date('h:i:s a');

                $currentdate = date('Y-m-d');
                $currenth = date('H', time());
                $currentm = date('i', time());
                $currentsec = date('s', time());

                $inth = date('H', time() + $minfortest * 60);
                $intm = date('i', time() + $minfortest * 60);
                $intsec = date('s', time() + $minfortest * 60);
                $date = date('Y-m-d', time() + $minfortest * 60);

                $timestamp = date('Y-m-d H:i:s', time() + $minfortest * 60);

                function valami($conn)
                {
                    $sql = "SELECT * FROM timer WHERE student_id=? and test_id=?";
                    $stm = $conn->prepare($sql);
                    $stm->bindValue(1, $_COOKIE['id']);
                    $stm->bindValue(2, intval($_COOKIE['tcode']));
                    $stm->execute();
                    $temp = $stm->fetch();
                    return $temp;
                }

                $datatime = valami($conn);
                if (empty($datatime)) {
                    $sql = "INSERT INTO timer (date,h,m,s,student_id,test_id,fulltime ) VALUES (?,?,?,?,?,?,?)";
                    $stm = $conn->prepare($sql);
                    $stm->bindValue(1, $date);
                    $stm->bindValue(2, $inth);
                    $stm->bindValue(3, $intm);
                    $stm->bindValue(4, $intsec);
                    $stm->bindValue(5, $_COOKIE['id']);
                    $stm->bindValue(6, intval($_COOKIE['tcode']));
                    $stm->bindValue(7, $timestamp);
                    $stm->execute();

                    $datatime = valami($conn);
                }

                $ora = $datatime['h'];
                $perc = $datatime['m'];
                $masodperc = $datatime['s'];
                ?>
                <?php
                if (isset($_GET["dcount"])) {



                    $allPoint = 0;

                    foreach ($rows2 as $qp => $row) {
                        if ($row['questionType'] === "text") {

                            $sql = "SELECT * FROM text where questionID=?";

                            $stm = $conn->prepare($sql);

                            $stm->bindValue(1, $row["id"]);
                            $stm->execute();
                            $rows3 = $stm->fetch(PDO::FETCH_ASSOC);

                            //
                            $stm = $conn->prepare("INSERT INTO textans (question_ID, ans, studentID, point) VALUES (?, ?, ?, ?)");
                            $stm->bindValue(1, $row["id"]);
                            $stm->bindValue(2, $_GET[$qp + 1]);
                            $stm->bindValue(3, $_COOKIE["id"]);
                            $stm->bindValue(4, $_GET[$qp + 1] == $rows3["answer"] ? intval($row["point"]) : 0);
                            $stm->execute();
                            //

                            if ($rows3["answer"] == $_GET[$qp + 1]) {
                                $allPoint = $allPoint + $row['point'];

                            }
                        }
                        if ($row['questionType'] === "check") {

                            $sql = "SELECT * FROM checkbox where questionID=?";

                            $stm = $conn->prepare($sql);

                            $stm->bindValue(1, $row["id"]);
                            $stm->execute();
                            $rows4 = $stm->fetchAll(PDO::FETCH_ASSOC);

                            $arany=$stm->rowCount();
                            $onepoint=$row["point"]/$arany;


                            foreach ($rows4 as $chbox) {
                                $checkpoint = 0;

                                $new_str = str_replace(' ', '', $chbox['answer']);

                                $t = "";
                                if ($_GET[$new_str] == "1") {
                                    $t = "true";
                                } else {
                                    $t = "false";
                                }

                                if ($chbox["checked"] == $t) {
                                    $checkpoint++;
                                    $allPoint=$allPoint+$onepoint; // Solve real points problem
                                }

                                $stm = $conn->prepare("INSERT INTO checkbox_student_answers (checkboxID, studentID, student_ans,points) VALUES (?,?,?,?)");
                                $stm->bindValue(1, $chbox["id"]);
                                $stm->bindValue(2, $_COOKIE["id"]);
                                $stm->bindValue(3, $t);
                                $stm->bindValue(4, $checkpoint);
                                $stm->execute();


                            }
                        }
                        if ($row['questionType'] === "drag") {
                            $sql = "SELECT * FROM drag where questionID=?";

                            $stm = $conn->prepare($sql);

                            $stm->bindValue(1, $row["id"]);
                            $stm->execute();
                            $rows5 = $stm->fetchAll(PDO::FETCH_ASSOC);
                            $arany=$stm->rowCount();
                            $onepoint=$row["point"]/$arany;
                            $alldragpoint=$_GET['dcount']*$onepoint;

                            $allPoint=$allPoint+$alldragpoint;


                        }
                    }



                    $sql = "UPDATE studentTest set status='finsihed' where studentID=? and testID=?";
                    $stm = $conn->prepare($sql);
                    $stm->bindValue(1, $_COOKIE["id"]);
                    $stm->bindValue(2, $_COOKIE["tcode"]);
                    $stm->execute();


                    $sql = "DELETE from timer  where student_id='{$_COOKIE["id"]}' and test_id=?";
                    $stm = $conn->prepare($sql);
                    $stm->bindValue(1,intval($_COOKIE["tcode"]) );
                    $stm->execute();

                    $sql = "UPDATE studentTest set point=? where studentID=? and testID=?";
                    $stm = $conn->prepare($sql);
                    $stm->bindValue(1, $allPoint);
                    $stm->bindValue(2, $_COOKIE["id"]);
                    $stm->bindValue(3, $_COOKIE["tcode"]);
                    $stm->execute();


                    echo "<script>window.location.replace('student.php')</script>";

                }
                ?>
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


<script>
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function clearCanvas() {
        var canvas = document.getElementById('canvas'),
            ctx = canvas.getContext("2d");
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

    function savePicture() {
        let position = document.getElementById("select_position").value;

        if (position !== 'please_select_a_position') {
            let canvasData = canvas.toDataURL();

            $.ajax({
                type: 'POST',
                url: 'http://147.175.98.97/final/functions/save_pic.php',
                data: {
                    "picture": canvasData,
                    "position": position,
                    "studentID": getCookie("id"),
                    "testCode": getCookie("tcode")
                },
                success: function (data) {
                }
            });
        }
    }
</script>

<script>

    function logStatus(n) {
        if (document.getElementById(n).checked) {
            document.getElementById('rajz.' + n).style.display = 'none'
            document.getElementById('qrcode.' + n).style.display = 'block';
        } else {
            document.getElementById('rajz.' + n).style.display = 'block';
            document.getElementById('qrcode.' + n).style.display = 'none'
        }
    }


    var countDownDate = <?php echo strtotime("$date $ora:$perc:$masodperc") ?> *
    1000;
    var now = <?php echo time() ?> *
    1000;

    // Update the count down every 1 second
    var x = setInterval(function () {
        now = now + 1000;
// Find the distance between now an the count down date
        var distance = countDownDate - now;
// Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = hours + "h " +
            minutes + "m " + seconds + "s ";

// If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            // document.getElementById("demo").innerHTML = "EXPIRED";


            $.ajax({
                type: 'GET',
                url: 'http://147.175.98.97/final/functions/mangetesttime.php',

            });
            document.getElementById("save").click();
            document.getElementById("demo").innerHTML = "Time is up-You will be redirected after 5sec"

        }
    }, 1000);


</script>

<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
</script>

<script>
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkDragNDrop() {
        var d = document.getElementById("dcount").value;


 if(d != 0){

     let student_answers = {};
     let dragpoint = 0;
     let countCorrect = 0;
     // alert(d);
     for (var i = 0; i < d; i++) {
         let size = Object.keys(student_answers).length;


         if (document.getElementById('question.' + i).firstElementChild === document.getElementById('ans.' + i)) {
             countCorrect++;
             dragpoint = 1;
         } else {
             dragpoint = 0;
         }
         student_answers[size + 1] = {
             student_answer1: document.getElementById('question.' + i).firstChild.nodeValue,
             student_answer2: document.getElementById('question.' + i).lastElementChild.innerText,
             point: dragpoint
         };
     }

     $.ajax({
         type: 'POST',
         url: 'http://147.175.98.97/final/functions/save_drag.php',
         data: {
             "data": JSON.stringify(student_answers),
             "student": getCookie("id"),
             "testID": document.getElementById("testID").value
         },
         success: function (data) {

         }
     });

     document.getElementById("dcount").value = countCorrect;


 }
 else {
     document.getElementById("save").click();
 }

    }

    function redirect() {
        // window.location.replace("http://147.175.98.97/final/student.php");
        window.location.href = "http://147.175.98.97/final/student.php";
    }
</script>

<script>
    let canvas = document.getElementById('canvas');
    let context = canvas.getContext('2d');

    var radius = 2;  //不要犯蠢，第一次竟然打成0，根本就不會有東西跑出來啊
    var start = 0; //起始點
    var end = Math.PI * 2;  //結束點
    var dragging = false;

    context.lineWidth = radius * 2;  //試著改變參數，會發現裡頭有線連著

    var putPoint = function (e) {
        if (dragging) {
            context.strokeStyle = 'orangered';
            context.lineTo(e.offsetX, e.offsetY);
            context.stroke();
            context.beginPath(); //請把這條beginPath到fill一起看
            context.arc(e.offsetX, e.offsetY, radius, start, end);
            context.fill();  //填滿它
            context.beginPath();
            context.moveTo(e.offsetX, e.offsetY);
            context.lineJoin = "round";
            context.lineCap = "round";
        }
    }

    var engage = function (e) {
        dragging = true;
        putPoint(e);
    }

    var disengage = function () {
        dragging = false;
        context.beginPath();
    }

    canvas.addEventListener('mousedown', engage);
    canvas.addEventListener('mousemove', putPoint);//當有人在canvas上mousedown時觸發putPoint
    canvas.addEventListener('mouseup', disengage);
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>
<script src="js/student.js"></script>

<script>
    var error;
    let canvas2 = document.createElement('canvas');
    let gl = canvas2.getContext('webgl');

    let debugInfo = gl.getExtension('WEBGL_debug_renderer_info');
    let vendor = gl.getParameter(debugInfo.UNMASKED_VENDOR_WEBGL);
    let renderer = gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL).toString();

    if (vendor.includes("VM") || renderer.includes("VM")) {
        error = "This Student is using a Virtual Box";
        sendcheat(error);
    }

    const deviceType = () => {
        const ua = navigator.userAgent;
        if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
            return "tablet";
        } else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)) {
            return "mobile";
        }
        return "desktop";
    };

    const onVisibilityChange = () => {
        if (document.hidden) {
            console.log("Student Left the Tab");
            error = "Student Left the Tab";
            sendcheat(error);

        }
    }

    document.addEventListener("visibilitychange", onVisibilityChange);

    window.onfocus = function () {
        console.log('Student returned from another Window or Tab');
        error = "Student returned from another Window or Tab";
        sendcheat(error);

    }

    // Check if student used the Keyboard Combination CTRL + C / CTRL + V
    document.addEventListener('keyup', function (event) {
        event.preventDefault();
        if ((event.ctrlKey && event.key === 'c') || (event.ctrlKey && event.key === 'v')) {
            console.log("Student tried Copy/Paste");
            error = "Student tried Copy/Paste";
            sendcheat(error);
        }
    });

    if (deviceType() === "mobile") {
        alert("mobile device not supported");
        document.addEventListener("blur", function (event) {
            alert("The document doesn't have the focus.");
            error = "The document doesn't have the focus.";
            sendcheat(error);
        });
    }

    function sendcheat(error) {
        $.ajax({
            type: 'POST',
            url: 'http://147.175.98.97/final/functions/savecheat.php',
            data: {
                "data": error,
            },
            success: function (data) {

            }
        });
    }
</script>
</body>
</html>