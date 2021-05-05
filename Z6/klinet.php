<!doctype html>
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
<div class="login-box">
    <h2>Calendar</h2>
    <form>
        <div class="selector">
            <select name="cars" id="mode">
                <option value="a">
                    Who has a name day on a given day</option>
                <option value="b">Person with that name in the State</option>
                <option value="c">SK holidays</option>
                <option value="d">CZ holidays</option>
                <option value="e"> SK DAYS</option>
                <option value="f">Add new name to calendar</option>
            </select>
        </div>


        <div class="MODE" id="a">
        <div class="user-box">
            <input id="datum" type="date" name="" required="" >
            <label></label>
        </div>
        <div class="user-box">
            <select name="country" id="country">
                <option value="1">Maďarsko</option>
                <option value="2">Poľsko</option>
                <option value="3">Rakúsko</option>
                <option value="4">Slovensko</option>
                <option value="5">SLOVENSKO EXTRA</option>
                <option value="6">Česká republika</option>
            </select>
        </div>

        </div>


        <div class="MODE" id="b">
            <div class="user-box">
                <input id="nev" type="text" name="" required="" >
                <label>Name</label>
            </div>
            <div class="user-box">
                <select name="country2" id="country2">
                    <option value="1">Maďarsko</option>
                    <option value="2">Poľsko</option>
                    <option value="3">Rakúsko</option>
                    <option value="4">Slovensko</option>
                    <option value="5">SLOVENSKO EXTRA</option>
                    <option value="6">Česká republika</option>
                </select>
            </div>

        </div>


        <div class="MODE" id="c">
            <div class="user-box">
               <h3>Itt will retrun SK holidays</h3>
            </div>


        </div>

        <div class="MODE" id="d">
            <div class="user-box">
                <h3>Itt will retrun CZ holidays</h3>
            </div>


        </div>

        <div class="MODE" id="e">
            <div class="user-box">
                <h3>Itt will retrun SK DAYS</h3>
            </div>


        </div>


        <div class="MODE" id="f">
            <div class="user-box">
                <input id="nevadd" type="text" name="" required="" >
                <label>Name</label>
            </div>
            <div class="user-box">
                <input id="datum2" type="date" name="" required="" >
            </div>

        </div>


        <a  id="submit2">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
        </a>

        <a onclick="window.location.href = 'document.php'";   id="submit3">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Documentation
        </a>

    </form>
</div>
<div id="myDiv"></div>


<script>


    window.onload = function (){
        var osztaly= document.getElementsByClassName('MODE');

        for (i=0;i<osztaly.length;i++){
            osztaly[i].style.display='none';
        }

        document.getElementById('a').style.display='block'

    }

    document.getElementById("mode").addEventListener('change',function (){


           var osztaly= document.getElementsByClassName('MODE');

           for (i=0;i<osztaly.length;i++){
               osztaly[i].style.display='none';
           }

           document.getElementById(this.value).style.display='block'



    })

    $(document).ready(function(){
        $("#submit2").click(function(){
            var mode= $("#mode").val();
            if ( mode === 'a') {

                var d= $("#datum").val();
                var orszag= $("#country").val();
                var afterDot = d.substr(d.indexOf('-')+1);
                var nap= afterDot.slice(-2)
                var honap = afterDot.slice(0,2)


                if (afterDot[0] === '0'){
                    afterDot = d.substr(d.indexOf('-')+2);
                    honap = afterDot.slice(0,1)

                }

                $.ajax({
                    type: 'GET',
                    url: 'http://147.175.98.97/Z6/index.php?day='+ nap +'&mo=' + honap+ '&co=' + orszag +'',
                    success: function (data) {

                        var responsedata = $.parseJSON(data);



                        var hossz=responsedata.hossz;


                        $("#myDiv").html('');
                        for (i=parseInt(hossz) ; i!==0; i--){


                            $("#myDiv").append( 'Name: '+responsedata[i-1]+ '<br>')   ;


                        }




                    }
                });
            }
            if ( mode === 'b') {


                var NEV= document.getElementById('nev').value
                var orszag= $("#country2").val();

                console.log(orszag);
                $.ajax({
                    type: 'GET',
                    url: 'http://147.175.98.97/Z6/index.php?value='+ NEV + '&co=' + orszag +'',
                    success: function (data) {

                        var responsedata = $.parseJSON(data);
                            $("#myDiv").html('');
                            $("#myDiv").append( 'Day: '+responsedata.nap+ '<br>' +'Month: ' +responsedata.honap)   ;


                    }
                });

            }

            if ( mode === 'c') {

                $.ajax({
                    type: 'GET',
                    url: 'http://147.175.98.97/Z6/index.php?skunnep=1',
                    success: function (data) {

                        var responsedata = $.parseJSON(data);
                        $("#myDiv").html('');
                        var hossz2=responsedata.hossz;
                        for (i=parseInt(hossz2) ; i!==0; i--){
                            console.log(i);

                            $("#myDiv").append( 'Holiday: '+responsedata[i-1].unnep + '    &nbsp &nbsp &nbsp   day:  '+ responsedata[i-1].nap+ ' &nbsp &nbsp &nbsp  Month:  ' + responsedata[i-1].honap+'<br>')   ;


                        }

                    }
                });

            }


            if ( mode === 'd') {

                $.ajax({
                    type: 'GET',
                    url: 'http://147.175.98.97/Z6/index.php?czunnep=1',
                    success: function (data) {

                        var responsedata = $.parseJSON(data);
                        $("#myDiv").html('');
                        var hossz2=responsedata.hossz;
                        for (i=parseInt(hossz2) ; i!==0; i--){
                            console.log(i);

                            $("#myDiv").append( 'Holiday: '+responsedata[i-1].unnep + '    &nbsp &nbsp &nbsp   day:  '+ responsedata[i-1].nap+ ' &nbsp &nbsp &nbsp  Month:  ' + responsedata[i-1].honap+'<br>')   ;


                        }

                    }
                });

            }

            if ( mode === 'e') {

                $.ajax({
                    type: 'GET',
                    url: 'http://147.175.98.97/Z6/index.php?sknap=1',
                    success: function (data) {

                        var responsedata = $.parseJSON(data);
                        $("#myDiv").html('');
                        var hossz2=responsedata.hossz;
                        for (i=parseInt(hossz2) ; i!==0; i--){
                            console.log(i);

                            $("#myDiv").append( 'Holiday: '+responsedata[i-1].unnep + '    &nbsp &nbsp &nbsp   day:  '+ responsedata[i-1].nap+ ' &nbsp &nbsp &nbsp  Month:  ' + responsedata[i-1].honap+'<br>')   ;


                        }

                    }
                });

            }


            if ( mode === 'f') {


                var NEV= document.getElementById('nevadd').value
                var d2= $("#datum2").val();
                var afterDot2 = d2.substr(d2.indexOf('-')+1);
                var nap2= afterDot2.slice(-2)
                var honap2 = afterDot2.slice(0,2)


                if (afterDot2[0] === '0'){
                    afterDot2 = d2.substr(d2.indexOf('-')+2);
                    honap2 = afterDot2.slice(0,1)

                }


                $.ajax({
                    type: 'POST',
                    url: 'http://147.175.98.97/Z6/index.php?&value='+ NEV + '&nap=' + nap2 + '&honap=' + honap2 +'',
                    data: '{"meno":"Miroslav","vek":"22","pohlavie":"M","opis":"student"}',

                    success: function (data) {

                        var responsedata = $.parseJSON(data);
                        $("#myDiv").html('');
                        $("#myDiv").append( 'Day: '+responsedata.nap+ '<br>' +'Month: ' +responsedata.honap)   ;


                    }
                });

            }

        });

    });
</script>
</body>
</html>