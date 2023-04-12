<?php

if (isset($_POST["submit"])){
    $title = $_POST["title"];
    $content = $_POST["text"];
    $email = $_POST["email"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    reportProblem($conn, $title, $content, $email);
}
