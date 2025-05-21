<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'covid19';

$conn = new mysqli($server, $username, $password, $dbname);
if ( $conn->connect_error ) {
	die( "Connection fail: " . $conn->connect_error );
} else {
//	 echo ( "Connection successful! <br/>" );
}

session_start();

$menuActiveHandler = [
	'managers' => '',
	'delivery_men' => '',
];