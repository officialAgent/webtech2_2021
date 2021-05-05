<!DOCTYPE HTML>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <title>
        Zadanie 5
    </title>
    <link rel="stylesheet" href="css.css" type="text/css">


</head>
<body onresize="resize();">
<header>
    <h2>
        Zadanie 5 <br> Graf
    </h2>
</header>

<div id="data">
    <form  method="POST" >
        <label class="checkbox-inline">
            <input type="checkbox" value="sin" id="sin2" >sin^2
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" value="cos" id="cos2" >cos^2
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" value="sin_cos" id="sin_cos">sin * cos
        </label><br>
        <label for="coefficient">
            Coefficient
            <input type="number" id="coefficient">
        </label>
        <input type="submit" value="Generate" onclick="saveValueToCookie()">
    </form>
    <div id="result"></div>
</div>
<div id=ovladanie>

    <br>
    <button class="btn-grad" onclick="stop();">STOP</button>

</div>

<div id="graf">
    <div id="sincos">
       <!-- <input type="checkbox" name="sin" value="sinus" id="sinus" onclick="showHide()">Sin(x)<br>
        <input type="checkbox" name="cos" value="kosinus" id="kosinus" onclick="showHide()">Cos(x)<br>-->

    </div>
</div>

<div id="zoom">



</div>

<footer>


    <h3>
        © Tibor Ladi, 2021
    </h3>
</footer>




<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<script src="js.js" async defer></script>
</body>
</html>