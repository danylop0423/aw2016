<?php

$mysqli = new mysqli('reversebid.dev', 'homestead', 'secret', 'reverse_bid');

$query = "SELECT min(id) as min, max(id) as max from subasta";
$mysqli->real_query($query);
$IDs = $mysqli->use_result()->fetch_assoc();

foreach (range($IDs['min'], $IDs['max']) as $i) {
    $query = "UPDATE subasta SET caducidad='2016-0" . mt_rand(6, 7) . "-" . mt_rand(1, 30) . " " . mt_rand(0, 23) . ":00:00' WHERE id=" . $i;
    $mysqli->query($query);

    var_dump($query);
}

$mysqli->close();