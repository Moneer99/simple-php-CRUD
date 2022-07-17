<?php

$serverName = 'localhost';
$userName = 'root';
$Pass = 'moneer90';
$dbName = 'crud';

// using OOP
$mysqli = new mysqli($serverName, $userName, $pass, $dbName) or die(mysqli_error($mysqli));