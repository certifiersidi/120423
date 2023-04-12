<?php

    if (isset($_POST["submit"])){
        $email = $_POST["Oemail"];
        $animal = $_POST["animal"];
        $pName = $_POST["pName"];
        $pBreed = $_POST["PetBreed"];
        $pDoB = $_POST["DoB"];
        $pGender = $_POST["gender"];
        $pSize = $_POST["size"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        addPet($conn, $email, $animal, $pName, $pBreed, $pDoB, $pGender, $pSize);
    }
    header("location: ../RequestList.php");

?>