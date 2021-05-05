<?php
session_start();
include_once("config.php");



$sql = "SELECT log_date,type   FROM logs
        WHERE login_id  = ? ";
$stmt = $conn->prepare($sql);

$stmt->bindValue(1, $_SESSION['id']);

$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach ($rows as $row) {

    if ($row["lec_id"] == next($row['lec_id'])){

        echo $row["timstamp"] ;
        echo next($row["timstamp"])  ;

    }
    else if ($row["lec_id"] != next($row['lec_id']) && ) {

        $sql="SELECT MAX(timestamp) FROM user_actions WHERE lecture_id = 78";
        echo $row["timstamp"];
        echo next(max);

    }
    ?>


    <tr>
        <td>
            <?php echo $row["log_date"] ?>
        </td>
        <td><?php
            echo $row["type"];
            ?> </td>

    </tr>
<?php } ?>
