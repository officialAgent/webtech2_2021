<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css2.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head>
<body>



<div >
<div class="window">
    <div class="icons"><span></span></div>
    <div class="title">  Who has a name day on a given day  Klient.php</div>
    <pre class="lang-python"><code>
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


            Tu sa posielam den, mesiac a stat pre index.php a data ktor0 dostanem spat vypisem do div.

        </code></pre>
</div>

    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title"> Person with that name in the State  Klient.php</div>
        <pre class="lang-python"><code>
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


            Tu sa posielam meno  a stat pre index.php a data ktor0 dostanem spat vypisem do div.

        </code></pre>
    </div>




</div>


<div>
    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title">  Who has a name day on a given day  index.php</div>
        <pre class="lang-python"><code>
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['day'] ) && isset($_GET['co'] ) && isset($_GET['mo'] ) ) {


            $sql2 ="SELECT id FROM days
            WHERE day = ? and month=?";
            $stm2 = $conn->prepare($sql2);
            $stm2->bindValue(1,$_GET['day']);
            $stm2->bindValue(2,$_GET['mo']);
            $stm2->execute();
            $dayid = $stm2->fetch(PDO::FETCH_ASSOC);
            $sql = "select value from records JOIN days d on records.day_id = d.id where day_id=? AND country_id=?;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$dayid['id']);
            $stmt->bindValue(2,$_GET['co']);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $kons=0;
              foreach ($rows as $row) {
                  $myarray[''. $kons .''] = $row['value'];

                  $kons++;

              }
            $myarray['hossz'] = $kons;

            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);

        }
             Tu sa dostane program den, mesiac a stat program nájde v databáze a posiela vysledok naspäť.

        </code></pre>
    </div>



    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title"> Person with that name in the State  index.php</div>
        <pre class="lang-python"><code>
             else  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['value'] ) && isset($_GET['co'] )  ) {
            $sql = "select day_id from records  where value=? AND country_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$_GET['value']);
            $stmt->bindValue(2,$_GET['co']);
            $stmt->execute();
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            $sql2 ="SELECT day, month FROM days
            WHERE id = ?";
            $stm2 = $conn->prepare($sql2);
            $stm2->bindValue(1,$rows['day_id']);
            $stm2->execute();
            $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);
            $myarray['nap'] = $dayMonth['day'];
            $myarray['honap'] = $dayMonth['month'];
            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);


        }
             Tu sa dostane meno a  stat program nájde v databáze a posiela vysledok naspäť.

        </code></pre>
    </div>

</div>

<div>
    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title">SK Holiday Klient.php</div>
        <pre class="lang-python"><code>
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


            Tu sa posielam konkretnu poziadavku pre SK sviatky  a data ktor0 dostanem spat vypisem do div.

        </code></pre>
    </div>

    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title">cz Holiday Klient.php</div>
        <pre class="lang-python"><code>
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


             Tu sa posielam konkretnu poziadavku pre CZ sviatky  a data ktor0 dostanem spat vypisem do div.

        </code></pre>
    </div>



</div>

<div>

    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title"> SK Holiday  index.php</div>
        <pre class="lang-python"><code>
                else  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['skunnep'] )   ) {
            $sql = "select value, day_id from records  where type=? AND country_id=?;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,'holiday');
            $stmt->bindValue(2,4);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $kons=0;
            foreach ($rows as $row) {

                $sql2 ="SELECT day, month FROM days
            WHERE id = ?";
                $stm2 = $conn->prepare($sql2);
                $stm2->bindValue(1,$row['day_id']);
                $stm2->execute();
                $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);

                $myarray2['nap'] = $dayMonth['day'];
                $myarray2['honap'] = $dayMonth['month'];
                $myarray2['unnep'] = $row['value'];
                $myarray[''. $kons .''] = $myarray2;
                $kons++;
            }
            $myarray['hossz'] = $kons;

            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);
        }
             Tu sa  program nájde v databáze SK sviatky a posiela vysledok naspäť.

        </code></pre>
    </div>




    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title"> cz Holiday  index.php</div>
        <pre class="lang-python"><code>
                       else  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['czunnep'] )   ) {


            $sql = "select value, day_id from records  where type=? AND country_id=?;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,'holiday');
            $stmt->bindValue(2,6);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $kons=0;
            foreach ($rows as $row) {
                $sql2 ="SELECT day, month FROM days
            WHERE id = ?";
                $stm2 = $conn->prepare($sql2);
                $stm2->bindValue(1,$row['day_id']);
                $stm2->execute();
                $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);
                $myarray2['nap'] = $dayMonth['day'];
                $myarray2['honap'] = $dayMonth['month'];
                $myarray2['unnep'] = $row['value'];
                $myarray[''. $kons .''] = $myarray2;
                $kons++;
            }
            $myarray['hossz'] = $kons;
            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);
        }
              Tu sa  program nájde v databáze CZ sviatky a posiela vysledok naspäť.

        </code></pre>
    </div>

</div>


<div>
    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title">SK day Klient.php</div>
        <pre class="lang-python"><code>
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


            Tu sa posielam konkretnu poziadavku pre SK dni  a data ktor0 dostanem spat vypisem do div.

        </code></pre>
    </div>

    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title">Add Klient.php</div>
        <pre class="lang-python"><code>
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


            Tu sa posielam meno a datum pre index.php a data ktor0 dostanem spat vypisem do div.

        </code></pre>
    </div>



</div>

<div>
    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title"> SK day  index.php</div>
        <pre class="lang-python"><code>
                else  if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['sknap'] )   ) {
            $sql = "select value, day_id from records  where type=? AND country_id=?;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,'memorial');
            $stmt->bindValue(2,4);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $kons=0;
            foreach ($rows as $row) {
                $sql2 ="SELECT day, month FROM days
            WHERE id = ?";
                $stm2 = $conn->prepare($sql2);
                $stm2->bindValue(1,$row['day_id']);
                $stm2->execute();
                $dayMonth = $stm2->fetch(PDO::FETCH_ASSOC);
                $myarray2['nap'] = $dayMonth['day'];
                $myarray2['honap'] = $dayMonth['month'];
                $myarray2['unnep'] = $row['value'];
                $myarray[''. $kons .''] = $myarray2;
                $kons++;
            }
            $myarray['hossz'] = $kons;

            echo json_encode($myarray,JSON_UNESCAPED_UNICODE);


        }
             Tu sa program nájde v databáze Sk dni a posiela vysledok naspäť.

        </code></pre>
    </div>



    <div class="window">
        <div class="icons"><span></span></div>
        <div class="title"> Add  index.php</div>
        <pre class="lang-python"><code>
                        else  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['value'] ) && isset($_GET['nap'] ) && isset($_GET['honap'] ) ) {


            $sql2 ="SELECT id FROM days
            WHERE day = ? and month=?";
            $stm2 = $conn->prepare($sql2);
            $stm2->bindValue(1,$_GET['nap']);
            $stm2->bindValue(2,$_GET['honap']);
            $stm2->execute();
            $dayid = $stm2->fetch(PDO::FETCH_ASSOC);
            if (empty($dayid)){
                $sql = "INSERT INTO days (day,month)
                VALUES (?,?)";
                $stm= $conn->prepare($sql);
                $stm->bindValue(1,$_GET['nap']);
                $stm->bindValue(2,$_GET['honap']);
                $stm->execute();
                $sql2 ="SELECT id FROM days
                WHERE day = ? and month=?";
                $stm2 = $conn->prepare($sql2);
                $stm2->bindValue(1,$_GET['nap']);
                $stm2->bindValue(2,$_GET['honap']);
                $stm2->execute();
                $dayid = $stm2->fetch(PDO::FETCH_ASSOC);
            }
            $sql = "INSERT INTO records (day_id,country_id,type,value )
                VALUES (?,?,?,?)";
            $stm= $conn->prepare($sql);
            $stm->bindValue(1,$dayid['id']);
            $stm->bindValue(2,5);
            $stm->bindValue(3,'name');
            $stm->bindValue(4,$_GET['value']);
            $stm->execute();
            echo json_encode('Added',JSON_UNESCAPED_UNICODE);
        }
             Tu sa dostane program meno a datum  program pida v database  a posiela vysledok naspäť.

        </code></pre>
    </div>

</div>


</body>

</html>