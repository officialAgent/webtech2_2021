<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/css3.css">
    <link rel="stylesheet" href="css/css4.css" type="text/css">
    <title>Document</title>
</head>
<body>
<?php
include_once ('menu.php');

?>
<div id="content" class="container">
    <div class="card">
        <div class="face face1">
            <div class="content">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTIyMS4zMzk4NDQgMTc4LjAxMTcxOWMwIDIuNTkzNzUtLjkyNTc4MiA0LjgyMDMxMi0yLjc3MzQzOCA2LjY2Nzk2OS0xLjg1MTU2MiAxLjg0NzY1Ni00LjExNzE4NyAyLjc3MzQzNy02Ljc4OTA2MiAyLjc3MzQzNy0yLjY3NTc4MiAwLTQuOTQxNDA2LS45MjU3ODEtNi43ODkwNjMtMi43NzM0MzctMS44NDc2NTYtMS44NDc2NTctMi43NzM0MzctNC4xMTMyODItMi43NzM0MzctNi43ODkwNjN2LTY3Ljc2NTYyNWMwLTIuNTE1NjI1Ljk2NDg0NC00Ljc4MTI1IDIuODkwNjI1LTYuNzg1MTU2IDEuOTI5Njg3LTIuMDA3ODEzIDQuMTkxNDA2LTMuMDExNzE5IDYuNzg5MDYyLTMuMDExNzE5IDIuNTk3NjU3IDAgNC44MjAzMTMuOTY0ODQ0IDYuNjcxODc1IDIuODkwNjI1IDEuODQ3NjU2IDEuOTI5Njg4IDIuNzczNDM4IDQuMjM0Mzc1IDIuNzczNDM4IDYuOTA2MjV6bTAgMCIgZmlsbD0iI2ZmZWZlZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTI1Ni4wNTQ2ODggMTU3LjcxODc1djE5LjI0MjE4OGMwIDIuNTk3NjU2LS45NDUzMTMgNC44Mzk4NDMtMi44MzU5MzggNi43MzA0NjgtMS44ODY3MTkgMS44OTA2MjUtNC4xMjg5MDYgMi44MzIwMzItNi43MjY1NjIgMi44MzIwMzItMi41OTc2NTcgMC00LjgzOTg0NC0uOTQxNDA3LTYuNzMwNDY5LTIuODMyMDMycy0yLjgzMjAzMS00LjIxMDkzNy0yLjgzMjAzMS02Ljk2NDg0NHYtNjYuMzQ3NjU2YzAtMi44MzU5MzcuOTYwOTM3LTUuMjE0ODQ0IDIuODkwNjI0LTcuMTQ0NTMxIDEuOTI1NzgyLTEuOTI1NzgxIDQuMjY5NTMyLTIuODkwNjI1IDcuMDIzNDM4LTIuODkwNjI1aDIyLjQyOTY4OGM4Ljg5MDYyNCAwIDE2LjEzMjgxMiAyLjY3NTc4MSAyMS43MjI2NTYgOC4wMjczNDQgNS41ODU5MzcgNS4zNTE1NjIgOC4zODI4MTIgMTIuMzIwMzEyIDguMzgyODEyIDIwLjg5NDUzMSAwIDguNS0yLjY0MDYyNSAxNS4zNzEwOTQtNy45MTAxNTYgMjAuNjAxNTYzLTUuMjczNDM4IDUuMjM0Mzc0LTEyLjI3NzM0NCA3Ljg1MTU2Mi0yMS4wMTU2MjUgNy44NTE1NjJ6bTAtNDAuMjU3ODEydjIzLjQ5MjE4N2gxMi4xNTYyNWMzLjA3MDMxMiAwIDUuNzQ2MDkzLTEuMTQwNjI1IDguMDI3MzQzLTMuNDIxODc1IDIuMjg1MTU3LTIuMjg1MTU2IDMuNDI1NzgxLTUgMy40MjU3ODEtOC4xNDg0MzggMC0zLjMwNDY4Ny0xLjA4MjAzMS02LjExNzE4Ny0zLjI0NjA5My04LjQ0MTQwNi0yLjE2Nzk2OS0yLjMyMDMxMi00Ljg1OTM3NS0zLjQ4MDQ2OC04LjA4OTg0NC0zLjQ4MDQ2OHptMCAwIiBmaWxsPSIjZmZlZmVmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtNDM3LjIxODc1IDM1OC45MTAxNTZjLTMuMjY5NTMxLTQuNDUzMTI1LTkuNTMxMjUtNS40MTQwNjItMTMuOTg4MjgxLTIuMTQ0NTMxLTQuNDUzMTI1IDMuMjY5NTMxLTUuNDE0MDYzIDkuNTM1MTU2LTIuMTQwNjI1IDEzLjk4ODI4MSAxNC40NzY1NjIgMTkuNzE0ODQ0IDI1LjQyNTc4MSA0MS4zMzU5MzggMzIuNjQwNjI1IDY0LjE4NzUtMjEuNDIxODc1LTIxLjk4MDQ2OC01My4yMDcwMzEtNDAuMjczNDM3LTkyLjA4OTg0NC01Mi42OTkyMTgtMS4wMzEyNS0zLjIyNjU2My0yLjA5Mzc1LTYuNDI5Njg4LTMuMjEwOTM3LTkuNTc4MTI2LTEyLjEyODkwNy0zNC4wODU5MzctMjguODA4NTk0LTYyLjA2NjQwNi00OC41NDI5NjktODEuNjMyODEyLjA5NzY1Ni0uMTIxMDk0LjE5OTIxOS0uMjQ2MDk0LjI5Njg3NS0uMzY3MTg4IDIxLjQ4NDM3NSA2LjkyOTY4OCA0MS43MzA0NjggMTcuMDcwMzEzIDYwLjI1NzgxMiAzMC4yMjY1NjMgMS43NTc4MTMgMS4yNSAzLjc4MTI1IDEuODQ3NjU2IDUuNzg1MTU2IDEuODQ3NjU2IDMuMTMyODEzIDAgNi4yMTQ4NDQtMS40NjQ4NDMgOC4xNjc5NjktNC4yMTA5MzcgMy4xOTkyMTktNC41MDc4MTMgMi4xNDA2MjUtMTAuNzUzOTA2LTIuMzY3MTg3LTEzLjk1MzEyNS0xOC4xNjAxNTYtMTIuODk0NTMxLTM3LjgzMjAzMi0yMy4xNDQ1MzEtNTguNjQ0NTMyLTMwLjU3MDMxMyAzMi45MTc5NjktNDIuODU5Mzc1IDYwLjMwODU5NC04OS41MDc4MTIgNjAuMzA4NTk0LTEzMi4zMDQ2ODcgMC03OC4xMzI4MTMtNjMuNTYyNS0xNDEuNjk5MjE5LTE0MS42OTE0MDYtMTQxLjY5OTIxOXMtMTQxLjY5MTQwNiA2My41NjY0MDYtMTQxLjY5MTQwNiAxNDEuNjk5MjE5YzAgMzAuNDQ1MzEyIDEzLjkyNTc4MSA2NS42NjAxNTYgNDIuNTcwMzEyIDEwNy42NTYyNSA1LjY2Nzk2OSA4LjMwODU5MyAxMS42ODM1OTQgMTYuNTM1MTU2IDE3Ljg3NSAyNC42MjEwOTMtNDMuNzc3MzQ0IDE1LjY1MjM0NC04Mi44ODY3MTggNDQuMTQwNjI2LTExMS4yNTM5MDYgODEuMzE2NDA3LTMyLjM4MjgxMiA0Mi40Mzc1LTQ5LjUgOTMuMTY3OTY5LTQ5LjUgMTQ2LjY5OTIxOSAwIDUuNTI3MzQzIDQuNDgwNDY5IDEwLjAwNzgxMiAxMC4wMDM5MDYgMTAuMDA3ODEyaDQ2My45ODgyODJjNS41MjczNDMgMCAxMC4wMDc4MTItNC40ODA0NjkgMTAuMDA3ODEyLTEwLjAwNzgxMiAwLTUxLjkyNTc4Mi0xNi4xNzU3ODEtMTAxLjQwMjM0NC00Ni43ODEyNS0xNDMuMDgyMDMyem0tOTkuMDE5NTMxIDE2Ljc2OTUzMmMtMTUuNTIzNDM4LTMuNzYxNzE5LTMxLjk1NzAzMS02LjYzNjcxOS00OS4xMTMyODEtOC41MjczNDQtMS45NDE0MDctMTIuMjE0ODQ0LTguNjEzMjgyLTIzLjE3MTg3NS0xOC4zNTE1NjMtMzAuNTYyNSA4LjUwMzkwNi05LjU2NjQwNiAxNy4zOTQ1MzEtMTkuNjU2MjUgMjYuMjk2ODc1LTMwLjEzMjgxMyAxNi42Njc5NjkgMTYuOTcyNjU3IDMwLjY3OTY4OCA0MC44Nzg5MDcgNDEuMTY3OTY5IDY5LjIyMjY1N3ptLTIxNy44Nzg5MDctMjMzLjk4MDQ2OWMwLTY3LjA5NzY1NyA1NC41ODU5MzgtMTIxLjY4NzUgMTIxLjY3OTY4OC0xMjEuNjg3NXMxMjEuNjc5Njg4IDU0LjU4OTg0MyAxMjEuNjc5Njg4IDEyMS42ODc1YzAgNjAuNDY0ODQzLTY5LjEyNSAxMzguMDc0MjE5LTExNC44NjcxODggMTg5LjQyNTc4MS0yLjMzMjAzMSAyLjYxNzE4OC00LjYwMTU2MiA1LjE2NDA2Mi02LjgwODU5NCA3LjY1MjM0NC0yLjEzMjgxMi0yLjQwMjM0NC00LjMyNDIxOC00Ljg2MzI4Mi02LjU3MDMxMi03LjM4NjcxOS00NS44Mzk4NDQtNTEuNTAzOTA2LTExNS4xMTMyODItMTI5LjMzNTkzNy0xMTUuMTEzMjgyLTE4OS42OTE0MDZ6bTkyLjk2MDkzOCAxOTQuODk0NTMxYy05LjczMDQ2OSA3LjM4NjcxOS0xNi4zOTg0MzggMTguMzM5ODQ0LTE4LjMzOTg0NCAzMC41NTg1OTQtMTcuMTcxODc1IDEuODg2NzE4LTMzLjYxMzI4MSA0Ljc2NTYyNS00OS4xNDg0MzcgOC41MzEyNSAxMC41LTI4LjM3MTA5NCAyNC41MjM0MzctNTIuMjkyOTY5IDQxLjIxMDkzNy02OS4yNjk1MzIgOC45OTIxODggMTAuNjEzMjgyIDE3Ljg5MDYyNSAyMC43MzA0NjkgMjYuMjc3MzQ0IDMwLjE3OTY4OHptLTEwOC41NjY0MDYgMTU1LjM5NDUzMWgtODMuODY3MTg4YzUuODM1OTM4LTM0Ljk4NDM3NSA0MS45MjU3ODItNjYuNSA5NC45MDIzNDQtODYuMTk5MjE5LTYuNTk3NjU2IDI3LjEzMjgxMy0xMC4zNTE1NjIgNTYuMzA4NTk0LTExLjAzNTE1NiA4Ni4xOTkyMTl6bS03NC4xMDU0NjktNTcuMzk4NDM3YzIxLjU1ODU5NC02Ny4wMzUxNTYgNzQuNDAyMzQ0LTEyMS43NTc4MTMgMTQzLjMxNjQwNi0xNDMuOTQxNDA2LjA4NTkzOC4xMDU0NjguMTY3OTY5LjIwNzAzMS4yNTM5MDcuMzEyNS0xOS43NjU2MjYgMTkuNTY2NDA2LTM2LjQ2NDg0NCA0Ny41NjY0MDYtNDguNjA1NDY5IDgxLjY3OTY4Ny0xLjEyMTA5NCAzLjE1NjI1LTIuMTg3NSA2LjM2NzE4Ny0zLjIyMjY1NyA5LjYwNTQ2OS0zOC42NzE4NzQgMTIuMzU5Mzc1LTcwLjMyODEyNCAzMC41MTk1MzEtOTEuNzQyMTg3IDUyLjM0Mzc1em0yMDEuMzgyODEzIDU3LjM5ODQzN2gtMTA3LjI2OTUzMmMuODA0Njg4LTMzLjE3MTg3NSA1LjYwOTM3NS02NS4wNTQ2ODcgMTMuNjkxNDA2LTkzLjYwNTQ2OSAxNy44NzUtNS4wODIwMzEgMzcuMjA3MDMyLTguOTEwMTU2IDU3LjU5NzY1Ny0xMS4yMjI2NTYgNC42NTIzNDMgMTcuMTUyMzQ0IDE4LjU2MjUgMzAuMzI4MTI1IDM1Ljk4NDM3NSAzNC4wMjczNDR2NzAuODAwNzgxem0xMi44MjgxMjQtODkuOTEwMTU2Yy0xLjQ1NzAzMS4xNDg0MzctMi45MjE4NzQuMTc1NzgxLTQuMzc4OTA2LjA5Mzc1LTE0LjUxNTYyNS0uODEyNS0yNi4wNzgxMjUtMTIuODc1LTI2LjA3ODEyNS0yNy41ODk4NDQgMC05LjMzMjAzMSA0Ljc0NjA5NC0xNy45MjE4NzUgMTIuMjY1NjI1LTIyLjk3MjY1NiAyLjcxNDg0NCAzLjA1NDY4NyA1LjMzOTg0NCA2LjAyMzQzNyA3Ljg1MTU2MyA4Ljg4MjgxMyAxLjg5ODQzNyAyLjE2NDA2MiA0LjY0MDYyNSAzLjQwNjI1IDcuNTE5NTMxIDMuNDA2MjVzNS42MjEwOTQtMS4yNDIxODggNy41MTk1MzEtMy40MDYyNWMyLjUxMTcxOS0yLjg2MzI4MiA1LjE0NDUzMS01LjgzNTkzOCA3Ljg1OTM3NS04Ljg5MDYyNiA3LjUzMTI1IDUuMDU0Njg4IDEyLjI4MTI1IDEzLjY0ODQzOCAxMi4yODEyNSAyMi45ODA0NjkgMCAzLjY5MTQwNy0uNzYxNzE4IDcuNDA2MjUtMi4xOTkyMTggMTAuODA0Njg4LTMuODU5Mzc2IDkuMDQyOTY5LTEyLjQxMDE1NyAxNS42Mjg5MDYtMjIuNTgyMDMyIDE2LjY4MzU5My0uMDE5NTMxIDAtLjAzOTA2Mi4wMDM5MDctLjA1ODU5NC4wMDc4MTMtLjQwNjI1LjAzOTA2My4wMTk1MzItLjAwMzkwNiAwIDAtMS40NTcwMzEuMTQ4NDM3LjAxOTUzMi0uMDAzOTA2IDAgMHptNy4xODc1IDg5LjkxMDE1NnYtNzAuODAwNzgxYzE2Ljg1OTM3Ni0zLjU4MjAzMSAzMC40Mjk2ODgtMTYuMDM5MDYyIDM1LjQ5NjA5NC0zMi4zODY3MTkuMDQyOTY5LS4xMzI4MTIuMDc4MTI1LS4yNjk1MzEuMTE3MTg4LS40MDIzNDMuMTI1LS40MTAxNTcuMjUtLjgyMDMxMy4zNjMyODEtMS4yMzgyODIgMjAuMzk0NTMxIDIuMzEyNSAzOS43MjY1NjMgNi4xMzY3MTkgNTcuNTk3NjU2IDExLjIxODc1IDguMDg1OTM4IDI4LjU1NDY4OCAxMi44OTA2MjUgNjAuNDQxNDA2IDEzLjY5NTMxMyA5My42MDkzNzV6bTEyNy4yNzczNDQgMGMtLjY4MzU5NC0yOS44OTA2MjUtNC40NDE0MDYtNTkuMDY2NDA2LTExLjAzOTA2Mi04Ni4yMDMxMjUgNTIuOTc2NTYyIDE5LjcwMzEyNSA4OS4wNzAzMTIgNTEuMjE0ODQ0IDk0LjkwNjI1IDg2LjIwMzEyNXptMCAwIiBmaWxsPSIjZmZlZmVmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtMjQyIDI0MS43ODUxNTZjLTU0LjI2NTYyNSAwLTk4LjQxMDE1Ni00NC4xNDg0MzctOTguNDEwMTU2LTk4LjQxNDA2MiAwLTU0LjI4MTI1IDQ0LjE0NDUzMS05OC40NDE0MDYgOTguNDEwMTU2LTk4LjQ0MTQwNiA1NC4yNzczNDQgMCA5OC40Mzc1IDQ0LjE2MDE1NiA5OC40Mzc1IDk4LjQ0MTQwNiAwIDU0LjI2NTYyNS00NC4xNjAxNTYgOTguNDE0MDYyLTk4LjQzNzUgOTguNDE0MDYyem0wLTE3Ni44NDc2NTZjLTQzLjIzMDQ2OSAwLTc4LjM5ODQzOCAzNS4xODM1OTQtNzguMzk4NDM4IDc4LjQzMzU5NCAwIDQzLjIzMDQ2OCAzNS4xNjc5NjkgNzguNDAyMzQ0IDc4LjM5ODQzOCA3OC40MDIzNDQgNDMuMjQ2MDk0IDAgNzguNDI1NzgxLTM1LjE3MTg3NiA3OC40MjU3ODEtNzguNDAyMzQ0IDAtNDMuMjUtMzUuMTc5Njg3LTc4LjQzMzU5NC03OC40MjU3ODEtNzguNDMzNTk0em0wIDAiIGZpbGw9IiNmZmVmZWYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im00MDYuMDMxMjUgMzQ3Ljk2ODc1Yy0yLjkzMzU5NCAwLTUuODQzNzUtMS4yODUxNTYtNy44MjAzMTItMy43NTc4MTJsLS4xMTMyODItLjE0MDYyNmMtMy40NDkyMTgtNC4zMTY0MDYtMi43NS0xMC42MTMyODEgMS41NjI1LTE0LjA2NjQwNiA0LjMxNjQwNi0zLjQ1MzEyNSAxMC42MTMyODItMi43NSAxNC4wNjY0MDYgMS41NjI1bC4xMTMyODIuMTQ0NTMyYzMuNDQ5MjE4IDQuMzEyNSAyLjc1IDEwLjYwOTM3NC0xLjU2MjUgMTQuMDYyNS0xLjg0Mzc1IDEuNDc2NTYyLTQuMDU0Njg4IDIuMTk1MzEyLTYuMjQ2MDk0IDIuMTk1MzEyem0wIDAiIGZpbGw9IiNmZmVmZWYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiPjwvcGF0aD48L2c+PC9zdmc+" />                <h3>IP</h3>
            </div>
        </div>
        <div class="face face2">
            <div id="IP" class="content">


            </div>
        </div>
    </div>
    <div  class="card">
        <div class="face face1">
            <div class="content">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTI1NiwwQzE1Ni43NDgsMCw3Niw4MC43NDgsNzYsMTgwYzAsMzMuNTM0LDkuMjg5LDY2LjI2LDI2Ljg2OSw5NC42NTJsMTQyLjg4NSwyMzAuMjU3ICAgIGMyLjczNyw0LjQxMSw3LjU1OSw3LjA5MSwxMi43NDUsNy4wOTFjMC4wNCwwLDAuMDc5LDAsMC4xMTksMGM1LjIzMS0wLjA0MSwxMC4wNjMtMi44MDQsMTIuNzUtNy4yOTJMNDEwLjYxMSwyNzIuMjIgICAgQzQyNy4yMjEsMjQ0LjQyOCw0MzYsMjEyLjUzOSw0MzYsMTgwQzQzNiw4MC43NDgsMzU1LjI1MiwwLDI1NiwweiBNMzg0Ljg2NiwyNTYuODE4TDI1OC4yNzIsNDY4LjE4NmwtMTI5LjkwNS0yMDkuMzQgICAgQzExMy43MzQsMjM1LjIxNCwxMDUuOCwyMDcuOTUsMTA1LjgsMTgwYzAtODIuNzEsNjcuNDktMTUwLjIsMTUwLjItMTUwLjJTNDA2LjEsOTcuMjksNDA2LjEsMTgwICAgIEM0MDYuMSwyMDcuMTIxLDM5OC42ODksMjMzLjY4OCwzODQuODY2LDI1Ni44MTh6IiBmaWxsPSIjZmZmNWY1IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxnPgoJCTxwYXRoIGQ9Ik0yNTYsOTBjLTQ5LjYyNiwwLTkwLDQwLjM3NC05MCw5MGMwLDQ5LjMwOSwzOS43MTcsOTAsOTAsOTBjNTAuOTAzLDAsOTAtNDEuMjMzLDkwLTkwQzM0NiwxMzAuMzc0LDMwNS42MjYsOTAsMjU2LDkweiAgICAgTTI1NiwyNDAuMmMtMzMuMjU3LDAtNjAuMi0yNy4wMzMtNjAuMi02MC4yYzAtMzMuMDg0LDI3LjExNi02MC4yLDYwLjItNjAuMnM2MC4xLDI3LjExNiw2MC4xLDYwLjIgICAgQzMxNi4xLDIxMi42ODMsMjg5Ljc4NCwyNDAuMiwyNTYsMjQwLjJ6IiBmaWxsPSIjZmZmNWY1IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==" />

                <h3>City</h3>
            </div>
        </div>
        <div class="face face2">
            <div  class="content">
               <p id="CITY"></p>
                <p id="COUNTRY"></p>
                <p id="CAPITAL"></p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="face face1">
            <div class="content">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDM4NCAzODQiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTE5MiwxMzZjLTMwLjg3MiwwLTU2LDI1LjEyLTU2LDU2czI1LjEyOCw1Niw1Niw1NnM1Ni0yNS4xMiw1Ni01NlMyMjIuODcyLDEzNiwxOTIsMTM2eiBNMTkyLDIxNiAgICBjLTEzLjIzMiwwLTI0LTEwLjc2OC0yNC0yNHMxMC43NjgtMjQsMjQtMjRzMjQsMTAuNzY4LDI0LDI0UzIwNS4yMzIsMjE2LDE5MiwyMTZ6IiBmaWxsPSIjZmZmNWY1IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxnPgoJCTxwYXRoIGQ9Ik0zNjgsMTc2aC0zMi45NDRDMzI3LjY0OCwxMDkuMzY4LDI3NC42MzIsNTYuMzUyLDIwOCw0OC45NDRWMTZjMC04LjgzMi03LjE2OC0xNi0xNi0xNmMtOC44MzIsMC0xNiw3LjE2OC0xNiwxNnYzMi45NDQgICAgQzEwOS4zNjgsNTYuMzUyLDU2LjM1MiwxMDkuMzY4LDQ4Ljk0NCwxNzZIMTZjLTguODMyLDAtMTYsNy4xNjgtMTYsMTZjMCw4LjgzMiw3LjE2OCwxNiwxNiwxNmgzMi45NDQgICAgQzU2LjM1MiwyNzQuNjMyLDEwOS4zNjgsMzI3LjY0OCwxNzYsMzM1LjA1NlYzNjhjMCw4LjgzMiw3LjE2OCwxNiwxNiwxNmM4LjgzMiwwLDE2LTcuMTY4LDE2LTE2di0zMi45NDQgICAgYzY2LjYzMi03LjQwOCwxMTkuNjQ4LTYwLjQyNCwxMjcuMDU2LTEyNy4wNTZIMzY4YzguODMyLDAsMTYtNy4xNjgsMTYtMTZDMzg0LDE4My4xNjgsMzc2LjgzMiwxNzYsMzY4LDE3NnogTTE5MiwzMDQgICAgYy02MS43NiwwLTExMi01MC4yNC0xMTItMTEyUzEzMC4yNCw4MCwxOTIsODBzMTEyLDUwLjI0LDExMiwxMTJTMjUzLjc2LDMwNCwxOTIsMzA0eiIgZmlsbD0iI2ZmZjVmNSIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" />
                <h3>GPS</h3>
            </div>
        </div>
        <div class="face face2">
            <div id="GPS" class="content">

            </div>
        </div>
    </div>
</div>


<?php


include_once("config.php");
include_once("func.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=z7", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}

$sql = "SELECT * FROM pages
        WHERE name=?  ";
$stm = $conn->prepare($sql);
$stm->bindValue(1,pathinfo(__FILE__, PATHINFO_FILENAME));
$stm->execute();
$row99 = $stm->fetch(PDO::FETCH_ASSOC);
$sql = "UPDATE pages SET visited=?
                WHERE id=?";
$stm = $conn->prepare($sql);
$stm->bindValue(1,$row99['visited']+1);
$stm->bindValue(2,$row99['id']);
$stm->execute();

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

echo "<input type='hidden' id='adat' value='$ip' >";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    var NEV= document.getElementById('adat').value

    $.ajax({
        type: 'GET',
        url: 'https://api.ipregistry.co/'+ NEV+'?key=mc6ccf5mrtiuu6',
        success: function (data2) {

            document.getElementById('IP').append(NEV)
            document.getElementById('COUNTRY').append(data2.location.country.name)
            document.getElementById('CAPITAL').append(data2.location.country.capital)
            if (data2.location.city==null){
                document.getElementById('CITY').append('no city found')
            }
            else {
                document.getElementById('CITY').append(data2.location.city)
            }



            document.getElementById('GPS').append(data2.location.latitude)
            document.getElementById('GPS').append("\n"+data2.location.longitude)



        }
    });
</script>

<script >


    const $icon = $('.menu-btn');
    const $menu = $('.overlay');

    $icon.on('click', function () {
        if (!$menu.hasClass('active')) {
            $menu.fadeIn().toggleClass('active');
            document.getElementById('content').style.display = "none";
        } else {
            $menu.fadeOut().removeClass('active');
            document.getElementById('content').style.display = "flex";
        }
    });
</script>
</body>
</html>




