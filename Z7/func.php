<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("config.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=z7", $username, $password);

    /* $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXEPTION);*/

} catch (PDOException $e) {
    echo "failed connection" . $e->getMessage();
}



if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$response = file_get_contents('https://api.ipregistry.co/' .$ip.'?key=mc6ccf5mrtiuu6');
$response = json_decode($response);





$sql = "SELECT * FROM users
        WHERE ip=?  ";

$stm = $conn->prepare($sql);


$stm->bindValue(1,$ip);


$stm->execute();

$row99 = $stm->fetch(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM countries
        WHERE name=?  ";
$stm = $conn->prepare($sql);
$stm->bindValue(1,$response->location->country->name);
$stm->execute();
$row2 = $stm->fetch(PDO::FETCH_ASSOC);

if (empty($row2)){
    $sql = "INSERT INTO countries (name,capital,img,visited )
         VALUES (?,?,?,?)";
    $stm= $conn->prepare($sql);
    $stm->bindValue(1,$response->location->country->name);

    $stm->bindValue(2,$response->location->country->capital);
    $co=strtolower($response->location->country->code);
    $img='http://www.geonames.org/flags/x/'.$co.'.gif';
    $stm->bindValue(3,$img);
    $stm->bindValue(4,0);
    $stm->execute();
    $sql = "SELECT * FROM countries
        WHERE name=?  ";
    $stm = $conn->prepare($sql);
    $stm->bindValue(1,$response->location->country->name);
    $stm->execute();
    $row9 = $stm->fetch(PDO::FETCH_ASSOC);
    $row2=$row9;
}



if (empty($row99)){







    $sql = "INSERT INTO users (ip,time,lat,lon,coID,visited,city)
         VALUES (?,?,?,?,?,?,?)";
    $stm= $conn->prepare($sql);
    $stm->bindValue(1,$ip);

    $stm->bindValue(2,$response->time_zone->current_time);
    $stm->bindValue(3,$response->location->latitude);
    $stm->bindValue(4,$response->location->longitude);
    $stm->bindValue(5,$row2['id']);
    $stm->bindValue(6,1);
    if ($response->location->city==null){
        $stm->bindValue(7,'Not Found');
    }
    else{
        $stm->bindValue(7,$response->location->city);
    }

    $stm->execute();
    $sql = "UPDATE countries SET visited=?
                WHERE id=?";
    $stm = $conn->prepare($sql);
    $stm->bindValue(1,$row2['visited']+1);
    $stm->bindValue(2,$row2['id']);
    $stm->execute();
}
else{
    $dtime=$row99['time'];
    $ntime=$response->time_zone->current_time;

    $ntime = substr($ntime, 0, 10);
    $dtime=substr($dtime, 0, 10);
    $time = strtotime($ntime);
    $newformat = date('Y-m-d',$time);
    $time2 = strtotime($dtime);
    $newformat2 = date('Y-m-d',$time2);
    $newformat=new DateTime($newformat);
    $newformat2=new DateTime($newformat2);
    $interval = $newformat->diff($newformat2);
   $interval=intval($interval->format('%a')) ;

   if ($interval >= 1){
       $sql = "UPDATE users SET visited=?
                WHERE id=?";
       $stm = $conn->prepare($sql);
       $stm->bindValue(1,$row99['visited']+1);
       $stm->bindValue(2,$row99['id']);
       $stm->execute();

       $sql = "UPDATE countries SET visited=?
                WHERE id=?";
       $stm = $conn->prepare($sql);
       $stm->bindValue(1,$row2['visited']+1);
       $stm->bindValue(2,$row2['id']);
       $stm->execute();
    }


}
