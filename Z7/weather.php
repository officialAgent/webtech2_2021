<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900" rel="stylesheet">


    <style>
        body {
            font-family: Verdana;
            margin: 0;
            padding: 0;
            background: #333;
        }

        #inputs {
            margin: 10px auto;
            text-align: center;
        }

        input {
            width: 500px;
            height: 40px;
            font-size: 1.5em;
            color: black;
            padding: 0;

        }

        #getWeather {
            height: 42px;
            width: 150px;
            border: none;
            background: #FF4141;
            color: #ffe;
            font-size: 1.1em;
            vertical-align: top;
        }

        h1 {
            text-align: center;
            color: #fff;
            font-size: 1.7em;
        }

        #main {
            margin-top: 50px;
            display: grid;
            grid-template-columns: repeat(3,1fr);
            grid-gap: 15px;
        }


        .update {
            box-shadow: 5px 5px 5px #333;
            border-radius: 15px;
            text-align: center;
            color: #ffe;
            max-width: 334px;
        }


        .icon {
            padding: 5px;
            border-radius: 50%;
            width: 40%;
            height: 30%;
            margin: 0 auto;
            background: #90E0EF;
            max-width: 140px;
        }

        p {
            font-weight: 500;
            font-size: 1.2em;
        }


        @media only screen and (min-width: 1022px) {
            #main {
                grid-template-columns: repeat(3,330px);
                justify-content: center;
            }
            .icon {
                width: 35%;
            }
        }
    </style>
    <link rel="stylesheet" href="css/css4.css" type="text/css">
</head>
<body>
<?php
include_once ('menu.php');

?>
<div id="inputs">
    <input type="text" placeholder="Location..." id="userInput">
    <button id="getWeather">Get Forecast</button>
</div>
<h1 id="location"></h1>
<div id="main">


</div>
<?php

/*api.openweathermap.org/data/2.5/weather?q=Bratislava&APPID=5f90757eaa4d1abb55a390f574ea6bc8*/


/*if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



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
?>

<?php



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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    let main = document.getElementById("main");
    let title = document.getElementById("location");
    var url = "https://api.openweathermap.org/data/2.5/forecast?q=";
    const getBtn = document.getElementById("getWeather");
    let input = document.getElementById("userInput");
    let temperature = document.querySelector("temp");
    let icons = "http://openweathermap.org/img/wn/";
    let loc = "";
    let date = "";
    let time = "";
    let background = "";
    let night = "https://i.imgur.com/rXL4gjh.png";
    let sunrise = "https://i.imgur.com/fTC8pAv.png";
    let day = "https://i.imgur.com/wel6qyj.png"
    var varos=0 ;
    //RUN THE DEFAULT FORECAST ONCE THE PAGE LOADS
    window.onload = getWeather();

    //EVENT LISTENER FOR CLICKING ON GET FORECAST BUTTON
    getBtn.addEventListener("click", function () {
        varos=1;
        getWeather();

    });

    //EVENT LISTENER FOR PRESSING ENTER
    input.addEventListener("keyup", function(e){
        if(e.key === "Enter"){
            varos=1;
            getWeather();
        }
    });

    function nextCity(data){
        $.ajax({
            type: 'GET',
            url: 'https://api.opencagedata.com/geocode/v1/json?q='+data +'&key=f89957db0a0249c2ac11390928705102&language=en&pretty=1&no_annotations=1',
            success: function (data) {


                $.ajax({
                    type: 'GET',
                    url: 'https://api.openweathermap.org/data/2.5/forecast?lat=47.8517086&lon=17.7325717&appid=4bd375ae392fd932766eeb5bd0b6633e',
                    success: function (data2) {


                        printW(data2);


                    }
                });

            }
        });
    }

    function getWeather() {
        //EMPTY THE INNER HTML TO ALLOW FOR A NEW LOCATION FORECAST
        main.innerHTML = "";
        title.innerHTML = "";
        //SET THE LOCATION FROM THE USER INPUT
        var NEV= document.getElementById('adat').value


        if (varos==0){
        $.ajax({
            type: 'GET',
            url: 'https://api.ipregistry.co/'+ NEV+'?key=mc6ccf5mrtiuu6',
            success: function (data2) {


                var u='https://api.openweathermap.org/data/2.5/forecast?lat=';
                var key ='&appid=4bd375ae392fd932766eeb5bd0b6633e';
                var p='&lon=';
                $.ajax({
                    type: 'GET',
                    url: u + data2.location.latitude  +p + data2.location.longitude+ key,
                    success: function (data3) {
                        if (data3.cod !== "200"){

                            nextCity(data2.location.country.capital);

                        }
                        else {
                            printW(data3);
                        }
                    }
                });
            }
        });
        }
        else {

       loc = input.value;
        fetch(url + loc + "&appid=4bd375ae392fd932766eeb5bd0b6633e")
            .then((response) => response.json())
            .then((data) => {

                if (data.cod !== "200"){

                    nextCity(loc);

                }
                else {
                    printW(data);
 }
            });
        }
    }

    //url + 'London&appid=4bd375ae392fd932766eeb5bd0b6633e'

    function printW (data){
        //SET THE TITLE WITH THE NAME OF THE LOCATION
        title.innerHTML += `<h1>24hr Weather forecast for ${data.city.name}</h1>`

        for (let i = 0; i < 9; i++) {
            //SET THE BACKGROUND DEPENDING ON THE TIME OF DAY
            date =  data.list[i].dt_txt;
            time = data.list[i].dt_txt.slice(10,16).slice(0,3);
            if(Number(time) > 19){
                background = night;
            } else if(Number(time) > 5 && Number(time) < 9){
                background = sunrise;
            } else if(Number(time) > 9 && Number(time) < 19){
                background = day;
            }
            //RENDER THE API DATA
            main.innerHTML += `
      <div class="update" style="background: url(${background}); background-size: cover">
      <h2>${data.list[i].weather[0].main}</h2>

      <div class="icon" style="border: 5px solid #10A1E5">
       <img src="${icons + data.list[i].weather[0].icon}@2x.png"/>
       </div>
     <p>${date.slice(8,10)}-${date.slice(5,7)}-${date.slice(0,4)}</p>
      <p>${data.list[i].dt_txt.slice(10,16)}</p>
      <p>${data.list[i].weather[0].description}</p>
      <p>${Math.round(data.list[i].main.temp - 273.15)}°C</p>

     </div>
     `
            ;
        }
    }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js.js"></script>
</body>
</html>