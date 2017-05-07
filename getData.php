<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('dbconn.php');

$getdata = "SELECT * FROM wp_testtable WHERE 1";

$result = $conn->query($getdata);

$recordArray = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($recordArray != "") {$recordArray .= ",";}
    $recordArray .= '{"fname":"' . $rs["fname"] . '",';
    $recordArray .= '"lname":"' . $rs["lname"] . '",';
    $recordArray .= '"email":"'. $rs["email"] . '"}';
}
$recordArray ='{"records":['.$recordArray.']}';
$conn->close();

echo($recordArray);
?>
