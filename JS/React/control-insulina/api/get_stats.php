<?php
require "config.php";

$sql = "SELECT AVG(lenta_value) AS avg, MIN(lenta_value) AS min, MAX(lenta_value) AS max FROM insulin_data";
$result = $conn->query($sql);
$stats = $result->fetch_assoc();

$chartData = ["labels" => [], "datasets" => [["label" => "LENTA", "data" => []]]];
$sql2 = "SELECT date, lenta_value FROM insulin_data ORDER BY date";
$result2 = $conn->query($sql2);
while ($row = $result2->fetch_assoc()) {
    $chartData["labels"][] = $row["date"];
    $chartData["datasets"][0]["data"][] = $row["lenta_value"];
}

$stats["chartData"] = $chartData;
echo json_encode($stats);
?>
