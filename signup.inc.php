<?php

if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    if ($username == "user42"){
        header("location: ../signup.php?error=usernametaken");
        echo 'You are not allowed to use this username';
        exit();
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (uidExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    
    createUser($conn, $name, $email, $username, $pwd, $pwdRepeat);
}
else {
    header("location: ../signup.php");
    exit();
}
