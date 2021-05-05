<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header("Connection: keep-alive");
header("Access-Control-Allow-Origin: *");

$last_event_id = intval(isset($_SERVER["HTTP_LAST_EVENT_ID"]) ? $_SERVER["HTTP_LAST_EVENT_ID"] : False);
if ($last_event_id == 0) {
    $last_event_id = intval(isset($_GET["lastEventId"]) ? $_GET["lastEventId"] : $_COOKIE["lastID"]);
}

function sine2($a, $x)
{
    $x = deg2rad($x);
    return round(sin($a * $x) * sin($a * $x), 10);
}

function cosine2($a, $x)
{
    $x = deg2rad($x);
    return round(cos($a * $x) * cos($a * $x), 10);
}


function sine_cosine($a, $x)
{
    $x = deg2rad($x);
    return round(sin($a * $x) * cos($a * $x), 10);
}

function getDataFromCookie($variable)
{
    if (isset($_COOKIE[$variable]) && !empty($_COOKIE[$variable])) {
        return $_COOKIE[$variable] == "true";
    }
}

function generateMessage($id, $a)
{

    $y1 = getDataFromCookie("y1");
    $y2 = getDataFromCookie("y2");
    $y3 = getDataFromCookie("y3");

    $msg = json_encode([]);

    if ($y1 && $y2 && $y3) {
        $msg = json_encode(["sin2" => sine2($a, $id), "cos2" => cosine2($a, $id), "sin_cos" => sine_cosine($a, $id)]);
    } else if ($y1 && $y2) {
        $msg = json_encode(["sin2" => sine2($a, $id), "cos2" => cosine2($a, $id)]);
    } else if ($y1 && $y3) {
        $msg = json_encode(["sin2" => sine2($a, $id), "sin_cos" => sine_cosine($a, $id)]);
    } else if ($y2 && $y3) {
        $msg = json_encode(["cos2" => cosine2($a, $id), "sin_cos" => sine_cosine($a, $id)]);
    } else if ($y1) {
        $msg = json_encode(["sin2" => sine2($a, $id)]);
    } else if ($y2) {
        $msg = json_encode(["cos2" => cosine2($a, $id)]);
    } else if ($y3) {
        $msg = json_encode(["sin_cos" => sine_cosine($a, $id)]);
    }

    return $msg;
}

function sendSSE($id, $a)
{

    $msg = generateMessage($id, $a);

    sleep(1);

    echo "id: $id\n";
    echo "event: message\n";
    echo "data: $msg\n\n";

    ob_flush();
    flush();

}

while (true) {
    $a = 1;
    if (isset($_COOKIE["coefficient"])) {
        $a = intval($_COOKIE["coefficient"]);
    }
    sendSSE($last_event_id++, $a);
}