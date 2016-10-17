<?php

# FileName="connect.php"
#$hostname = "localhost";
#$database = "people";
#$username = "root";
#$password = "";

$remotehostname = "db-pblotter-v1-server2.cdtmqej4olqy.us-west-2.rds.amazonaws.com";
$remoteport = 5432;
$remotedatabase = "CfAPGHPoliceBlotter";
$remoteusername = "cfapghpolicebltrrdr";
$remotepassword = "B10tt34RDR";
$remoteconnect_timeout = 60;

$PGserverName = "Howe-HP";
$PGport = 5432;
$PGdatabase = "postgres";
$PGusername = "postgres";
$PGpassword = "win95sux";
$PGconnect_timeout = 60;

#include 'connect.php';
#$connectstr = 'host='.$hostname . ' port='.$port . ' dbname='.$database.' user='.$username.' password='.$password . ' connect_timeout='.$connect_timeout;
#$dbconn = pg_connect($connectstr);

$localdatabase = "CrashData";
$localserverName = "HOWE-HP\HOWEHP";
$localusername = "netbeans";
$localpassword = "adv88285";
$localconnect_timeout = 60;
$localport = 5432;

$serverName = $PGserverName;
$port = $PGport;
$database = $PGdatabase;
$username = $PGusername;
$password = $PGpassword;
$connect_timeout = $PGconnect_timeout;

