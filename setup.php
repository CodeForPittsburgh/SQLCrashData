<?php

include ('connect.php');
$timezone = "America/New_York";
date_default_timezone_set($timezone);
$seconds = 300;
set_time_limit($seconds);
$time = time();
global $result;

$yesterday = date("Y-m-d", mktime(0, 0, 0, date("n", $time), date("j", $time) - 1, date("Y", $time)));
$SQL = "SELECT STREET_NAME,ROUTE,SEGMENT,OFFSETPG,b.NAME,CRASH_YEAR,CRASH_MONTH,TIME_OF_DAY,DEC_LAT,DEC_LONG
    FROM ACCrashData as a ,municipalities as b
    where BICYCLE = 1 and a.MUNICIPALITY = b.ID and DEC_LAT is not null and crash_year > 2009
    order by STREET_NAME;";


$dbconn = pg_connect('host=' . $serverName . ' port=' . $port . ' dbname=' . $database . ' user=' . $username . ' password=' . $password . ' connect_timeout=' . $connect_timeout);

$result = pg_query($dbconn, $SQL);

//$conn = sqlsrv_connect($serverName, $connectionOptions);
echo "Connection to server " . "<br>";
if ($dbconn === false) {
    die(FormatErrors(sqlsrv_errors()));
}
//$dbconn = pg_connect('host=' . $hostname . ' port=' . $port . ' dbname=' . $database . ' user=' . $username . ' password=' . $password . ' connect_timeout=' . $connect_timeout);

