<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'codistco_tithes';
$dbPassword = '@ntoky1990';
$dbName = 'codistco_tithes';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}