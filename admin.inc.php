<?php

if(isset($_POST["submit"])){
    $username = $_POST["adminUid"];
    $pwd = $_POST["adminPwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    loginAdmin($username, $pwd);
    header("location: ../viewProblem.php");
}
else {
    header("location: ../admin.php");
    exit();
}