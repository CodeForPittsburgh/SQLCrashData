<?php
include ('setup.php');
//$from = " FROM \"PoliceBlotter2\".incident";
//$where = " where incidentdate ='" . $yesterday . "'";
//$orderby = " order by incidenttype desc";
//echo $yesterday;
//echo "\n";
//$SQL = 'SELECT distinct "lat","lng","zone","incidentdate","incidenttime","incidentnumber","address","incidenttype","age","gender","councildistrict"' . $from . $where . $orderby;
$SQL = "SELECT DEC_LAT,DEC_LONG
    FROM ACCrashData as a 
    where BICYCLE = 1 and DEC_LAT is not null
    order by STREET_NAME;";
echo $SQL;

$result = pg_query($dbconn, $SQL);
$count = pg_num_rows($result);
echo "Row count is " . $count;
if ($count > 0)
{

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
//header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = pg_fetch_row($result)) {

    // ADD TO XML DOCUMENT NODE
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("lat", $row[0]);
    $newnode->setAttribute("lng", $row[1]);



}


$filename = "./crashdata.xml";

$dom->saveXML();
echo $dom->saveXML();
$dom->save($filename);
}

pg_close($dbconn);
echo "<br>"."Disconnected from server " . "<br>";



