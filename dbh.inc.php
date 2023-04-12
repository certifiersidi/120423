<?php

$servername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'SEProject';

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn){
    die("Connexion failed: " . mysqli_connect_error());
}