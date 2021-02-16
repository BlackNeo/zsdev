<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/conf/config.php";

session_start();

// Function getTimeSinceEvent 
function sinceTime ($time) {

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

//GET all messages
// Prepare a select statement
$sql = "SELECT * FROM zsd_notification ORDER BY id DESC LIMIT 10";
$alerts = array();
if($stmt = $pdo->prepare($sql)){ 
    if($stmt->execute()){
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            $time = strtotime($row["created_at"]);
            $since = sinceTime($time);
            $alerts[] = array("id"      => $row["id"], 
                              "type"    => $row["type"], 
                              "message" => $row["message"],
                              "since"   => $since);
        }
    } else {
        echo "Something went wrong with query";
    }
} 
?>