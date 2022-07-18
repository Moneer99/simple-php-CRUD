<?php

$serverName = 'localhost';
$userName = 'root';
$pass = 'mypass';
$dbName = 'crud';

// using OOP
$mysqli = new mysqli($serverName, $userName, $pass, $dbName) or die(mysqli_error($mysqli));